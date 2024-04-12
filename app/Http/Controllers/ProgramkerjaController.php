<?php

namespace App\Http\Controllers;
use illuminate\Http\Facades\DB;
use App\Models\program_kerja;
use Illuminate\Http\Request;

class ProgramkerjaController extends Controller
{
    //
    public function index()
    {
        //sintax dengan eloquent
        $program_kerja = program_kerja::all();
        return view ('admin.programkerja.index', compact('program_kerja'));
    }
}
