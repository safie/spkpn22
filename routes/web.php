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
    return view('auth.login');
});

Auth::routes();

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
Route::get('/modul_f/ternakperikanan', [App\Http\Controllers\ModulFController::class, 'ternakPerikanan'])->name('modulf@ternakperikanan');
Route::get('/modul_f/perniagaan', [App\Http\Controllers\ModulFController::class, 'perniagaan'])->name('modulf@perniagaan');
Route::get('/modul_f/premisniaga', [App\Http\Controllers\ModulFController::class, 'premisNiaga'])->name('modulf@premisniaga');
Route::get('/modul_f/pamminyak', [App\Http\Controllers\ModulFController::class, 'pamMinyak'])->name('modulf@pamminyak');
Route::get('/modul_f/koperasi', [App\Http\Controllers\ModulFController::class, 'koperasi'])->name('modulf@koperasi');
Route::get('/modul_g/rumah', [App\Http\Controllers\ModulGController::class, 'rumah'])->name('modulg@rumah');
Route::get('/modul_g/kenderaan', [App\Http\Controllers\ModulGController::class, 'kenderaan'])->name('modulg@kenderaan');
Route::get('/modul_h/infrastruktur', [App\Http\Controllers\ModulHController::class, 'infrastruktur'])->name('modulh@infrastruktur');
Route::get('/modul_h/air', [App\Http\Controllers\ModulHController::class, 'air'])->name('modulh@air');
Route::get('/modul_h/elektrik', [App\Http\Controllers\ModulHController::class, 'elektrik'])->name('modulh@elektrik');
Route::get('/modul_h/pembentungan', [App\Http\Controllers\ModulHController::class, 'pembentungan'])->name('modulh@pembentungan');
Route::get('/modul_h/pusatpendidikan', [App\Http\Controllers\ModulHController::class, 'pusatPendidikan'])->name('modulh@pusatpendidikan');
Route::get('/modul_h/aksesliputan', [App\Http\Controllers\ModulHController::class, 'aksesLiputan'])->name('modulh@aksesliputan');
Route::get('/modul_h/masyarakat', [App\Http\Controllers\ModulHController::class, 'kemudahanMasyarakat'])->name('modulh@masyarakat');
Route::get('/modul_h/pusatjagaan', [App\Http\Controllers\ModulHController::class, 'pusatJagaan'])->name('modulh@pusatjagaan');
Route::get('/modul_h/sampah', [App\Http\Controllers\ModulHController::class, 'sampah'])->name('modulh@sampah');
Route::get('/modul_h/pengangkutanawam', [App\Http\Controllers\ModulHController::class, 'pengangkutanAwam'])->name('modulh@penangkutanawam');
Route::get('/modul_i/aktiviti', [App\Http\Controllers\ModulIController::class, 'aktiviti'])->name('moduli@aktiviti');
Route::get('/modul_i/kursus', [App\Http\Controllers\ModulIController::class, 'kursus'])->name('moduli@kursus');
Route::get('/modul_i/alam', [App\Http\Controllers\ModulIController::class, 'alamSekitar'])->name('moduli@alamsekitar');
Route::get('/modul_i/penyakit', [App\Http\Controllers\ModulIController::class, 'penyakit'])->name('moduli@penyakit');
Route::get('/modul_i/projek', [App\Http\Controllers\ModulIController::class, 'projekEkonomi'])->name('moduli@projekekonomi');
Route::get('/modul_i/sosial', [App\Http\Controllers\ModulIController::class, 'masalahSosial'])->name('moduli@masalahsosial');
Route::get('/modul_j/organisasi', [App\Http\Controllers\ModulJController::class, 'organisasi'])->name('modulj@organisasi');
Route::get('/modul_k/individu', [App\Http\Controllers\ModulKController::class, 'individu'])->name('modulk@individu');
Route::get('/modul_k/kampung', [App\Http\Controllers\ModulKController::class, 'kampung'])->name('modulk@kampung');
Route::get('/modul_k/potensi', [App\Http\Controllers\ModulKController::class, 'potensi'])->name('modulk@potensi');
Route::get('/modul_l/isu', [App\Http\Controllers\ModulLController::class, 'isu'])->name('modull@isu');
Route::get('/modul_m/kursus', [App\Http\Controllers\ModulMController::class, 'kursus'])->name('modulm@kursus');







// route untuk js dapatkan data json
Route::get('daerahbyidnegeri/{id}', [App\Http\Controllers\KampungController::class, 'daerahbyidnegeri']);
Route::get('mukimbyiddaerah/{id}', [App\Http\Controllers\KampungController::class, 'mukimbyiddaerah']);
Route::get('agensikawalselia/{id}', [App\Http\Controllers\KampungController::class, 'agensipenyelaras']);
Route::get('dunidparlimen/{id}', [App\Http\Controllers\KampungController::class, 'dun']);
