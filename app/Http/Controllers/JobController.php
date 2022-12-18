<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Models\Company;
use App\Models\Job;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class JobController extends Controller
{
    public function store(StoreJobRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $company = Company::withCount('jobs')->find($validated['company_id']);

        if ($company->exceededJobsQuota()) {
            throw new Exception("Limite de vagas excedido!", Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $job = Job::create($validated);

        return response()->json($job, Response::HTTP_CREATED);
    }
}
