<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        $token = $user->createToken('JWT');

        $data = [
            "user" => $user,
            "token" => $token->plainTextToken
        ];

        return response()->json($data, Response::HTTP_CREATED);
    }

    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('JWT');
            return response()->json($token->plainTextToken);
        }

        return response()->json('Usuario inválido', Response::HTTP_UNAUTHORIZED);
    }
}
