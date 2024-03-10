<?php

use App\Http\Controllers\api\CompanyController;
use App\Http\Controllers\api\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('companies', CompanyController::class);

Route::post('login', [UserAuthController::class, 'login']);
Route::post('register', [UserAuthController::class, 'register']);

//Route::get('my_courses', [UserAuthController::class, 'my_courses']);

Route::get('my_courses', [UserAuthController::class, 'my_courses'])->middleware('auth:sanctum');

