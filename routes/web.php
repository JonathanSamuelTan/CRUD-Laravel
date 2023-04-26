<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;

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

Route::GET('/',[DriverController::class, 'index'])->name('welcome');
Route::DELETE('delete/{id}',[DriverController::class, 'destroy'])->name('delete');
Route::PUT('update/{id}',[DriverController::class, 'update'])->name('update');
Route::POST('store',[DriverController::class, 'store'])->name('store');

