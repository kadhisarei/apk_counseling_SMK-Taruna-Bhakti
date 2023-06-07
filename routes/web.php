<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\BkController;

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
    return view('welcome');
});
Route::get('/landing', function () {
    return view('home');
});
Route::get('/index', function () {
    return view('dashboard.index');
})->name('dashboard.index');
Route::get('/apa', function () {
    return view('dashboard.apa');
})->name('dashboard.apa');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [HomeController::class,'redirectUser']);
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','role:user'
])->group(function () {
    Route::get('/home', function () {
        return view('dashboard');
    })->name('user.dashboard');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:admin'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');
});

// siswa

Route::get('',[Siswacontroller::class,'show']);

Route::get('',[SiswaController::class,'create']);

Route::post('',[SiswaController::class,'store']);

Route::delete('{id}',[SiswaController::class,'destroy']);

Route::get('{id}',[SiswaController::class,'edit']);

Route::put('{id}',[SiswaController::class,'update']);

// guru

Route::get('',[Gurucontroller::class,'show']);

Route::get('',[GuruController::class,'create']);

Route::post('',[GuruController::class,'store']);

Route::delete('{id}',[GuruController::class,'destroy']);

Route::get('{id}',[GuruController::class,'edit']);

Route::put('{id}',[GuruController::class,'update']);

// gurubk

Route::get('',[Bkcontroller::class,'show']);

Route::get('',[BkController::class,'create']);

Route::post('',[BkController::class,'store']);

Route::delete('{id}',[BkController::class,'destroy']);

Route::get('{id}',[BkController::class,'edit']);

Route::put('{id}',[BkController::class,'update']);