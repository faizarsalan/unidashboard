<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
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

// WELCOME AND HOME
Route::get('/', [PageController::class, 'Welcome']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// EDIT PROFILE
Route::get('/editProfile/{id}', [PageController::class, 'EditProfileForm']);
Route::post('/edit/{id}', [PageController::class, 'EditProfile']);


Auth::routes();

