<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/user.show/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user.create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user.store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user.edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user.update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user.destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');


    // Trashed
    Route::get('/users.index.trashed', [UserController::class, 'trashed'])->name('users.index.trashed');
    Route::post('/user.restore/{id}', [UserController::class, 'restore_user'])->name('user.restore');
    Route::delete('/user.force-delete/{id}', [UserController::class, 'destroy_user'])->name('user.force-delete');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
