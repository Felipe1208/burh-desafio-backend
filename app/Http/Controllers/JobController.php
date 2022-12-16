<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Models\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class JobController extends Controller
{
    public function store(StoreJobRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $job = Job::create($validated);

        return response()->json($job, Response::HTTP_CREATED);
    }
}
