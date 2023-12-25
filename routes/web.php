<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.home');
});

Route::resource('/teams', 'App\Http\Controllers\TeamController');
Route::resource('/players', 'App\Http\Controllers\PlayerController');
Route::resource('/auth', 'App\Http\Controllers\AuthController');
Route::resource('/comments', 'App\Http\Controllers\CommentController');
Route::resource('/news', 'App\Http\Controllers\NewsController');

Route::middleware('notauthenticated')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin']);
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::get('/verify/{verify_string}', [AuthController::class, 'verify']);
});
Route::middleware('authenticated')->group(function () {
    Route::get('/logout', [AuthController::class, 'destroy']);
});

Route::middleware('forbiddenwords')->group(function () {
    Route::post('/comments', [CommentController::class, 'store']);
});

Route::get('/news/teams/{name}', [NewsController::class, 'showTeam']);
