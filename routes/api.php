<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
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

Route::post('/login', [UserController::class, 'login']);

Route::get('/all-jobs', [JobController::class, 'index']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/search/{job}', [JobController::class, 'search']);

Route::post('/application/create', [ApplicationController::class, 'store']);



Route::middleware('auth:sanctum')->group(function () {
    // return $request->user();

    Route::get('/{user}/jobs', [UserController::class, 'showJobs']);
    Route::post('/signout', [UserController::class, 'signout']);

    Route::post('/job/create', [JobController::class, 'store']);
    Route::put('/job/update/{job}', [JobController::class, 'update']);
    Route::delete('/job/delete/{job}', [JobController::class, 'destroy']);
});
