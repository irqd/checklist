<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Tasks\ListTasks;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;

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

Route::group(['middleware' => 'guest'], function () {
    Route::prefix('auth')->group(function () {
        Route::get('/login', Login::class)->name('login');
        Route::get('/register', Register::class)->name('register');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/', ListTasks::class)->name('tasks.index');
});
