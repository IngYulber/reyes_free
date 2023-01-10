<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', [AuthenticationController::class, 'index']);;
Route::post('/login', [AuthenticationController::class, 'singUp']);;
Route::get('/countries', [UtilController::class, 'countries']);
Route::get('/tags', [UtilController::class, 'tags']);
Route::get('/news-categories', [UtilController::class, 'newsCategories']);
Route::post('/register', [UserController::class, 'store']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/all', [NewsController::class, 'getAll'])->name('news.all');
Route::get('/user/{username}', [UserController::class, 'profile'])->name('profile');

