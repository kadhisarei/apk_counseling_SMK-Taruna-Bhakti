<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\PetaKerawananController;
use App\Http\Controllers\SosialisasiController;

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
    return view('home');
})->name('index');
Route::get('/carousell', function () {
    return view('carousell');
});
// Route::get('/landing', function () {
//     return view('home');
// });

Route::get('/apa', function () {
    return view('dashboard.apa');
})->name('dashboard.apa');
// Route::get('/student', function () {
//     return view('StudentInfo');
// })->name('StudentInfo');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard.page.index', [HomeController::class,'redirectUser']);
    // })->name('dashboard');
    Route:: get('/dashboard', [HomeController::class, 'redirectUser'])->name('dashboard');
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
    Route::get('/layanan',[LayananController::class,'create'])->name('layanan');
    Route::post('/layanan-store',[LayananController::class,'store'])->name('layanan-store');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:admin'
])->group(function () {
    // Route::get('/admin/dashboard', function () {
    //     return view('dashboard');
    // })->name('admin.dashboard');
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    // profil

    // siswa
    Route::get('/admin/dashboard/siswa',[AdminController::class,'siswa_index']);
    Route::get('/admin/dashboard/siswa/export/', [AdminController::class, 'export']);
    Route::get('/admin/dashboard/siswa/create',[AdminController::class,'siswa_create']);
    Route::post('/admin/dashboard/siswa/store',[AdminController::class,'siswa_store']);
    Route::get('/admin/dashboard/siswa/edit/{id}',[AdminController::class,'siswa_edit']);
    Route::put('/admin/dashboard/siswa/edit/{id}',[AdminController::class,'siswa_update']);
    Route::delete('/admin/dashboard/siswa/delete/{id}', [AdminController::class, 'siswa_delete']);
    // wakel
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard/wakel',[AdminController::class,'wakel_index']);
    Route::get('/admin/dashboard/wakel/export/', [AdminController::class, 'export2']);
    Route::get('/admin/dashboard/wakel/create',[AdminController::class,'wakel_create']);
    Route::post('/admin/dashboard/wakel/store',[AdminController::class,'wakel_store']);
    Route::get('/admin/dashboard/wakel/edit/{id}',[AdminController::class,'wakel_edit']);
    Route::put('/admin/dashboard/wakel/edit/{id}',[AdminController::class,'wakel_update']);
    Route::delete('/admin/dashboard/wakel/delete/{id}', [AdminController::class, 'wakel_delete']);


    // guru
    Route::get('/admin/dashboard/guru',[AdminController::class,'guru_index']);
    Route::get('/admin/dashboard/guru/create',[AdminController::class,'guru_create']);
    Route::get('/admin/dashboard/guru/export/', [AdminController::class, 'export4']);
    Route::post('/admin/dashboard/guru/store',[AdminController::class,'guru_store']);
    Route::get('/admin/dashboard/guru/edit/{id}',[AdminController::class,'guru_edit']);
    Route::put('/admin/dashboard/guru/edit/{id}',[AdminController::class,'guru_update']);
    Route::delete('/admin/dashboard/guru/delete/{id}', [AdminController::class, 'guru_delete']);

    Route::get('/admin/dashboard/kelas',[AdminController::class,'kelas_index']);
    Route::get('/admin/dashboard/kelas/export/', [AdminController::class, 'export3']);
    Route::get('/admin/dashboard/kelas/create',[AdminController::class,'kelas_create']);
    Route::post('/admin/dashboard/kelas/store',[AdminController::class,'kelas_store']);
    Route::get('/admin/dashboard/kelas/edit/{id}',[AdminController::class,'kelas_edit']);
    Route::put('/admin/dashboard/kelas/edit/{id}',[AdminController::class,'kelas_update']);
    Route::delete('/admin/dashboard/kelas/delete/{id}',[AdminController::class,'kelas_delete']);

    Route::get('/admin/dashboard',[AdminController::class,'index_activity']);

    // Route::get('/admin/dashboard/profile/admin', function(){
    //     return view('profile.show');
    // })->name('profile');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','role:guru bk'
])->group(function () {
    Route::get('/guru/dashboard',[GuruController::class,'index'])->name('guru.dashboard');
    Route::get('/guru/kerawanan', [PetaKerawananController::class,'kerawanan_guru_index']);
    Route::get('/guru/kerawanan/index', [PetaKerawananController::class,'kerawanan_guru_index_kelas']);
    Route::get('/guru/kerawanan/create/{id}', [PetaKerawananController::class,'kerawanan_guru_create']);
    Route::post('/guru/kerawanan/store', [PetaKerawananController::class,'kerawanan_guru_store']);
    Route::get('/guru/kerawanan/edit/{id}', [PetaKerawananController::class,'kerawanan_guru_edit']);
    Route::put('/guru/kerawanan/update/{id}', [PetaKerawananController::class,'kerawanan_guru_update']);
    Route::delete('/guru/kerawanan/delete/{id}', [PetaKerawananController::class, 'kerawanan_delete_guru']);
    
    Route::get('/guru/layanan/request',[LayananController::class, 'indexRequest'])->name('requet-guru');
    Route::get('/guru/layanan/data',[LayananController::class, 'dataConfirm'])->name('data-confirm');
    Route::get('/guru/layanan/finished',[LayananController::class, 'konselingFinished'])->name('data-finished');
    Route::put('/guru/layanan/approve/{id}',[LayananController::class, 'approve'])->name('approve');
    Route::put('/guru/layanan/reschedule/{id}',[LayananController::class, 'reschedule'])->name('reschedule');
    Route::put('/guru/layanan/confirm/{id}',[LayananController::class, 'confirmStore'])->name('confirm');

    Route::get('/guru/sosialisasi', [SosialisasiController::class,'sosialisasi_index']);
    Route::get('/guru/sosialisasi/create', [SosialisasiController::class,'sosialisasi_create']);
    Route::post('/guru/sosialisasi/store', [SosialisasiController::class,'sosialisasi_store']);
    Route::get('/guru/sosialisasi/edit/{id}', [SosialisasiController::class,'sosialisasi_edit']);
    Route::put('/guru/sosialisasi/update/{id}', [SosialisasiController::class,'sosialisasi_update']);
    Route::delete('/guru/sosialisasi/delete/{id}', [SosialisasiController::class,'sosialisasi_delete']);

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','role:wali kelas'
])->group(function () {
    Route::get('/walas/dashboard',[WaliKelasController::class,'index_walas'])->name('walas.dashboard');
    Route::get('/walas/kerawanan', [PetaKerawananController::class, 'kerawanan_index']);
    Route::get('/walas/kerawanan/create', [PetaKerawananController::class, 'kerawanan_create']);
    Route::post('/walas/kerawanan/store', [PetaKerawananController::class, 'kerawanan_store']);
    Route::get('/walas/kerawanan/edit/{id}', [PetaKerawananController::class, 'kerawanan_edit']);
    Route::put('/walas/kerawanan/edit/{id}', [PetaKerawananController::class, 'kerawanan_update']);
    Route::delete('/walas/kerawanan/delete/{id}', [PetaKerawananController::class, 'kerawanan_delete']);

});

Route::get('/profile', function(){
    return view('profile.show');
})->name('profile'); 

