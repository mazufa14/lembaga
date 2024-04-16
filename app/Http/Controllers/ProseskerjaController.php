<?php

namespace App\Http\Controllers;

use App\Models\proses_kerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProseskerjaController extends Controller
{
    //
    public function index(){

        // $proses_kerja = proses_kerja::join('pendaftar_kerja','nama_pekerja', '=', 'pendaftar_kerja.id')
        // ->select('proses_kerja.*','pendaftar_kerja.pendaftar_pekerja as namapekerja')
        // ->get();

        // proses_kerja::join('program_kerja','program_proses_pekerja', '=', 'program_kerja.id')
        // ->select('proses_kerja.*','program_kerja.nama_program as namaprogram')
        // ->get();

       
        $proses_kerja = proses_kerja::join('pendaftar_kerja', 'nama_pekerja', '=', 'pendaftar_kerja.id')
        ->join('program_kerja', 'program_proses_kerja', '=', 'program_kerja.id')
        ->select('proses_kerja.*', 'pendaftar_kerja.pendaftar_pekerja as namapekerja', 'program_kerja.nama_program as namaprogram')
        ->get();

        return view('admin.proseskerja.index', compact('proses_kerja'));

    }

    public function create()
    {
        //

        $pendaftar_kerja = DB::table('pendaftar_kerja')->get();
        $program_kerja = DB::table('program_kerja')->get();
        return view ('admin.proseskerja.create', compact('pendaftar_kerja','program_kerja'));


    }


    public function edit(string $id){
        
               
        $program_kerja = DB::table('program_kerja')->get();
        $pendaftar_kerja = DB::table('pendaftar_kerja')->get();
        $proses_kerja = DB::table('proses_kerja')->where('id',$id)->get();
        return view ('admin.proseskerja.edit', compact('pendaftar_kerja','proses_kerja','program_kerja'));
        
    }


    // public function update(Request $request, string $id)
    // {
    //     $this->validate($request,[
    //         'nama' => 'required',
    //         'program_kerja' => 'required',
    //         'kebahasaan' => 'required',
    //         'pekerjaan' => 'required',
    //         'deskripsi' => 'required|max:225',
    //     ],
    //     [
    //         'program_kerja.required' => 'Program kerja wajib diisi',
    //         'deskripsi.required' => 'Deskripsi siswa wajib diisi',
    //         'deskripsi.max' => 'Maksimal deskripsi 225 karakter',
    //         'pekerjaan.required' => 'Sertfikasi pekerjaan wajib diisi',
    //         'kebahasaan.required' => 'Sertifkasi wajib diisi', 
    //     ]);

    //     DB::table('proses_kerja')->where('id', $request->id)->update([
    //         'nama_pekerja' => $request->nama,
    //         'program_proses_kerja' =>$request->program_kerja,
    //         'deskripsi' => $request->deskripsi,
    //         'sertifikasi' => $request->pekerjaan,
    //         'kebahasaan' => $request->kebahasaan,
    //     ]);

    //     $proses_kerja = proses_kerja::find($id);

    //     $proses_kerja->nama_pekerja = $request->input('nama');
    //     $proses_kerja->program_proses_kerja = $request->input('program_kerja');
    //     $proses_kerja->deskripsi = $request->input('deskripsi');
    //     $proses_kerja->sertifikasi =$request->input('sertfikasi');
    //     $proses_kerja->kebahasaan = $request->input('kebahasaan');
    //     $proses_kerja->save();

    //     return redirect('/proseskerja')->with('success','Data berhasil diupdate!');
    // }








    // |unique:proses_kerja,nama_pekerja'

    public function store(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'program_kerja' => 'required',
            'kebahasaan' => 'required',
            'pekerjaan' => 'required',
            'deskripsi' => 'required|max:225',
        ],
        [
            'nama.required' => 'Nama siswa wajib diisi',
            // 'nama.unique' => 'Nama yang sudah diinput sudah ada', 
            'program_kerja.required' => 'Program kerja wajib diisi',
            'deskripsi.required' => 'Deskripsi siswa wajib diisi',
            'deskripsi.max' => 'Maksimal deskripsi 225 karakter',
            'pekerjaan.required' => 'Sertfikasi pekerjaan wajib diisi',
            'kebahasaan.required' => 'Sertifkasi wajib diisi',
            
           
        ]);

        // Tambah data 
        DB::table('proses_kerja')->insert([
            'nama_pekerja' => $request->nama,
            'program_proses_kerja' =>$request->program_kerja,
            'deskripsi' => $request->deskripsi,
            'sertifikasi' => $request->pekerjaan,
            'kebahasaan' => $request->kebahasaan,
        ]);
        return redirect('/proseskerja')->with('success','Data berhasil tersimpan');

    }

    



    public function show(string $id)
    {
        $proses_kerja = proses_kerja::join('pendaftar_kerja', 'nama_pekerja', '=', 'pendaftar_kerja.id')
        ->join('program_kerja', 'program_proses_kerja', '=', 'program_kerja.id')
        ->select('proses_kerja.*', 'pendaftar_kerja.pendaftar_pekerja as namapekerja', 'program_kerja.nama_program as namaprogram')
        ->where('proses_kerja.id', $id)
        ->get();
    
        return view('admin.proseskerja.detail', compact('proses_kerja'));
    }


    public function destroy(string $id)
    {
        DB::table('proses_kerja')->where('id',$id)->delete();
        return redirect('/proseskerja')->with('success','Data berhasil dihapus!');
    }
   
}
