<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Models\Plan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    public function store(StoreCompanyRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $company = Company::create($validated);

        return response()->json($company, Response::HTTP_CREATED);
    }

    public function changePlan(Company $company, Plan $plan): JsonResponse
    {
        $company->plan_id = $plan->id;
        $company->save();

        return response()->json('Plano atualizado com sucesso!');
    }
}
