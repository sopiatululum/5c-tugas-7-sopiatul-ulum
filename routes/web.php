<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MuridController;
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

Route::resource('murid', MuridController::class);
Route::resource('guru', GuruController::class);
Route::resource('/', GuruController::class);


Route::prefix('murid')->group(function(){
    Route::get('/take/{murid}', [MuridController::class, 'take'])->name('murids.take');
    Route::post('/take/{murid}', [MuridController::class, 'takeStore'])->name('murids.takeStore');
});

Route::fallback(function() {
    return view('fail');
});
