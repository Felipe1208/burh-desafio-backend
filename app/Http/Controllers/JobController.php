<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function store(Request $request)
    {
        $companyId = $request->company_id;

        $description = $request->description;

        $jobtypeId = $request->job_type_id;

        $salary = $request->salary;

        $startTime = $request->start_time;

        $endTime = $request->end_time;

        $tittle = $request->tittle;

        $jobs = Job::firstOrCreate([
            'company_id' => $companyId,
            'description' => $description,
            'job_type_id' => $jobtypeId,
            'salary' => $salary,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'tittle' => $tittle
        ]);

        return response()->json($jobs);
    }
}
