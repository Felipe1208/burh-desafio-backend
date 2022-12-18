<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
