<?php

use App\Http\Controllers\CommentController;
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
Route::post('/like/{post}',[PostController::class,'addLike'])->name('likePost')->middleware('auth');
Route::post('/dislike/{post}',[PostController::class,'addDislike'])->name('dislikePost')->middleware('auth');
Route::delete('/delete/{id}',[PostController::class,'destroy'])->name('destroy')->middleware('auth');
Route::post('/changeprofilepicture',[UserController::class,'changeProfilePicture'])->name('changeprofilepicture')->middleware('auth');

Route::get('/comments/{post}',[CommentController::class,'index'])->name('comments')->middleware('auth');
Route::post('/comments',[CommentController::class,'store'])->name('comments')->middleware('auth');


Route::get('/personal-information',[UserController::class,'editView'])->name('editView')->middleware('auth');
Route::get('/updateUserStatus',[UserController::class,'updateUserStatus'])->name('updateUserStatus')->middleware('seen');
Route::get('/search_user',[UserController::class,'search'])->name('search');
Route::post('/personal-information',[UserController::class,'edit'])->name('edit')->middleware('auth');

Route::get('/view/id={user_id}',[UserController::class,'viewUser'])->name('viewUser')->middleware('auth');


// logout
Route::get('/logout',[UserController::class,'logout'])->name('logout');


