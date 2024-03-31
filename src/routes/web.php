<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Dashboard;
use App\Livewire\Tasks\Tasks;

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

    Route::get('/', Dashboard::class)->name('dashboard');

    Route::prefix('tasks')->group(function () {
        Route::get('/', Tasks::class)->name('tasks.index');
    });
});
