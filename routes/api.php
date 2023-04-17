<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AboutController;
use App\Http\Controllers\API\ServiceController;

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
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::controller(AboutController::class)->group(function(){
    Route::get('edit_about', 'edit_about');
    Route::post('update_about/{id}', 'update_about');
});
Route::controller(ServiceController::class)->group(function(){
    Route::get('get_all_service', 'get_all_service');
    Route::post('create_service', 'create_service');
});
