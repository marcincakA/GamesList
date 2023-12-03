<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/login', [UserController::class, 'login']);


//Game routes
Route::get('/add-game', [GameController::class, 'redirect_to_addGame']);

Route::post('/addGame', [GameController::class, 'add_Game']);


//Game-list routes
Route::get('/viewGames', [GameController::class, 'viewGames']);
