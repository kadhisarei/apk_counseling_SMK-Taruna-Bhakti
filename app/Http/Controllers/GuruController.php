<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_walas'=> 'required',
            'nama_guru'=> 'required',
            'walas'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
           ]);
            $input = $request->all();
            Guru::create($input);
      
            return redirect('')
                    ->with('success','data disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru,$id)
    {
        $data=Guru::find($id);
        $guru = Guru::all();
        return view('',['data'=>$data,'guru'=>$guru]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru,$id)
    {
        $guru = Guru::find($id);
        $request->validate([
            'id_walas'=> 'required',
            'nama_guru'=> 'required',
            'walas'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
           ]);
           $guru->update($request->all());
           return redirect('')
           ->with('success','data disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('resources.index');
    }
}
