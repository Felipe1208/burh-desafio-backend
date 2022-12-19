<?php

namespace App\Http\Controllers;

use App\Exceptions\UserAlreadySubscribedException;
use App\Models\Job;
use App\Models\User;
use App\Models\UserJob;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $users = User::when(
            isset($request->search),
            fn($query) => $query->where('name','like', "%$request->search%")
                ->orWhere('cpf', 'like', "%$request->search%")
                ->orWhere('email', 'like', "%$request->search%")
        )
            ->with('jobs')
            ->get();

        return response()->json($users);
    }

    public function subscribe(Job $job)
    {
        $subscription = UserJob::where('user_id', auth()->user()->id)
            ->where('job_id', $job->id)
            ->first();

        if ($subscription) {
            throw new UserAlreadySubscribedException();
        }

        $userJob = UserJob::firstOrCreate([
            'user_id' => auth()->user()->id,
            'job_id' => $job->id,
        ]);

        return response()->json($userJob, Response::HTTP_CREATED);
    }
}
