<?php

namespace App\Http\Controllers;

use App\Models\pendaftar_kerja;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //function index
    public function index(){

        $pendaftar_kerja = pendaftar_kerja::count();

        return view('admin.dashboard', compact('pendaftar_kerja')); 
        //mengarahkan ke file dashboard yg ada didalam admin
    }

    //function index
    public function page(){
        return view('admin.pagenot'); //mengarahkan ke file dashboard yg ada didalam admin
    }
}
