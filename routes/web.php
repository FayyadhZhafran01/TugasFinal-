<?php

use App\Http\Controllers\Admin\Dashboardcontroller;
use App\Http\Controllers\Admin\Pembelicontroller;
use App\Http\Controllers\Admin\Pemilikcontroller;
use App\Http\Controllers\Admin\Penjualancontroller;
use App\Http\Controllers\Admin\Tipecontroller;
use App\Http\Controllers\Admin\Total_transaksicontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

//grup route untuk admin
Route::prefix('admin')->group(function () {
    //route untuk auth
    Route::group (['middleware' => 'auth'], function () {
    //buat root untuk dasboard
    Route::get('/dashboard', [Dashboardcontroller::class,'index'])->name('admin.dashboard.index');
    //buat route untuk data tipe
    route::resource('/tipe', Tipecontroller::class, ['as' => 'admin'] );
     //buat route untuk data tipe
    route::resource('/pembeli', Pembelicontroller::class, ['as' => 'admin'] );
    //buat route untuk data pemilik
    route::resource('/pemilik', Pemilikcontroller::class, ['as' => 'admin'] );
    //buat route untuk data penjualan
    route::resource('/penjualan', Penjualancontroller::class, ['as' => 'admin'] );
    //buat route untuk data total_transaksi
    route::resource('/total_transaksi', Total_transaksicontroller::class, ['as' => 'admin'] );
    });


});
