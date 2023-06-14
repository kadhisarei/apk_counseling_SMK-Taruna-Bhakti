<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\WaliKelas;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\Exports\SiswaExport;
use App\Exports\WakelExport;
use App\Exports\KelasExport;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;



class AdminController extends Controller
{
    public function export() 
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function export2() 
    {
        return Excel::download(new WakelExport, 'Wali.xlsx');
    }
    public function export3() 
    {
        return Excel::download(new KelasExport, 'Kelas.xlsx');
    }
    public function export4() 
    {
        return Excel::download(new GuruExport, 'guruBK.xlsx');
    }
    public function index(){
        return redirect('/admin/dashboard');
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
            // 'email' => 'required|email',
            'password' => 'required|min:6',
            'nisn' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Pria,perempuan',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = new User();
        $user->name = $request->input('nama');
        // $user->email = $request->input('email');
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

        LogActivity::create([
            'Activity' => auth()->user()->name. ' telah menambahkan siswa baru dengan nama '.$siswa->user->name
        ]);
        
        $siswa->save();
        return redirect('/admin/dashboard/siswa')->with('success', 'siswa berhasil dibuat');
    }

    public function siswa_edit($id){
        $siswa = Siswa::with(['kelas', 'user'])->findOrFail($id);
        $kelas = Kelas::all();
        return view('dashboard.page.siswa-edit', compact('siswa', 'kelas'));
    }

    public function siswa_update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            // 'email' => 'required|email',
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
        // $user->email = $request->input('email');
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
        Schema::disableForeignKeyConstraints();
        $siswa->delete();
        // Hapus data user 
        $user->delete();
        Schema::enableForeignKeyConstraints();
        LogActivity::create([
            'Activity' => auth()->user()->name. ' telah menghapus data siswa '
        ]);    
        return redirect('/admin/dashboard/siswa')->with('success', 'Siswa berhasil dihapus');
    }

    //  crud guru 
    public function guru_index(){
        $guru = Guru::all();
        return view('dashboard.page.guru', compact('guru'));   
    }
    

    public function guru_create(){
        return view('dashboard.page.guru-add');
    }

    public function guru_store(Request $request){
        $request->validate([
            'profile_photo_path' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'nipd' => 'required',
            'jenis_kelamin' => 'required|in:Pria,perempuan',
        ]);

        $user = new User();
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->profile_photo_path = $request->file('profile_photo_path')->store('profile-photos', 'public');
        $user->assignRole('guru bk');
        $user->save();

        $guru = new Guru();
        $guru->nama = $request->input('nama');
        $guru->user_id = $user->id;
        $guru->nipd = $request->input('nipd');
        $guru->jenis_kelamin = $request->input('jenis_kelamin');
        $guru->profile_photo_path = $request->file('profile_photo_path')->store('profile-photos', 'public');
        $guru->save();
        LogActivity::create([
            'Activity' => auth()->user()->name. ' telah menambahkan guru baru dengan nama '.$guru->user->name
        ]);
        return redirect('/admin/dashboard/guru')->with('success', 'Guru berhasil ditambahkan');
    }

    public function guru_edit($id){
        $guru = Guru::findOrFail($id);
        return view('dashboard.page.guru-edit', compact('guru'));
    }

    public function guru_update(Request $request, $id){
        $request->validate([
            'profile_photo_path' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'nipd' => 'required',
            'jenis_kelamin' => 'required|in:Pria,perempuan',
        ]);
        $guru = Guru::findOrFail($id);
        $guru->nama = $request->input('nama');
        $guru->nipd = $request->input('nipd');
        $guru->jenis_kelamin = $request->input('jenis_kelamin');

        $user = $guru->user;
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        if ($request->hasFile('profile_photo_path') && $request->file('profile_photo_path')->isValid()) {
            if ($guru->profile_photo_path && Storage::exists($guru->profile_photo_path)) {
                Storage::delete($guru->profile_photo_path);
            }
            if ($user->profile_photo_path && Storage::exists($user->profile_photo_path)) {
                Storage::delete($user->profile_photo_path);
            }
            $guru->profile_photo_path = $request->file('profile_photo_path')->store('profile-photos', 'public');
            $user->profile_photo_path = $guru->profile_photo_path;
        }

        $user->save();
        $guru->save();
        LogActivity::create([
            'Activity' => auth()->user()->name. ' telah mengubah data guru '
        ]);

        return redirect('/admin/dashboard/guru')->with('success', 'guru berhasil diedit');
    }

    public function guru_delete($id)
    {
        $guru = Guru::findOrFail($id);
        $user = $guru->user;
        $poto = $guru->profile_photo_path;
        $poto = $user->profile_photo_path;
        $poto = !is_null($user->poto) && Storage::delete($user->poto);
        $poto = !is_null($guru->poto) && Storage::delete($guru->poto);

        // Hapus data siswa
        Schema::disableForeignKeyConstraints();
        $guru->delete();
        // Hapus data user 
        $user->delete();
        Schema::enableForeignKeyConstraints();
        LogActivity::create([
            'Activity' => auth()->user()->name. ' telah menghapus data guru '
        ]);    
    
        return redirect('/admin/dashboard/guru')->with('success', 'Guru berhasil dihapus');
    }
    
    // wakel
    public function wakel_index(){
        $wakel = WaliKelas::all();
        return view('dashboard.page.wakel', compact('wakel'));
    }

    public function wakel_create(){
        return view('dashboard.page.wakel-add');
    }
    public function wakel_store(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'nipd' => 'required',
            'jenis_kelamin' => 'required|in:Pria,perempuan',
        ]);

        $user = new User();
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->assignRole('wali kelas');
        $user->save();

        $wakel = new WaliKelas();
        $wakel->nama = $request->input('nama');
        $wakel->user_id = $user->id;
        $wakel->nipd = $request->input('nipd');
        $wakel->jenis_kelamin = $request->input('jenis_kelamin');
        $wakel->save();
        LogActivity::create([
            'Activity' => auth()->user()->name. ' telah menambahkan walikelas baru dengan nama '.$wakel->user->name
        ]);
        return redirect('/admin/dashboard/wakel')->with('success', 'WaliKelas berhasil dibuat');
    }

    public function wakel_edit($id){
        $wakel = WaliKelas::with(['user'])->findOrFail($id);
        return view('dashboard.page.wakel-edit', compact('wakel'));
    }

    public function wakel_update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'nipd' => 'required',
            'jenis_kelamin' => 'required|in:Pria,perempuan',
        ]);

        $wakel = WaliKelas::findOrFail($id);
        $wakel->nama = $request->input('nama');
        $wakel->nipd = $request->input('nipd');
        $wakel->jenis_kelamin = $request->input('jenis_kelamin');
        $wakel->save();

        $user = $wakel->user;
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        LogActivity::create([
            'Activity' => auth()->user()->name. ' telah mengubah data wali kelas '
        ]);
        return redirect('/admin/dashboard/wakel')->with('success', 'Wali Kelas berhasil diedit');
    }

    public function wakel_delete($id)
    {
        $wakel = WaliKelas::findOrFail($id);
        $user = $wakel->user;
    
        // Hapus data wakel
        Schema::disableForeignKeyConstraints();
        $wakel->delete();
    
        // Hapus data user 
        $user->delete();
        Schema::enableForeignKeyConstraints();
        LogActivity::create([
            'Activity' => auth()->user()->name. ' telah menghapus data wali kelas  '
        ]);    
    
        return redirect('/admin/dashboard/wakel')->with('success', 'Wali Kelas berhasil dihapus');
    }
    
    public function kelas_index(){
        $kelas = Kelas::with('wali_kelas','guru')->get();
        return view('dashboard.page.Kelas', compact('kelas'));
    }

    public function kelas_create(){
        $guru = Guru::all();
        $walas = WaliKelas::whereDoesntHave('kelas')->get();
        return view('dashboard.page.kelas-add', compact('guru','walas'));
    }
    
    public function kelas_store(Request $request){
        $request->validate([
            'nama' => 'required',
            'wali_kelas_id' =>'required',
            'guru_id' =>'required'
        ]);

        $kelas = New Kelas();
        $kelas->nama = $request->input('nama');
        $kelas->wali_kelas_id = $request->input('wali_kelas_id');
        $kelas->guru_id = $request->input('guru_id');
        $kelas->save();
        LogActivity::create([
            'Activity' => auth()->user()->name. ' telah menambahkan kelas baru dengan nama '.$kelas->nama
        ]);
        return redirect('/admin/dashboard/kelas')->with('success', 'Kelas berhasil di tambah');
    }

    public function kelas_edit($id){
        $kelas = Kelas::findOrFail($id);
        $guru = Guru::all();
        $walas = WaliKelas::all();
        return view('dashboard.page.kelas-edit', compact('kelas','guru','walas'));
    }

    public function kelas_update(Request $request, $id){
    $request->validate([
        'nama' => 'required',
        'wali_kelas_id' =>'required',
        'guru_id' =>'required',
    ]);
    $kelas = Kelas::findOrFail($id);
    $kelas->nama = $request->input('nama');
    $kelas->wali_kelas_id = $request->input('wali_kelas_id');
    $kelas->guru_id = $request->input('guru_id');
    $kelas->save();
    LogActivity::create([
        'Activity' => auth()->user()->name. ' telah mengubah data siswa '
    ]);
    return redirect('/admin/dashboard/kelas')->with('success', 'Kelas berhasil di ubah');
    }

    public function kelas_delete($id){
        $kelas = Kelas::findOrFail($id);
        Schema::disableForeignKeyConstraints();
        $kelas->delete();
        Schema::enableForeignKeyConstraints();
        LogActivity::create([
            'Activity' => auth()->user()->name. ' telah menghapus data siswa '
        ]);
        return redirect('/admin/dashboard/kelas')->with('success', 'Kelas berhasil dihapus');
    }

    public function index_activity(){
        $activity = LogActivity::all();
        $guru = Guru::all();
        $siswa = Siswa::all();
        $walas = WaliKelas::all();
        $kelas = Kelas::all();
        return view('dashboard.page.index',  compact('activity','guru','siswa','walas','kelas'));
    }
    
}
