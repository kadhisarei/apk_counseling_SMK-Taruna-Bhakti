<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Guru;


class AdminController extends Controller
{
    
    public function index(){
        return view('dashboard.page.index');
    }

    // crud siswa
    public function siswa_index(){
        $siswa = Siswa::all();
        return view('dashboard.page.siswa', compact('siswa'));
    }

    public function siswa_create(){
        $kelas = Kelas::all();
        return view('dashboard.page.siswa-add', compact('kelas'));
    }
    public function siswa_store(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'nisn' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Pria,perempuan',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = new User();
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->assignRole('user');
        $user->save();

        $siswa = new Siswa();
        $siswa->nama = $request->input('nama');
        $siswa->user_id = $user->id;
        $siswa->nisn = $request->input('nisn');
        $siswa->tanggal_lahir = $request->input('tanggal_lahir');
        $siswa->jenis_kelamin = $request->input('jenis_kelamin');
        $siswa->kelas_id = $request->input('kelas_id');
        $siswa->save();
        return redirect('/admin/dashboard/siswa')->with('success', 'siswa berhasil dibuat');
    }

    public function siswa_edit($id){
        $siswa = Siswa::findOrFail($id);
        $user = $siswa->user;
        $kelas = Kelas::all();
        return view('dashboard.page.siswa-edit', compact('siswa', 'user', 'kelas'));
    }

    public function siswa_update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'nisn' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Pria,perempuan',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->nama = $request->input('nama');
        $siswa->nisn = $request->input('nisn');
        $siswa->tanggal_lahir = $request->input('tanggal_lahir');
        $siswa->jenis_kelamin = $request->input('jenis_kelamin');
        $siswa->kelas_id = $request->input('kelas_id');
        $siswa->save();

        $user = $siswa->user;
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect('/admin/dashboard/siswa')->with('success', 'siswa berhasil diedit');
    }

    public function siswa_delete($id)
    {
        $siswa = Siswa::findOrFail($id);
        $user = $siswa->user;
    
        // Hapus data siswa
        $siswa->delete();
    
        // Hapus data user 
        $user->delete();
    
        return redirect('/admin/dashboard/siswa')->with('success', 'Siswa berhasil dihapus');
    }

    //  crud guru 
    public function guru_index(){
        $guru = Guru::all();
        return view('dashboard.page.guru', compact('guru'));   
    }

    public function guru_create(){
        $kelas = Kelas::all();
        return view('dashboard.page.guru-add', compact('kelas'));
    }

    public function guru_store(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'nipd' => 'required',
            'jenis_kelamin' => 'required|in:Pria,perempuan',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = new User();
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->assignRole('user');
        $user->save();

        $guru = new Guru();
        $guru->nama = $request->input('nama');
        $guru->user_id = $user->id;
        $guru->nipd = $request->input('nipd');
        $guru->jenis_kelamin = $request->input('jenis_kelamin');
        $guru->kelas_id = $request->input('kelas_id');
        $guru->save();
        return redirect('/admin/dashboard/guru')->with('success', 'siswa berhasil dibuat');
    }

    public function guru_edit($id){
        $guru = Guru::findOrFail($id);
        $user = $guru->user;
        $kelas = Kelas::all();
        return view('dashboard.page.guru-edit', compact('guru', 'user', 'kelas'));
    }

    public function guru_update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'nipd' => 'required',
            'jenis_kelamin' => 'required|in:Pria,perempuan',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->nama = $request->input('nama');
        $guru->nipd = $request->input('nipd');
        $guru->kelas_id = $request->input('kelas_id');
        $guru->save();

        $user = $guru->user;
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect('/admin/dashboard/guru')->with('success', 'guru berhasil diedit');
    }

    public function guru_delete($id)
    {
        $guru = Guru::findOrFail($id);
        $user = $guru->user;
    
        // Hapus data siswa
        $guru->delete();
    
        // Hapus data user 
        $user->delete();
    
        return redirect('/admin/dashboard/guru')->with('success', 'Siswa berhasil dihapus');
    }

}
