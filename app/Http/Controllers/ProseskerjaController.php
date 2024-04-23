<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\proses_kerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException; 

class ProseskerjaController extends Controller
{
    

    // public function index(){
    
    //     // Mendapatkan ID pengguna yang sedang login
    //     $user_id = Auth::id(); 

    //     // Mengambil data proses kerja yang dimiliki oleh pengguna yang sedang login
    //     $proses_kerja = proses_kerja::join('users', 'proses_kerja.user_id', '=', 'users.id')
    //     ->join('pendaftar_kerja', 'proses_kerja.nama_pekerja', '=', 'pendaftar_kerja.id')
    //     ->join('program_kerja', 'proses_kerja.program_proses_kerja', '=', 'program_kerja.id')
    //     ->where('users.id', $user_id) // Memfilter berdasarkan user_id yang sedang login
    //     ->select('proses_kerja.*', 'pendaftar_kerja.pendaftar_pekerja as namapekerja', 'program_kerja.nama_program as namaprogram')
    //     ->paginate(10); // Menggunakan paginate untuk membuat data ter-segmentasi

    // return view('admin.proseskerja.index', compact('proses_kerja'));

    // }



    public function index() {
        // Mendapatkan role pengguna yang sedang login
        $role = Auth::user()->role;
    
        // Inisialisasi query untuk mengambil data proses kerja
        $query = proses_kerja::join('pendaftar_kerja', 'proses_kerja.nama_pekerja', '=', 'pendaftar_kerja.id')
                             ->join('program_kerja', 'proses_kerja.program_proses_kerja', '=', 'program_kerja.id')
                             ->select('proses_kerja.*', 'pendaftar_kerja.pendaftar_pekerja as namapekerja', 'program_kerja.nama_program as namaprogram');
    
        // Jika pengguna adalah admin, ambil semua data tanpa filter
        if($role === 'admin') {
            $proses_kerja = $query->paginate(10);
        } else {
            // Jika pengguna bukan admin, ambil data sesuai dengan user_id yang sedang login
            $user_id = Auth::id();
            $proses_kerja = $query->join('users', 'proses_kerja.user_id', '=', 'users.id')
                                 ->where('users.id', $user_id)
                                 ->paginate(10);
        }
    
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


    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            // 'nama' => 'required',
            'program_kerja' => 'required',
            'sertifikasi_kebahasaan' => 'required',
            'sertifikasi_pekerjaan' => 'required',
            'deskripsi' => 'required|max:225',
        ],
        [
            'program_kerja.required' => 'Program kerja wajib diisi',
            'sertifikasi_pekerjaan.required' => 'Sertfikasi pekerjaan wajib diisi',
            'sertifikasi_kebahasaan.required' => 'Sertifkasi wajib diisi', 
            'deskripsi.required' => 'Deskripsi siswa wajib diisi',
            'deskripsi.max' => 'Maksimal deskripsi 225 karakter',
        ]);

        DB::table('proses_kerja')->where('id', $request->id)->update([
            // 'nama_pekerja' => $request->nama,
            'program_proses_kerja' =>$request->program_kerja,
            'deskripsi' => $request->deskripsi,
            'sertifikasi' => $request->sertifikasi_pekerjaan,
            'kebahasaan' => $request->sertifikasi_kebahasaan,
        ]);

        return redirect('/proseskerja')->with('success','Data berhasil diupdate!');
    }


    // 

    public function store(Request $request){
        $this->validate($request,[
            'nama' => 'required|unique:proses_kerja,nama_pekerja',
            'program_kerja' => 'required',
            'kebahasaan' => 'required',
            'pekerjaan' => 'required',
            'deskripsi' => 'required|max:225',
        ],
        [
            'nama.required' => 'Nama siswa wajib diisi',
            'nama.unique' => 'Nama yang diinput sudah ada', 
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


    // public function destroy(string $id)
    // {
    //     DB::table('proses_kerja')->where('id',$id)->delete();
    //     return redirect('/proseskerja')->with('success','Data berhasil dihapus!');
    // }
   
    public function destroy(string $id)
    {
    try {
        DB::table('proses_kerja')->where('id', $id)->delete();
        return redirect('/proseskerja')->with('success', 'Data berhasil dihapus!');
    } catch (QueryException $e) {
        return redirect('/proseskerja')->with('error', 'Gagal menghapus data. Terdapat relasi yang terkait.');
    } catch (\Exception $e) {
        return redirect('/proseskerja')->with('error', 'Gagal menghapus data.');
    }
    }
}
