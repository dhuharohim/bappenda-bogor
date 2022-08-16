<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/ajax_get_kerja', [AbsenController::class, 'ajax_get_kerja']);
Route::get('/ajax_get_sub/{id}', [AbsenController::class, 'ajax_get_sub']);
Route::get('/ajax_get_user/{id}', [AbsenController::class, 'ajax_get_user']);
