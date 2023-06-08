<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index(){
        return view('dashboard.page.index');

    }
}
