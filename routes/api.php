<?php

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
Route::resource('information', \App\Http\Controllers\InformationController::class);
Route::get('information/search/{category_id}', [\App\Http\Controllers\InformationController::class, 'index']);
Route::post('information/interesting/{id}', [\App\Http\Controllers\InformationController::class, 'increaseInteresting']);
Route::post('information/false/{id}', [\App\Http\Controllers\InformationController::class, 'increaseFalse']);
Route::post('information/mindBlowing/{id}', [\App\Http\Controllers\InformationController::class, 'increaseMindBlowing']);

Route::resource('category', \App\Http\Controllers\CategoryController::class);
