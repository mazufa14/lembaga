<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepanController extends Controller
{
    //
    public function rumah(){
        return view ('depan.home');
    }

    public function about(){
        return view ('depan.about');
    }

    public function contact(){
        return view ('depan.contact');
    }

    public function program(){
        return view ('depan.program');
    }

    public function caradaftar(){
        return view ('depan.caradaftar');
    }

    public function kerjasama(){
        return view ('depan.kerjasama');
    }

    public function keberangkatan(){
        return view ('depan.keberangkatan');
    }

}
