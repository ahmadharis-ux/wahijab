<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DataCustomerController;
use App\Http\Controllers\admin\KategoriProdukController;
use App\Http\Controllers\admin\ProdukController;
use App\Http\Controllers\user\ShopController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\TransaksiController;
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
    return view('user.index');
});
Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/daftar',[DaftarController::class,'index']);
Route::post('/daftar',[DaftarController::class,'daftar']);

// admin
Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::prefix('customer')->group(function (){
        Route::get('/',[DataCustomerController::class,'index']);
        Route::get('/{id}',[DataCustomerController::class,'show']);
    });
    Route::prefix('produk')->group(function (){
        Route::get('/',[ProdukController::class,'index']);
        Route::get('/create',[ProdukController::class,'create']);
        Route::post('/create',[ProdukController::class,'store']);
        Route::get('/single/{id}',[ProdukController::class,'showSingle']);
    });
    Route::prefix('kategori')->group(function(){
        Route::post('/',[KategoriProdukController::class,'store']);
    });

})->middleware('role:Admin');

// user
Route::middleware(['auth'])->prefix('/')->group(function(){
    Route::prefix('produk')->group(function (){
        Route::get('/',[ShopController::class,'index']);
        Route::get('/single/{id}',[ShopController::class,'showSingle']);
    });
    Route::prefix('promosi')->group(function(){
        Route::get('/',[PromosiController::class,'index']);
    });

})->middleware('role:Member');
Route::post('/transaksi/buy',[TransaksiController::class,'buy']);
Route::get('/transaksi/list',[TransaksiController::class,'index']);
