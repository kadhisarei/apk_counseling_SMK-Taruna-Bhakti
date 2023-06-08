<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function redirectUser() {
        if(auth()->user()->hasRole('admin')){
            return redirect()->route('admin.dashboard');
        }
        if(auth()->user()->hasRole('user')){
            return redirect()->route('user.dashboard');
        }
        if(auth()->user()->hasRole('guru bk')){
            return redirect()->route('guru.dashboard');
        }
        if(auth()->user()->hasRole('wali kelas')){
            return redirect()->route('walas.dashboard');
        }
    }
}
