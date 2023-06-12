<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaliKelas;
use App\Models\Siswa;
use App\Models\JenisKerawanan;
use App\Models\PetaKerawanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\Guru;
use App\Models\Kelas;

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

    // public function kerawanan_edit($id){
    //     $user = Auth::user();
    //     $walas = $user->wali_kelas;
    //     $peta = PetaKerawanan::all();
    //     $petaKerawanan = PetaKerawanan::findOrFail($id);
    //     $siswa = $walas->kelas->siswa;
    //     $jenisKerawanan = [
    //         'Sering sakit', 'Sering ijin', 'Sering alpha','Sering terlambat','Bolos', 'Kelainan jasmani',
    //         'Minat/ motivasi belajar kurang', 'Introvert / pendiam', 'Tinggal dengan wali',
    //         'Kemampuan kurang', 'Berkelahi', 'Menentang guru','Mengganggu teman', 'Pacaran','Broken home','Kondisi ekonomi kurang ',
    //         'Pergaulan di luar sekolah', 'Pengguna narkoba','Merokok','Membiayai sekolah sendiri / bekerja',

    //     ];
    //     return view('dashboard.page.kerawanan-edit_walas', compact('jenisKerawanan','walas','peta','petaKerawanan', 'siswa'));
    // }
        public function kerawanan_edit($id)
    {
        $user = Auth::user();
        $walas = $user->wali_kelas;
        $siswa = $walas->kelas->siswas;
        $jenisKerawanan = [
            'Sering sakit', 'Sering ijin', 'Sering alpha','Sering terlambat','Bolos', 'Kelainan jasmani',
            'Minat/ motivasi belajar kurang', 'Introvert / pendiam', 'Tinggal dengan wali',
            'Kemampuan kurang', 'Berkelahi', 'Menentang guru','Mengganggu teman', 'Pacaran','Broken home','Kondisi ekonomi kurang ',
            'Pergaulan di luar sekolah', 'Pengguna narkoba','Merokok','Membiayai sekolah sendiri / bekerja',
        ];
        $petaKerawanan = PetaKerawanan::findOrFail($id);
        return view('dashboard.page.kerawanan-edit_walas', compact('walas', 'siswa', 'jenisKerawanan', 'petaKerawanan'));
    }

public function kerawanan_update(Request $request, $id)
{
    $jenisKerawanan = implode(',', $request->jenis_kerawanan);
    $petaKerawanan = PetaKerawanan::findOrFail($id);
    $petaKerawanan->siswa_id = $request->siswa_id;
    $petaKerawanan->jenis_kerawanan = $jenisKerawanan;
    $petaKerawanan->save();
    return redirect('/walas/kerawanan')->with('success', 'Data peta kerawanan berhasil diperbarui.');
}
public function kerawanan_delete($id)
{
    $petaKerawanan = PetaKerawanan::findOrFail($id);
    Schema::disableForeignKeyConstraints();
    $petaKerawanan->delete();
    Schema::enableForeignKeyConstraints();
    return redirect('/walas/kerawanan')->with('success', 'Data peta kerawanan berhasil dihapus.');
}

    //  guru
    public function kerawanan_guru_index(){
        $guru = Auth::user()->guru;

        // Ambil ID kelas yang diajar oleh guru
        $kelasGuruDiajar = Kelas::where('guru_id', $guru->id)->pluck('id');

        // Ambil ID kelas yang menjadi wali kelas oleh guru
        $kelasGuruWali = Kelas::where('wali_kelas_id', $guru->id)->pluck('id');

        // Gabungkan ID kelas yang diajar dan ID kelas yang menjadi wali kelas
        $kelas = $kelasGuruDiajar->merge($kelasGuruWali);

        // Ambil data siswa yang berada di kelas yang diajar atau menjadi wali kelas oleh guru
        $siswa = Siswa::whereIn('kelas_id', $kelas)->get();

        // Ambil data kerawanan yang terkait dengan siswa-siswa di kelas yang diajar atau menjadi wali kelas oleh guru
        $petaKerawanan = PetaKerawanan::whereIn('siswa_id', $siswa->pluck('id'))->get();

        return view('dashboard.page.kerawanan_guru', compact('petaKerawanan'));
    }

    public function kerawanan_guru_index_kelas()
    {
        $guru = Auth::user()->guru;
        $kelas = $guru->kelas;
        return view('dashboard.page.kerawanan_add_guru', compact('kelas'));
    }
    public function kerawanan_guru_create($id)
    {
        $siswa = Siswa::where("kelas_id",$id)->get();
        $kelas = Kelas::findOrFail($id);
        $wakel = $kelas->wali_kelas;
        $jenisKerawanan = [
            'Sering sakit', 'Sering ijin', 'Sering alpha','Sering terlambat','Bolos', 'Kelainan jasmani',
            'Minat/ motivasi belajar kurang', 'Introvert / pendiam', 'Tinggal dengan wali',
            'Kemampuan kurang', 'Berkelahi', 'Menentang guru','Mengganggu teman', 'Pacaran','Broken home','Kondisi ekonomi kurang ',
            'Pergaulan di luar sekolah', 'Pengguna narkoba','Merokok','Membiayai sekolah sendiri / bekerja',
        ];
        return view('dashboard.page.kerawanan_add2_guru', compact('siswa','jenisKerawanan','wakel'));
    }
    public function kerawanan_guru_store(Request $request){
        $jenisKerawanan = implode(',', $request->jenis_kerawanan);
        $petaKerawanan = PetaKerawanan::create([
            'siswa_id' => $request->siswa_id,
            'wali_kelas_id' => $request->wali_kelas_id,
            'jenis_kerawanan' => $jenisKerawanan,
            'kesimpulan' => $request->kesimpulan
        ]);
        return redirect('/guru/kerawanan')->with('success', 'Data peta kerawanan berhasil disimpan.');
    }

    public function kerawanan_guru_edit($id){
        $guru = Auth::user()->guru;
        $petaKerawanan = PetaKerawanan::findOrFail($id);
        $siswa = Siswa::where('kelas_id', $petaKerawanan->siswa->kelas_id)->get();
        $kelas = Kelas::findOrFail($petaKerawanan->siswa->kelas_id);
        $wakel = $kelas->wali_kelas;
        $jenisKerawanan = [
            'Sering sakit', 'Sering ijin', 'Sering alpha','Sering terlambat','Bolos', 'Kelainan jasmani',
            'Minat/ motivasi belajar kurang', 'Introvert / pendiam', 'Tinggal dengan wali',
            'Kemampuan kurang', 'Berkelahi', 'Menentang guru','Mengganggu teman', 'Pacaran','Broken home','Kondisi ekonomi kurang ',
            'Pergaulan di luar sekolah', 'Pengguna narkoba','Merokok','Membiayai sekolah sendiri / bekerja',
        ];
        return view('dashboard.page.kerawanan_edit_guru', compact('petaKerawanan', 'siswa','wakel','jenisKerawanan'));
    }

    public function kerawanan_guru_update(Request $request, $id){
        $jenisKerawanan = implode(',', $request->jenis_kerawanan);
        $petaKerawanan = PetaKerawanan::findOrFail($id);
        $petaKerawanan->siswa_id = $request->siswa_id;
        $petaKerawanan->kesimpulan = $request->kesimpulan;
        $petaKerawanan->jenis_kerawanan = $jenisKerawanan;
        $petaKerawanan->save();
        return redirect('/guru/kerawanan')->with('success', 'Data peta kerawanan berhasil diperbarui.');
    }

    public function kerawanan_delete_guru($id){
        $petaKerawanan = PetaKerawanan::findOrFail($id);
        Schema::disableForeignKeyConstraints();
        $petaKerawanan->delete();
        Schema::enableForeignKeyConstraints();
    return redirect('/guru/kerawanan')->with('success', 'Data peta kerawanan berhasil dihapus.');
    }

    
}