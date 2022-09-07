<?php

use App\Http\Controllers\MeasurandController;
use App\Http\Controllers\StationController;
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

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

// Route::get('stations', [StationController::class, 'index'])->name('stations.index');

Route::resources([
    'stations' => StationController::class,
]);

Route::get('measurands/{measurand}', [MeasurandController::class, 'show'])->name('measurands.show');

Route::get('/', function () {
    return redirect()->route('dashboard');
});