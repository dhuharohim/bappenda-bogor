<?php

use App\Http\Controllers\DaftarUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VerifikasiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('base');
// });

Auth::routes();
Route::get('admin/home', [HomeController::class, 'index'])->name('admin.home')->middleware('is_admin');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.data');
Route::get('/input', [DashboardController::class, 'create'])->name('dashboard.input');
Route::post('/input/store', [DashboardController::class, 'store'])->name('dashboard.store');

Route::get('/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
// Route::post('/profile/create', [DashboardController::class, 'storeprofile'])->name('dashboard.create');
Route::post('/profile/store/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
Route::post('/profileadmin/store/{id}', [DashboardController::class, 'updateadmin'])->name('admin.update');
Route::post('/kepalaadmin/store/{id}', [DashboardController::class, 'updatekepala'])->name('kepala.update');
Route::post('/profilekepalabidang/store/{id}', [DashboardController::class, 'updatekepalabidang'])->name('kepalabidang.update');
Route::post('/profilekepalasub/store/{id}', [DashboardController::class, 'updatekepalasubbidang'])->name('kepalasubbidang.update');

Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('verifikasi.index');
Route::get('/verifikasi/show/{id}', [VerifikasiController::class, 'show'])->name('verifikasi.show');
Route::post('/verifikasi/update/{id}', [VerifikasiController::class, 'update'])->name('verifikasi.update');

Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
Route::get('/setting/access/{id}', [SettingController::class, 'show'])->name('access.index');
Route::post('/setting/access/update/{id}', [SettingController::class, 'update'])->name('update.access');
Route::get('/setting/access/delete/{id}', [SettingController::class, 'destroy'])->name('delete.access');
Route::post('/setting/store/user', [SettingController::class, 'store'])->name('user.store');
Route::post('/setting/store/unit', [SettingController::class, 'storeunit'])->name('unit.store');

Route::get('/daftar-user', [DaftarUserController::class, 'index'])->name('daftar.index');
Route::get('/daftar-user/ganti/password/{id}', [DaftarUserController::class, 'show'])->name('password.change');
Route::post('/daftar-user/password/store/{id}', [DaftarUserController::class, 'store'])->name('password.store');

