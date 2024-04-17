<?php

namespace App\Http\Controllers;

use App\Models\proses_belajar;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProsesbelajarController extends Controller
{
    //
   
    public function index(){
       
        $proses_belajar = proses_belajar::join('pendaftar_belajar', 'nama_murid', '=', 'pendaftar_belajar.id')
        ->join('program_belajar', 'program_proses_belajar', '=', 'program_belajar.id')
        ->select('proses_belajar.*', 'pendaftar_belajar.pendaftar_belajar as namapelajar', 'program_belajar.nama_program_belajar as namaprogrambelajar')
        ->get();

        return view('admin.prosesbelajar.index', compact('proses_belajar'));

    }

    
    public function show(string $id){

        $proses_belajar = proses_belajar::join('pendaftar_belajar', 'nama_murid', '=', 'pendaftar_belajar.id')
        ->join('program_belajar', 'program_proses_belajar', '=', 'program_belajar.id')
        ->select('proses_belajar.*', 'pendaftar_belajar.pendaftar_belajar as namapelajar', 'program_belajar.nama_program_belajar as namaprogrambelajar')
        ->where('proses_belajar.id', $id)
        ->get();

        return view('admin.prosesbelajar.detail', compact('proses_belajar'));

    }

    public function edit(string $id)
    {
        $program_belajar = DB::table('program_belajar')->get();
        $pendaftar_belajar = DB::table('pendaftar_belajar')->get();
        $proses_belajar = DB::table('proses_belajar')->where('id',$id)->get();
        return view ('admin.prosesbelajar.edit', compact('pendaftar_belajar','proses_belajar','program_belajar'));
        
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            // 'nama' => 'required|unique:proses_belajar,nama_murid',
            'program_belajar' => 'required',
            'deskripsi' => 'required|max:225',
        ],
        [
            // 'nama.required' => 'Nama siswa wajib diisi',
            // 'nama.unique' => 'Nama yang diinput sudah ada', 
            'program_belajar.required' => 'Program belajar wajib diisi',
            'deskripsi.required' => 'Deskripsi siswa wajib diisi',
            'deskripsi.max' => 'Maksimal deskripsi 225 karakter',
           
        ]);

        // update data
        DB::table('proses_belajar')->where('id', $request->id)->update([
            'program_proses_belajar' =>$request->program_belajar,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/prosesbelajar')->with('success','Data berhasil diupdate!');

    }





    public function create()
    {
        $pendaftar_belajar = DB::table('pendaftar_belajar')->get();
        $program_belajar = DB::table('program_belajar')->get();
        return view ('admin.prosesbelajar.create', compact('pendaftar_belajar','program_belajar'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|unique:proses_belajar,nama_murid',
            'program_belajar' => 'required',
            'deskripsi' => 'required|max:225',
        ],
        [
            'nama.required' => 'Nama siswa wajib diisi',
            'nama.unique' => 'Nama yang diinput sudah ada', 
            'program_belajar.required' => 'Program kerja wajib diisi',
            'deskripsi.required' => 'Deskripsi siswa wajib diisi',
            'deskripsi.max' => 'Maksimal deskripsi 225 karakter',
           
        ]);

        // Tambah data dengan query builder
        DB::table('proses_belajar')->insert([
            'nama_murid' => $request->nama,
            'program_proses_belajar' =>$request->program_belajar,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/prosesbelajar')->with('success','Data berhasil tersimpan');

    }

    public function destroy(string $id)
    {
        DB::table('proses_belajar')->where('id',$id)->delete();
        return redirect('/prosesbelajar')->with('success','Data berhasil dihapus!');
    }
}
