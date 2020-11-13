<?php

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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kampung/', [App\Http\Controllers\KampungController::class, 'index'])->name('kampung@index');

Route::get('/kampung/cari', [App\Http\Controllers\KampungController::class, 'cari'])->name('kampung@cari');

Route::get('/modul_a/index', [App\Http\Controllers\ModulAController::class, 'index'])->name('modula@index');

// this route can return the state with the state id
Route::get('daerahbyidnegeri/{id}', [App\Http\Controllers\KampungController::class, 'daerahbyidnegeri']);
Route::get('mukimbyiddaerah/{id}', [App\Http\Controllers\KampungController::class, 'mukimbyiddaerah']);
Route::get('agensikawalselia/{id}', [App\Http\Controllers\KampungController::class, 'agensipenyelaras']);
Route::get('dunidparlimen/{id}', [App\Http\Controllers\KampungController::class, 'dun']);
