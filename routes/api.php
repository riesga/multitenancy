<?php

use App\Http\Controllers\TenantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [TenantController::class, 'store']);

Route::post('registeruser', [PassportController::class, 'register']);
Route::post('login', [PassportController::class, 'login']);

// put all api protected routes here
Route::middleware('auth:api')->group(function () {
    Route::post('user-detail', [PassportController::class, 'userDetail']);
    Route::post('logout', [PassportController::class, 'logout']);
});
