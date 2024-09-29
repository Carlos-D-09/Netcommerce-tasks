<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TaskController;
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

//Tasks routes
Route::prefix('tasks')->controller(TaskController::class)->group(function(){
    Route::post('/create', 'create');
});

//Companies routes
Route::prefix('companies')->controller(CompanyController::class)->group(function(){
    Route::get('/', 'index');
});
