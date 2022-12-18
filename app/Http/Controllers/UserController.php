<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\UserJob;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when(
            isset($request->search),
            fn($query) => $query->where('name','like', "%$request->search%")
                ->orWhere('cpf', 'like', "%$request->search%")
                ->orWhere('email', 'like', "%$request->search%")
        )
            ->get();

        return response()->json($users);
    }

    public function subscribe(Job $job)
    {
        $subscription = UserJob::where('user_id', auth()->user()->id)
            ->where('job_id', $job->id)
            ->first();

        if ($subscription) {
            throw new Exception("Usuário já cadastrado nessa vaga!", Response::HTTP_CONFLICT);
        }

        $userJob = UserJob::firstOrCreate([
            'user_id' => auth()->user()->id,
            'job_id' => $job->id,
        ]);

        return response()->json($userJob, Response::HTTP_CREATED);
    }
}
