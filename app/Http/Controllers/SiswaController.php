<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nipd'=> 'required
            ',
            'nama_siswa'=> 'required',
            'kelas'=> 'required',
            'jenis_kelamin'=> 'required',
            'email'=>'required',
            'password'=>'required'
           ]);
            $input = $request->all();
            Siswa::create($input);
      
            return redirect('')
                    ->with('success','data disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa , $id)
    {
        $data=Siswa::find($id);
        $Siswa = Siswa::all();
        return view('',['data'=>$data,'siswa'=>$Siswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa,$id)
    {
        $siswa = Siswa::find($id);
        $request->validate([
            'nipd'=> 'required',
            'nama_siswa'=> 'required',
            'kelas'=> 'required',
            'jenis_kelamin'=> 'required',
            'email'=>'required',
            'password'=>'required'
           ]);
           $siswa->update($request->all());
           return redirect('')
           ->with('success','data disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('resources.index');
    }
}
