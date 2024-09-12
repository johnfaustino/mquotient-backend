<?php

use App\Http\Controllers\Api\CareerApplicationController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\DemoRequestController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('contact-us', [ContactUsController::class, 'store']);
Route::post('request-demo', [DemoRequestController::class, 'store']);
Route::post('career-application', [CareerApplicationController::class, 'store']);