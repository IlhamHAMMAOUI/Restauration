<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CuisineController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Private_diningController;
use App\Http\Controllers\ReservationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AboutController::class)->prefix('/abouts')->group(function () {
    Route::get('/','getAbouts');
    Route::get('/{about}','getAbout');
    Route::post('/create','createAbout');
    Route::patch('/edit/{about}','editAbout');
    Route::delete('/delete/{about}','deleteAbout');
});

Route::controller(CuisineController::class)->prefix('/cuisines')->group(function () {
    Route::get('/','getCuisines');
    Route::get('/{cuisine}','getCuisine');
    Route::post('/create','createCuisine');
    Route::patch('/edit/{cuisine}','editCuisine');
    Route::delete('/delete/{cuisine}','deleteCuisine');
});

Route::controller(MenuController::class)->prefix('/menus')->group(function () {
    Route::get('/','getMenus');
    Route::get('/{menu}','getMenu');
    Route::post('/create','createMenu');
    Route::patch('/edit/{menu}','editMenu');
    Route::delete('/delete/{menu}','deleteMenu');
});

Route::controller(Private_diningController::class)->prefix('/private_dinings')->group(function () {
    Route::get('/','getPrivate_dinings');
    Route::get('/{private_dining}','getPrivate_dining');
    Route::post('/create','createPrivate_dining');
    Route::patch('/edit/{private_dining}','editPrivate_dining');
    Route::delete('/delete/{private_dining}','deletePrivate_dining');
});

Route::controller(ReservationController::class)->prefix('/reservations')->group(function () {
    Route::get('/','getReservations');
    Route::get('/{reservation}','getReservation');
    Route::post('/create','createReservation');
    Route::patch('/edit/{reservation}','editReservation');
    Route::delete('/delete/{reservation}','deleteReservation');
});