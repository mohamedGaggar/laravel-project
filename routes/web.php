<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\postController;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




route::get('/register',function(){
    return view('users.auth.register');
});

route::get('/login',function(){
    return view('users.auth.login');
})->name('login');


route::post('/register',[authController::class,'register']);
route::post('/login',[authController::class,'login']);











route::middleware('auth')->group(function(){

    route::get('/home',[postController::class,'index']);
    route::get('/',[postController::class,'index']);
    route::get('/posts/create',[postController::class,'create']);
    route::get('/logout',[authController::class,'logout']);
    route::post('/posts',[postController::class,'store']);
    route::get('/profile',[authController::class,'profile']);
    route::get('/profile/edit',[authController::class,'editProfile']);
    route::put('/profile/update',[authController::class,'updateProfile']);
    route::get('/posts',[userController::class,'posts']);
    route::get('/posts/{id}/edit',[postController::class,'edit']);
    route::put('/posts/{id}/update',[postController::class,'update']);
    Route::get('/posts/{id}/delete', [PostController::class, 'destroy'])->name('posts.destroy');

});

route::get('/admin',[adminController::class,'index']);
route::post('/admin',[adminController::class,'adminLogin']);
route::get('admin/profile',[adminController::class,'show']);
route::get('admin/{id}/profile',[adminController::class,'deletePost'])->name('admin.delete');
