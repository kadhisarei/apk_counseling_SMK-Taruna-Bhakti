<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sosialisasi;
use Illuminate\Support\Facades\Storage;
class SosialisasiController extends Controller
{
    // di guru
    public function sosialisasi_index(){
        $Sosialisasi = Sosialisasi::all();
        return view('dashboard.page.sosialisasi', compact('Sosialisasi'));
    }

    public function sosialisasi_create(){
        $Sosialisasi = Sosialisasi::all();
        return view('dashboard.page.sosialisasi_add');
    }

    public function sosialisasi_store(Request $request){
        $request->validate([
            'judul' => 'required',
            'photo' =>'required',
            'tanggal' =>'required',
            'tempat' => 'required'
        ]);
        $Sosialisasi = new Sosialisasi();
        $Sosialisasi->judul = $request->input('judul');
        $Sosialisasi->tempat = $request->input('tempat');
        $Sosialisasi->tanggal = $request->date('tanggal');
        $Sosialisasi->photo = $request->file('photo')->store('photos', 'public');
        $Sosialisasi->save();

        return redirect('/guru/sosialisasi')->with('success', 'siswa berhasil diedit');

    }

    public function sosialisasi_edit($id){
        $Sosialisasi = Sosialisasi::find($id);
        return view('dashboard.page.sosialisasi_edit', compact('Sosialisasi') );
    }

    public function sosialisasi_update(Request $request, $id)
{
    $Sosialisasi = Sosialisasi::find($id);

    $Sosialisasi->judul = $request->input('judul');
    $Sosialisasi->tanggal = $request->input('tanggal');
    $Sosialisasi->tempat = $request->input('tempat');

    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        if ($Sosialisasi->photo && Storage::exists($Sosialisasi->photo)) {
            Storage::delete($Sosialisasi->photo);
        }
        $Sosialisasi->photo = $request->file('photo')->store('photos', 'public');
    }

    $Sosialisasi->save();

    return redirect('/guru/sosialisasi')->with('success', 'Sosialisasi berhasil diubah');
}
    public function sosialisasi_delete($id){
        $Sosialisasi = Sosialisasi::find($id);
        // Schema::disableForeignKeyConstraints();
        $Sosialisasi->delete();
        // Schema::enableForeignKeyConstraints();
        return redirect('/guru/sosialisasi')->with('success', 'siswa berhasil dibuat');
    }

    // public function
}
