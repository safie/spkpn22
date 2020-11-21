<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/modul_b/index', [App\Http\Controllers\ModulBController::class, 'index'])->name('modulb@index');
Route::get('/modul_c/index', [App\Http\Controllers\ModulCController::class, 'index'])->name('modulc@index');
Route::get('/modul_d/penduduk', [App\Http\Controllers\ModulDController::class, 'penduduk'])->name('moduld@penduduk');
Route::get('/modul_d/umur', [App\Http\Controllers\ModulDController::class, 'umur'])->name('moduld@umur');
Route::get('/modul_d/pendidikan', [App\Http\Controllers\ModulDController::class, 'pendidikan'])->name('moduld@pendidikan');
Route::get('/modul_d/pendapatan', [App\Http\Controllers\ModulDController::class, 'pendapatan'])->name('moduld@pendapatan');
Route::get('/modul_d/pekerjaan', [App\Http\Controllers\ModulDController::class, 'pekerjaan'])->name('moduld@pekerjaan');
Route::get('/modul_d/golongankhas', [App\Http\Controllers\ModulDController::class, 'golongankhas'])->name('moduld@golongankhas');
Route::get('/modul_e/tanah', [App\Http\Controllers\ModulEController::class, 'tanah'])->name('module@tanah');
Route::get('/modul_e/hakmilik', [App\Http\Controllers\ModulEController::class, 'hakMilik'])->name('module@hakmilk');
Route::get('/modul_e/tanahterbiar', [App\Http\Controllers\ModulEController::class, 'tanahTerbiar'])->name('module@tanahterbiar');
Route::get('/modul_e/tanahusaha', [App\Http\Controllers\ModulEController::class, 'tanahDiusaha'])->name('module@tanahdiusaha');
Route::get('/modul_f/kemudahanniaga', [App\Http\Controllers\ModulFController::class, 'kemudahanPerniagaan'])->name('modulf@kemudahanperniagaan');
Route::get('/modul_f/pertanian', [App\Http\Controllers\ModulFController::class, 'pertanian'])->name('modulf@pertanian');
Route::get('/modul_f/ternakperikanan', [App\Http\Controllers\ModulFController::class, 'ternakPerikanan'])->name('module@ternakperikanan');
Route::get('/modul_f/perniagaan', [App\Http\Controllers\ModulFController::class, 'perniagaan'])->name('module@perniagaan');
Route::get('/modul_f/premisniaga', [App\Http\Controllers\ModulFController::class, 'premisNiaga'])->name('module@premisniaga');
Route::get('/modul_f/pamminyak', [App\Http\Controllers\ModulFController::class, 'pamMinyak'])->name('module@pamminyak');
Route::get('/modul_f/koperasi', [App\Http\Controllers\ModulFController::class, 'koperasi'])->name('module@koperasi');

// this route can return the state with the state id
Route::get('daerahbyidnegeri/{id}', [App\Http\Controllers\KampungController::class, 'daerahbyidnegeri']);
Route::get('mukimbyiddaerah/{id}', [App\Http\Controllers\KampungController::class, 'mukimbyiddaerah']);
Route::get('agensikawalselia/{id}', [App\Http\Controllers\KampungController::class, 'agensipenyelaras']);
Route::get('dunidparlimen/{id}', [App\Http\Controllers\KampungController::class, 'dun']);
