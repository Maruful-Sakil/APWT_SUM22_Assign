<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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
Route::get('/',[PagesController::class,'home'])->name('home');
Route::get('/about',[PagesController::class,'about'])->name('about');
Route::get('/user/register',[RegisterController::class,'create'])->name('user.register');
Route::post('/user/register',[RegisterController::class,'createSubmit'])->name('user.register.submit');
Route::get('/user/login',[RegisterController::class,'login'])->name('user.login');
Route::post('/user/login',[RegisterController::class,'loginSubmit'])->name('user.login.submit');
Route::get('/user/dashboard',[RegisterController::class,'dashboard'])->name('user.dash');
Route::get('/logout',[RegisterController::class,'logout'])->name('logout');