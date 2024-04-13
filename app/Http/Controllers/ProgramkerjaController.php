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


    public function create()
    {
        return view('admin.programkerja.create');
    }


    public function store(Request $request){

        $this->validate($request,[
            'proker' => 'required|max:50',
        ],[
            'proker.required' => 'Wajib diisi',
            'proker.max' => 'Tidak lebih dari 50 karakter',
        ]);

        program_kerja::create([
            'nama_program' => $request->input('proker')
        ]);

        return redirect('/programkerja')->with('success', 'Data merk berhasil ditambahkan!');

    }
   


}
