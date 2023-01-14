<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\NewsCategoryController;
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

Route::prefix('user')->group(function (){
    Route::get('/{username}', [UserController::class, 'profile'])->name('user.profile');
});

Route::prefix('news')->group(function (){
    Route::get('', [NewsController::class, 'index'])->name('news');
    Route::get('/categories', [NewsCategoryController::class, 'newsCategories'])->name('news.categories');
    Route::get('/all', [NewsController::class, 'getAll'])->name('news.all');
    Route::get('/tags', [UtilController::class, 'tags'])->name('news.tags');
    Route::get('/{slug}', [NewsController::class, 'detail'])->name('news.detail');
});

Route::prefix('artists')->group(function (){
    Route::get('', [ArtistController::class, 'index'])->name('artists');
    Route::get('/categories', [ArtistController::class, 'categories'])->name('artists.categories');
    Route::get('/by-country', [ArtistController::class,'artistsByCountry']);
    Route::get('/by-status', [ArtistController::class,'artistsByStatus']);
    Route::get('/{slug}',[ArtistController::class, 'detail'])->name('artist.detail');

});

Route::prefix('utils')->group(function (){
    Route::get('/artists-country', [UtilController::class,'artistsByCountry']);
});