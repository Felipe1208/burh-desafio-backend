<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::prefix('/companies')->group(function() {
    Route::post('/', [CompanyController::class, 'store'])->name('companies.store');
    Route::put('/{company}/change-plan/{plan}', [CompanyController::class, 'changePlan'])->name('companies.change-plan');
});

Route::prefix('/jobs')->group(function() {
    Route::post('/', [JobController::class, 'store'])->name('jobs.store');
});

Route::get("/users", [UserController::class, 'index'])->name('users.index');

Route::middleware('auth:sanctum')->post("/users/subscribe/{job}", [UserController::class, 'subscribe'])->name('users.subscribe');
