<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/index', [App\Http\Controllers\KaryawanController::class, 'index'])->name('index')->middleware('auth');

Route::resource('karyawans', KaryawanController::class)->middleware('auth');

Route::resource('stories', StoryController::class)->middleware('auth');

Route::Post('/stories/update/status', [StoryController::class, 'update_status']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//penambahan mulai dari bawah ini

Route::middleware(['auth','admin'])->group(function () {
    Route::get('admin', [AdminController::class, 'index']);
});

Route::middleware(['user'])->group(function () {
    Route::get('user', [UserController::class, 'index']);
});

Route::get('/logout', function() {
    Auth::logout();
    redirect('/');
});
