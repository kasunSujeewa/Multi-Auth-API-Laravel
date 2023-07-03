<?php

use App\Http\Controllers\AdminPassportController;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\UmpairPassportController;
use App\Http\Controllers\UserPassportController;
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

Route::post('/user/register',[UserPassportController::class,'register']);
Route::post('/user/login',[UserPassportController::class,'login']);

Route::post('/umpair/register',[UmpairPassportController::class,'register']);
Route::post('/umpair/login',[UmpairPassportController::class,'login']);

Route::post('/admin/register',[AdminPassportController::class,'register']);
Route::post('/admin/login',[AdminPassportController::class,'login']);

Route::middleware('auth:api')->group( function () {
    Route::post('user/logout', [UserPassportController::class,'logout']);
    Route::post('admin/logout', [AdminPassportController::class,'logout']);
    Route::post('umpair/logout', [UmpairPassportController::class,'logout']);
});
