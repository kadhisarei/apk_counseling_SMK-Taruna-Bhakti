<?php

namespace App\Http\Controllers;

use App\Models\Bk;
use Illuminate\Http\Request;

class BkController extends Controller
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
        $bk = Bk::all();
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_bk'=> 'required',
            'nama_bk'=> 'required',
            'ttl'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
           ]);
            $input = $request->all();
            Bk::create($input);
      
            return redirect('')
                    ->with('success','data disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bk $bk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bk $bk,$id)
    {
        $data=Bk::find($id);
        $bk = Bk::all();
        return view('',['data'=>$data,'bk'=>$bk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bk $bk,$id)
    {
        $bk = Bk::find($id);
        $request->validate([
            'id_bk'=> 'required',
            'nama_bk'=> 'required',
            'ttl'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
           ]);
           $bk->update($request->all());
           return redirect('')
           ->with('success','data disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bk $bk)
    {
        $bk->delete();

        return redirect()->route('');
    }
}
