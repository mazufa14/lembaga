<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Http\Facades\DB;
use App\Models\program_belajar;


class ProgrambelajarController extends Controller
{
    //
    
    public function index()
    {
        //sintax dengan eloquent
        $program_belajar = program_belajar::all();
        return view ('admin.programbelajar.index', compact('program_belajar'));
    }

    public function create()
    {
        return view('admin.programbelajar.create');
    }


    public function store(Request $request){

        $this->validate($request,[
            'proker' => 'required|max:50',
        ],[
            'proker.required' => 'Wajib diisi',
            'proker.max' => 'Tidak lebih dari 50 karakter',
        ]);

        program_belajar::create([
            'nama_program_belajar' => $request->input('proker')
        ]);

        return redirect('/programbelajar')->with('success', 'Data Berhasil Tersimpan');

    }

    public function edit(string $id)
    {
        $program_belajar = program_belajar::all()->where('id',$id);
        return view ('admin.programbelajar.edit', compact('program_belajar'));
    }

    public function update(Request $request, string $id)
    {

        // 
        // 
        $this->validate($request,[
            'proker' => 'required|max:50',
        ],
        [
            'proker.required' => 'Wajib diisi',
            'proker.max' => 'Tidak lebih dari 50 karakter',
        ]);

        $program_belajar = program_belajar::find($id);
        $program_belajar->nama_program_belajar = $request->input('proker');
        $program_belajar->save();

        return redirect('/programbelajar')->with('success','Data berhasil diubah!');
    }

    public function delete($id)
    {
        $program_belajar = program_belajar::find($id);

        if(!$program_belajar){
            return redirect('/programbelajar')->with('error','Data tidak ditemukan!');
        }

        $program_belajar->delete();

        return redirect('/programbelajar')->with('success','Data berhasil dihapus!');


    }
}
