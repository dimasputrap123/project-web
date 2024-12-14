<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\AsesmenController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/bantuan', [AsesmenController::class, 'add_master_bantuan']);
Route::middleware('auth:sanctum')->post('/kategori', [AsesmenController::class, 'add_master_kategori']);
Route::middleware('auth:sanctum')->post('/asesmen', [AsesmenController::class, 'add_master_asesmen']);
Route::middleware('auth:sanctum')->post('/kpm', [AsesmenController::class, 'add_kpm']);

Route::middleware('auth:sanctum')->post('/tambahSurvey', [AsesmenController::class, 'tambahSurvey']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
