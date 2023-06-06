<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
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
    return view('welcome');
});
Route::get('/landing', function () {
    return view('home');
});


Route::get('/apa', function () {
    return view('dashboard.apa');
})->name('dashboard.apa');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard.page.index', [HomeController::class,'redirectUser']);
    // })->name('dashboard');
    Route:: get('/dashboard', [HomeController::class, 'redirectUser']);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','role:user'
])->group(function () {
    // Route::get('/home', function () {
    //     return view('dashboard');
    // })->name('user.dashboard');
    Route::get('/user',[SiswaController::class,'index'])->name('user.dashboard');

});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:admin'
])->group(function () {
    // Route::get('/admin/dashboard', function () {
    //     return view('dashboard');
    // })->name('admin.dashboard');
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard/siswa',[AdminController::class,'siswa_index']);
    Route::get('/admin/dashboard/siswa/create',[AdminController::class,'siswa_create']);
    Route::post('/admin/dashboard/siswa/store',[AdminController::class,'siswa_store']);
    Route::get('/admin/dashboard/siswa/edit/{id}',[AdminController::class,'siswa_edit']);
    Route::put('/admin/dashboard/siswa/edit/{id}',[AdminController::class,'siswa_update']);
    Route::delete('/admin/dashboard/siswa/delete/{id}', [AdminController::class, 'siswa_delete']);

});
