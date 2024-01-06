<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthenticateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/cars-by-category/{id}', [HomeController::class, 'carsByCategory']);
Route::get('/cars-by-category/{id}/search', [HomeController::class, 'search']);

Route::get('/sign-in', [AuthenticateController::class, 'signIn'])->name('sign-in');
Route::post('/login', [AuthenticateController::class, 'login'])->name('login');
Route::get('/sign-up', [AuthenticateController::class, 'signUp'])->name('sign-up');
Route::post('/register', [AuthenticateController::class, 'register'])->name('register');


Route::middleware(['auth.check:web'])->group(function () {
    Route::post('/book-car/{id}', [HomeController::class, 'bookCar']);
    Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');
});

Route::prefix('admin-dashboard')->group(function () {
    Route::middleware(['auth.check:admin'])->group(function () {
        Route::get('/', [CarController::class, 'index']);
        Route::get('/cars', [CarController::class, 'cars']);
        Route::get('/add-car', [CarController::class, 'addCar']);
        Route::post('/store-car', [CarController::class, 'storeCar']);
        Route::get('/edit-car/{id}', [CarController::class, 'editCar']);
        Route::post('/update-car/{id}', [CarController::class, 'updateCar']);
        Route::post('/delete-car/{id}', [CarController::class, 'deleteCar']);

        Route::get('/users', [UserController::class, 'users']);
        Route::post('/delete-user/{id}', [UserController::class, 'deleteUser']);

        Route::post('/logout', [AuthController::class, 'logout'])->name('admin-logout');
    });
    Route::get('/sign-in', [AuthController::class, 'signIn'])->name('admin-sign-in');
    Route::post('/login', [AuthController::class, 'login'])->name('admin-login');
});
