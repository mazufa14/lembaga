<?php

namespace App\Http\Controllers;

use App\Models\pendaftar_kerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftarkerjaController extends Controller
{
    //
    public function index(){

        $pendaftar_kerja = pendaftar_kerja::join('program_kerja','program', '=', 'pendaftar_kerja.id')
        ->select('pendaftar_kerja.*','program_kerja.nama_program as nama_program')
        ->get();
        return view ('admin.pendaftarkerja.index', compact('pendaftar_kerja'));


    }

    public function create()
    {
        $program_kerja = DB::table('program_kerja')->get();
        return view ('admin.pendaftarkerja.create', compact('program_kerja'));
        
    }
}
