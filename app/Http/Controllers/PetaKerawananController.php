<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaliKelas;
use App\Models\Siswa;
use App\Models\JenisKerawanan;
use App\Models\PetaKerawanan;
use Illuminate\Support\Facades\Auth;

class PetaKerawananController extends Controller
{
    public function kerawanan_index(){
        $user = Auth::user();
        $walas = $user->wali_kelas;
        $peta = PetaKerawanan::where('wali_kelas_id', $walas->id)->get();
        // $peta->with('siswa',)
        return view('dashboard.page.kerawanan_walas', compact('walas','peta'));
    }
    public function kerawanan_create(){
        $user = Auth::user();
        $walas = $user->wali_kelas;
        $siswa = $walas->kelas->siswas;
        $jenisKerawanan = [
            'Sering sakit', 'Sering ijin', 'Sering alpha','Sering terlambat','Bolos', 'Kelainan jasmani',
            'Minat/ motivasi belajar kurang', 'Introvert / pendiam', 'Tinggal dengan wali',
            'Kemampuan kurang', 'Berkelahi', 'Menentang guru','Mengganggu teman', 'Pacaran','Broken home','Kondisi ekonomi kurang ',
            'Pergaulan di luar sekolah', 'Pengguna narkoba','Merokok','Membiayai sekolah sendiri / bekerja',

        ];
    
        // Tambahkan Anda sendiri sebagai pilihan wali kelas
        // $walasOptions = WaliKelas::pluck('nama', 'id')->prepend($walas->nama, $walas->id);
    
        // // Tambahkan siswa yang kelasnya sama dengan Anda
        // $siswaOptions = $siswa->pluck('nama', 'id');
        return view('dashboard.page.kerawanan-add_walas', compact('walas', 'siswa', 'jenisKerawanan'));
    }
    public function kerawanan_store(Request $request){
        $jenisKerawanan = implode(',', $request->jenis_kerawanan);
        $petaKerawanan = PetaKerawanan::create([
            'siswa_id' => $request->siswa_id,
            'wali_kelas_id' => $request->wali_kelas_id,
            'jenis_kerawanan' => $jenisKerawanan,
        ]);
        return redirect('/walas/kerawanan')->with('success', 'Data peta kerawanan berhasil disimpan.');
    }

    public function kerawanan_edit($id){
        $user = Auth::user();
        $walas = $user->wali_kelas;
        $peta = PetaKerawanan::all();
        $petaKerawanan = PetaKerawanan::findOrFail($id);
        $siswa = $walas->kelas->siswa;
        return view('dashboard.page.kerawanan-edit_walas', compact('walas','peta','petaKerawanan', 'siswa'));
    }
}





















