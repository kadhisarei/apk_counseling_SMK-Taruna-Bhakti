<?php

namespace App\Http\Controllers;

use App\Models\KonselingBK;
use App\Models\LayananBK;
use App\Models\Siswa;
use App\Models\SiswaKonseling;
use Carbon\Carbon;
use Countable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LayananController extends Controller
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
        $layananBK = LayananBK::all();
        $user = Auth::user();
        $profile = $user->siswa;
        $siswa = Siswa::all();
        return view('StudentInfo', compact('layananBK', 'siswa', 'profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_layanan' => 'required',
            'id_bk' => 'required',
            'id_walas' => 'required',
            'tanggal_konseling' => 'required',
        ]);
            $konseling = KonselingBK::create([
                'id_layanan' => $request->id_layanan,
                'id_bk' => $request->id_bk,
                'id_walas' => $request->id_walas,
                'tanggal_konseling' => $request->tanggal_konseling,
            ]);

            // dd($request->teman);

            if(Auth::user()->hasRole('user')) {
                $konseling->update([
                    'status' => 'Waiting',
                ]);
            };
            if(Auth::user()->hasRole('guru')) {
                $konseling->update([
                    'status' => 'Accepted',
                ]);
            };

        if($request->teman != [] && sizeof($request->teman) >= 1 ) {
            foreach($request->teman as $item) {
                SiswaKonseling::insert([
                    'id_siswa' => $item,
                    'id_konseling' => $konseling->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            SiswaKonseling::insert([
                'id_siswa' => Auth::user()->siswa->id,
                'id_konseling' => $konseling->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }else{
            SiswaKonseling::insert([
                'id_siswa' => Auth::user()->siswa->id,
                'id_konseling' => $konseling->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        if(Auth::user()->hasRole('user')) {
            return redirect('/');
        }else{
            return redirect('/layanan');
        };

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
