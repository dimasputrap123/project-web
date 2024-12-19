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
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/bantuan', [AsesmenController::class, 'add_master_bantuan']);
    Route::post('/kategori', [AsesmenController::class, 'add_master_kategori']);
    Route::post('/asesmen', [AsesmenController::class, 'add_master_asesmen']);
    Route::post('/kpm', [AsesmenController::class, 'add_kpm']);
    Route::post('/tambahSurvey', [AsesmenController::class, 'tambahSurvey']);
    Route::post('/prediksi', [AsesmenController::class, 'prediksiHasil']);
});
