<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/cars-by-category/{id}', [HomeController::class, 'carsByCategory']);

Route::prefix('admin-dashboard')->group(function () {
    Route::get('/', [CarController::class, 'cars']);
    Route::get('/cars', [CarController::class, 'cars']);
    Route::get('/add-car', [CarController::class, 'addCar']);
    Route::post('/store-car', [CarController::class, 'storeCar']);
    Route::get('/edit-car/{id}', [CarController::class, 'editCar']);
    Route::post('/update-car/{id}', [CarController::class, 'updateCar']);
    Route::post('/delete-car/{id}', [CarController::class, 'deleteCar']);

    Route::get('/users', [UserController::class, 'users']);
    Route::post('/delete-user/{id}', [UserController::class, 'deleteUser']);
});
