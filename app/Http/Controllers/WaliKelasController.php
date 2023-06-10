<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\WaliKelas;
use App\Models\Siswa;
use App\Models\JenisKerawanan;

use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index_walas(){
        return view('dashboard.page.index');
    }
}
