<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\postController;
use App\Http\Controllers\API\userController;
use App\Http\Controllers\API\authController;
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


route::get('/post',[postController::class,'index'])->middleware('auth:sanctum');


route::get('/post/{id}',[postController::class,'show']);
route::get('/profile',[userController::class,'index']);
route::get('/profile/{id}',[userController::class,'show']);
route::post('/register',[authController::class,'register']);
route::post('/login',[authController::class,'login']);
