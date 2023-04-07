<?php

use App\Http\Controllers\chuyennganhController;
use App\Http\Controllers\dangnhapController;
use App\Http\Controllers\doanController;
use App\Http\Controllers\giangvienController;
use App\Http\Controllers\hedaotaoController;
use App\Http\Controllers\khoaController;
use App\Http\Controllers\lopController;
use App\Http\Controllers\nienkhoaController;
use App\Http\Controllers\quanlyController;
use App\Http\Controllers\sinhvienController;
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
    return view('form.login');
})->name('login');

Route::middleware('auth')->group(function () {

    Route::get('trangchu', [quanlyController::class, 'tong'])->name('trangchu');

    Route::group(['prefix' => 'khoa'], function () {
        Route::get('index', [khoaController::class, 'index'])->name('khoa.khoa');
        Route::get('/create', [khoaController::class, 'create'])->name('khoa.create');
        Route::post('/store', [khoaController::class, 'store'])->name('khoa.store');
        Route::get('/edit/{id}', [khoaController::class, 'edit'])->name('khoa.edit');
        Route::put('/update/{id}', [khoaController::class, 'update'])->name('khoa.update');
        Route::delete('/destroy/{id}', [khoaController::class, 'destroy'])->name('khoa.destroy');
    });

    Route::group(['prefix' => 'chuyennganh'], function () {
        Route::get('/index', [chuyennganhController::class, 'index'])->name('chuyennganh.chuyennganh');
        Route::get('/create', [chuyennganhController::class, 'create'])->name('chuyennganh.create');
        Route::post('/store', [chuyennganhController::class, 'store'])->name('chuyennganh.store');
        Route::get('/edit/{id}', [chuyennganhController::class, 'edit'])->name('chuyennganh.edit');
        Route::put('/update/{id}', [chuyennganhController::class, 'update'])->name('chuyennganh.update');
        Route::delete('/destroy/{id}', [chuyennganhController::class, 'destroy'])->name('chuyennganh.destroy');
    });

    Route::group(['prefix' => 'hedaotao'], function () {
        Route::get('/index', [hedaotaoController::class, 'index'])->name('hedaotao.hedaotao');
        Route::get('/create', [hedaotaoController::class, 'create'])->name('hedaotao.create');
        Route::post('/store', [hedaotaoController::class, 'store'])->name('hedaotao.store');
        Route::get('/edit/{id}', [hedaotaoController::class, 'edit'])->name('hedaotao.edit');
        Route::put('/update/{id}', [hedaotaoController::class, 'update'])->name('hedaotao.update');
        Route::delete('/destroy/{id}', [hedaotaoController::class, 'destroy'])->name('hedaotao.destroy');
    });

    Route::group(['prefix' => 'nienkhoa'], function () {
        Route::get('/index', [nienkhoaController::class, 'index'])->name('nienkhoa.nienkhoa');
        Route::get('/create', [nienkhoaController::class, 'create'])->name('nienkhoa.create');
        Route::post('/store', [nienkhoaController::class, 'store'])->name('nienkhoa.store');
        Route::get('/edit/{id}', [nienkhoaController::class, 'edit'])->name('nienkhoa.edit');
        Route::put('/update/{id}', [nienkhoaController::class, 'update'])->name('nienkhoa.update');
        Route::delete('/destroy/{id}', [nienkhoaController::class, 'destroy'])->name('nienkhoa.destroy');
    });

    Route::group(['prefix' => 'lop'], function () {
        Route::get('/index', [lopController::class, 'index'])->name('lop.lop');
        Route::get('/create', [lopController::class, 'create'])->name('lop.create');
        Route::post('/store', [lopController::class, 'store'])->name('lop.store');
        Route::get('/edit/{id}', [lopController::class, 'edit'])->name('lop.edit');
        Route::put('/update/{id}', [lopController::class, 'update'])->name('lop.update');
        Route::delete('/destroy/{id}', [lopController::class, 'destroy'])->name('lop.destroy');
    });

    Route::group(['prefix' => 'sinhvien'], function () {
        Route::get('/index', [sinhvienController::class, 'index'])->name('sinhvien.sinhvien');
        Route::get('/create', [sinhvienController::class, 'create'])->name('sinhvien.create');
        Route::post('/store', [sinhvienController::class, 'store'])->name('sinhvien.store');
        Route::get('/edit/{id}', [sinhvienController::class, 'edit'])->name('sinhvien.edit');
        Route::put('/update/{id}', [sinhvienController::class, 'update'])->name('sinhvien.update');
        Route::delete('/destroy/{id}', [sinhvienController::class, 'destroy'])->name('sinhvien.destroy');
        Route::get('/search', [sinhvienController::class, 'search'])->name('sinhvien.search');
    });

    Route::group(['prefix' => 'giangvien'], function () {
        Route::get('/index', [giangvienController::class, 'index'])->name('giangvien.giangvien');
        Route::get('/create', [giangvienController::class, 'create'])->name('giangvien.create');
        Route::post('/store', [giangvienController::class, 'store'])->name('giangvien.store');
        Route::get('/edit/{id}', [giangvienController::class, 'edit'])->name('giangvien.edit');
        Route::put('/update/{id}', [giangvienController::class, 'update'])->name('giangvien.update');
        Route::delete('/destroy/{id}', [giangvienController::class, 'destroy'])->name('giangvien.destroy');
    });

    Route::group(['prefix' => 'doan'], function () {
        Route::get('/index', [doanController::class, 'index'])->name('doan.doan');
        Route::get('/create', [doanController::class, 'create'])->name('doan.create');
        Route::post('/store', [doanController::class, 'store'])->name('doan.store');
        Route::get('/edit/{id}', [doanController::class, 'edit'])->name('doan.edit');
        Route::put('/update/{id}', [doanController::class, 'update'])->name('doan.update');
        Route::delete('/destroy/{id}', [doanController::class, 'destroy'])->name('doan.destroy');
        Route::get('/dowload/{id}', [doanController::class, 'dowload'])->name('doan.dowload');
    });

    Route::group(['prefix' => 'quanly'], function () {
        Route::get('/index', [quanlyController::class, 'index'])->name('quanly.quanly');
        Route::get('/edit/{id}', [quanlyController::class, 'edit'])->name('quanly.edit');
        Route::put('/update/{id}', [quanlyController::class, 'update'])->name('quanly.update');
        Route::delete('/destroy/{id}', [quanlyController::class, 'destroy'])->name('quanly.destroy');
    });

    Route::get('registration', [dangnhapController::class, 'registration'])->name('register.user');
    Route::post('custom-registration', [dangnhapController::class, 'customRegistration'])->name('register.custom');
    Route::get('signout', [dangnhapController::class, 'signOut'])->name('signout');
});
Route::post('custom-login', [dangnhapController::class, 'customLogin'])->name('login.custom');
