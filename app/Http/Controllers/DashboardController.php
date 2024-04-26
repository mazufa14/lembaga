<?php

namespace App\Http\Controllers;

use App\Models\pendaftar_kerja;
use App\Models\program_kerja;
use App\Models\proses_kerja;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //function index
    public function index(){

        $pendaftar_kerja = pendaftar_kerja::count();
        $program_kerja = program_kerja::count();
        $proses_kerja = proses_kerja::count();
        $akun_siswa = User::where('role', 'siswa')->count();

        return view('admin.dashboard', compact('pendaftar_kerja','program_kerja','proses_kerja','akun_siswa')); 
        //mengarahkan ke file dashboard yg ada didalam admin
    }

    //function index
    public function page(){
        return view('admin.pagenot'); //mengarahkan ke file dashboard yg ada didalam admin
    }
}
