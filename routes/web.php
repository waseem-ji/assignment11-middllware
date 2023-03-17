<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::middleware('guest')->group(function() {

    //Register Views
    Route::get('/register',[RegisterController::class,'index']);
    Route::post('/register',[RegisterController::class,'store']);

    // Login Views
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login',[LoginController::class,'store']);

    // Forgotpassword
    Route::get('/password-reset',[ForgotPasswordController::class,'index']);
    Route::post('/send-password-reset-link',[ForgotPasswordController::class,'sendResetEmail']);

    // Reset Password
    Route::get('password-reset/{token}' , [ResetPasswordController::class,'index'])->name('password.reset');
    Route::post('password-reset' , [ResetPasswordController::class,'resetPassword'])->name('password.update');
});




Route::middleware('auth')->group(function() {
    Route::get('/', [PostController::class,'index']);
    Route::get('/logout',[LoginController::class,'logout']);

    //profile settings
    Route::get('/settings',[ProfileController::class,'edit']);
    Route::put('/update-profile',[ProfileController::class , 'updateProfile'])->name('update-profile');
    Route::patch('/update-password',[ProfileController::class , 'changePassword'])->name('update-password');

    // user feeed
    Route::get('/feed',[FeedController::class, 'index'])->name('feed');
    Route::post('/feed',[FeedController::class, 'store']);
    Route::get('/feed/{post}/edit',[FeedController::class, 'edit']);
    Route::patch('/feed/{post}/deleteImage',[FeedController::class, 'deletePicture']);
    Route::patch('/feed/{post}',[FeedController::class, 'update']);
    Route::delete('feed/{post}',[FeedController::class, 'destroy']);

    // Admin Panel
    
    Route::middleware('is_admin')->group( function() {
        Route::get('/admin',[AdminController::class,'viewPostPanel']);
        Route::get('/admin/users',[AdminController::class,'viewUserPanel']);
        Route::get('/admin/{user}/editUser',[AdminController::class,'editUser']);
        Route::patch('/admin/{user}/updateUser',[AdminController::class,'updateUser']);
        Route::delete('/admin/{user}/deleteUser',[AdminController::class,'deleteUser']);

        Route::get('/admin/{post}/editPost',[AdminController::class,'editPost']);
        Route::patch('/admin/{post}/updatePost',[AdminController::class,'updatePost']);
        Route::delete('/admin/{post}/deletePost',[AdminController::class,'deletePost']);
        Route::patch('/admin/{post}/deletePostPicture',[AdminController::class,'deletePostPicture']);

        // Route::view('/postPanel', 'admin.postPanel');
        
    });
});


