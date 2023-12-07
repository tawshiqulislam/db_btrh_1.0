<?php

use App\Http\Controllers\Api\ProjectInitiationAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user_info', [ProjectInitiationAPIController::class, 'user_info']); //index page
Route::get('user_detail', [ProjectInitiationAPIController::class, 'user_detail']); //index page
Route::get('vendor', [ProjectInitiationAPIController::class, 'vendor']); //index page
Route::get('task', [ProjectInitiationAPIController::class, 'task']); //index page
Route::get('project_initiation', [ProjectInitiationAPIController::class, 'project_initiation']); //index page
Route::get('project_category', [ProjectInitiationAPIController::class, 'project_category']); //index page
