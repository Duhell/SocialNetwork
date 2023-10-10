<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// signup and signin
Route::get('/',[UserController::class,'home'])->name('login');
Route::post('/',[UserController::class,'home'])->name('home');

Route::get('/signup',[UserController::class,'signup'])->name('signup');
Route::post('/signup',[UserController::class,'signup'])->name('signup');

// Post Card
Route::get('/feeds',[PostController::class,'feeds'])->name('feeds')->middleware('auth');
Route::post('/feeds',[PostController::class,'addpost'])->name('addpost')->middleware('auth');
Route::post('/changeprofilepicture',[UserController::class,'changeProfilePicture'])->name('changeprofilepicture')->middleware('auth');

Route::get('/edit/id={id}',[UserController::class,'edit'])->name('edit')->middleware('auth');


// logout
Route::get('/logout',[UserController::class,'logout'])->name('logout');


