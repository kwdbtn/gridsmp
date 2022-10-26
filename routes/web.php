<?php

use App\Http\Controllers\StationController;
use App\Http\Controllers\StationUnitController;
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

Route::get('summary', [App\Http\Controllers\HomeController::class, 'summary'])->name('summary');
Route::get('generation-profile', [App\Http\Controllers\HomeController::class, 'generation_profile'])->name('generation-profile');
Route::get('voltage-profile', [App\Http\Controllers\HomeController::class, 'voltage_profile'])->name('voltage-profile');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

// Route::get('stations', [StationController::class, 'index'])->name('stations.index');

Route::get('stations/generation', [StationController::class, 'generation'])->name('stations.generation');
Route::get('stations/transmission', [StationController::class, 'transmission'])->name('stations.transmission');
Route::get('stations/{station}/generation', [StationController::class, 'show_generation'])->name('stations.show-generation');
Route::get('stations/{station}/transmission', [StationController::class, 'show_transmission'])->name('stations.show-transmission');

Route::get('station-units/{stationUnit}', [StationUnitController::class, 'show'])->name('station-units.show');

Route::get('/', function () {
    return redirect()->route('summary');
});