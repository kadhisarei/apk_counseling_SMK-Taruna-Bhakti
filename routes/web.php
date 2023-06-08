<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
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

Route::get('/landing', function () {
    return view('home');
})->name('index');
// Route::get('/landing', function () {
//     return view('home');
// });

Route::get('/apa', function () {
    return view('dashboard.apa');
})->name('dashboard.apa');
Route::get('/student', function () {
    return view('StudentInfo');
})->name('StudentInfo');

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
    // wakel
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard/wakel',[AdminController::class,'wakel_index']);
    Route::get('/admin/dashboard/wakel/create',[AdminController::class,'wakel_create']);
    Route::post('/admin/dashboard/wakel/store',[AdminController::class,'wakel_store']);
    Route::get('/admin/dashboard/wakel/edit/{id}',[AdminController::class,'wakel_edit']);
    Route::put('/admin/dashboard/wakel/edit/{id}',[AdminController::class,'wakel_update']);
    Route::delete('/admin/dashboard/wakel/delete/{id}', [AdminController::class, 'wakel_delete']);

});

// siswa

// Route::get('',[Siswacontroller::class,'show']);

// Route::get('',[SiswaController::class,'create']);

// Route::post('',[SiswaController::class,'store']);

// Route::delete('{id}',[SiswaController::class,'destroy']);

// Route::get('{id}',[SiswaController::class,'edit']);

// Route::put('{id}',[SiswaController::class,'update']);

// // guru

// Route::get('',[Gurucontroller::class,'show']);

// Route::get('',[GuruController::class,'create']);

// Route::post('',[GuruController::class,'store']);

// Route::delete('{id}',[GuruController::class,'destroy']);

// Route::get('{id}',[GuruController::class,'edit']);

// Route::put('{id}',[GuruController::class,'update']);