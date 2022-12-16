<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {


        $name = $request->name;

        $cpf = $request->cpf;

        $birthDate = $request->birth_date;

        $email = $request->email;

        $password = $request->password;

        User::firstOrCreate([
            'name' => $name,
            'cpf' => $cpf,
            'birth_date' => $birthDate,
            'email' => $email,
            'password' => $password,
        ]);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('JWT');
            return response()->json($token->plainTextToken, 200);
        }

        return response()->json('Usuario invalido', 401);
    }
}
