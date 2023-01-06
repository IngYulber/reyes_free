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
Route::post('/register', [UserController::class, 'store']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/user/{username}', [UserController::class, 'profile'])->name('profile');

