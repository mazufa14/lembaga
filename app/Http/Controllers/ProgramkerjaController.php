<?php

namespace App\Http\Controllers;
use illuminate\Http\Facades\DB;
use App\Models\program_kerja;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException; 


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

        return redirect('/programkerja')->with('success', 'Data Berhasil Tersimpan');

    }


    public function edit(string $id)
    {
        $program_kerja = program_kerja::all()->where('id',$id);
        return view ('admin.programkerja.edit', compact('program_kerja'));
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

        $program_kerja = program_kerja::find($id);
        $program_kerja->nama_program = $request->input('proker');
        $program_kerja->save();

        return redirect('/programkerja')->with('success','Data berhasil diubah!');
    }
   

    // public function delete($id)
    // {
    //     $program_kerja = program_kerja::find($id);

    //     if(!$program_kerja){
    //         return redirect('/programkerja')->with('error','Data tidak ditemukan!');
    //     }

    //     $program_kerja->delete();

    //     return redirect('/programkerja')->with('success','Data berhasil dihapus!');


    // }

    public function delete($id)
    {
    try {
        $program_kerja = program_kerja::findOrFail($id);
        $program_kerja->delete();
        return redirect('/programkerja')->with('success', 'Data berhasil dihapus!');
    } catch (QueryException $e) {
        return redirect('/programkerja')->with('error', 'Gagal menghapus data. Terdapat relasi yang terkait.');
    } catch (\Exception $e) {
        return redirect('/programkerja')->with('error', 'Gagal menghapus data.');
    }
    }


}
