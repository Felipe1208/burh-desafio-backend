<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(Request $request)
    {
        $name = $request->name;

        $cnpj = $request->cnpj;

        $description = $request->description;

        $planId = $request->plan_id;

        $company = Company::firstOrCreate([
            'name' => $name,
            'description' => $description,
            'cnpj' => $cnpj,
            'plan_id' => $planId,

        ]);

        return response()->json($company, 201);
    }

}
