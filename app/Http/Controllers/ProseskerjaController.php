<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\proses_kerja;
use App\Models\pembayaran;
use App\Models\akademik;
use App\Models\pendaftar_kerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException; 

class ProseskerjaController extends Controller
{
    
    // public function index() {
    //     // Mendapatkan role pengguna yang sedang login
    //     $role = Auth::user()->role;
    
    //     // Inisialisasi query untuk mengambil data proses kerja
    //     $query = proses_kerja::join('pendaftar_kerja', 'proses_kerja.nama_pekerja', '=', 'pendaftar_kerja.id')
    //                          ->join('program_kerja', 'proses_kerja.program_proses_kerja', '=', 'program_kerja.id')
    //                          ->select('proses_kerja.*', 'pendaftar_kerja.pendaftar_pekerja as namapekerja', 'program_kerja.nama_program as namaprogram');
    
    //     // Jika pengguna adalah admin, ambil semua data tanpa filter
    //     if($role === 'admin') {
    //         $proses_kerja = $query->paginate(10);
    //     } else {
    //         // Jika pengguna bukan admin, ambil data sesuai dengan user_id yang sedang login
    //         $user_id = Auth::id();
    //         $proses_kerja = $query->join('users', 'proses_kerja.user_id', '=', 'users.id')
    //                              ->where('users.id', $user_id)
    //                              ->paginate(10);
    //     }
    
    //     return view('admin.proseskerja.index', compact('proses_kerja'));
    // }


   
    // public function index() {
    //     // Mendapatkan role pengguna yang sedang login
    //     // $role = Auth::user()->role;
    //     $user = Auth::user();
    //     $role = $user->role;
    //     $user_id = $user->id;

    //     // Inisialisasi query untuk mengambil data proses kerja
    //     $query = proses_kerja::join('pendaftar_kerja', 'proses_kerja.nama_pekerja', '=', 'pendaftar_kerja.id')
    //                          ->join('program_kerja', 'proses_kerja.program_proses_kerja', '=', 'program_kerja.id')
    //                          ->join('users as u1', 'proses_kerja.user_id', '=', 'u1.id')
    //                          ->select('proses_kerja.*', 'pendaftar_kerja.pendaftar_pekerja as namapekerja', 'program_kerja.nama_program as namaprogram', 'u1.name as namaakun');
    
    //     // Jika pengguna adalah admin, ambil semua data tanpa filter
    //     if($role === 'admin') {
    //         $proses_kerja = $query->paginate(10);
    //     } else {
    //         // Jika pengguna bukan admin, ambil data sesuai dengan user_id yang sedang login
    //         // $user_id = Auth::id();
    //         $proses_kerja = $query->join('users as u2', 'proses_kerja.user_id', '=', 'u2.id')
    //                              ->where('u2.id', $user_id)
    //                              ->paginate(10);
    //     }

    //     // Mendapatkan status pendaftaran,akademik dan pembayaran pengguna yang sedang login
    //     $statuspendaftaran = pendaftar_kerja::where('user_id', $user_id)->value('status');
    //     $statusakademik = akademik::where('user_id', $user_id)->value('status');
    //     $statuspembayaran = pembayaran::where('user_id', $user_id)->value('status');
                         
    
    //     return view('admin.proseskerja.index', compact('proses_kerja','statuspendaftaran','statusakademik','statuspembayaran'));
    // }
    

    public function index() {
        // Mendapatkan role pengguna yang sedang login
        $user = Auth::user();
        $role = $user->role;
        $user_id = $user->id;
    
        // Inisialisasi query untuk mengambil data proses kerja
        $query = proses_kerja::join('pendaftar_kerja', 'proses_kerja.nama_pekerja', '=', 'pendaftar_kerja.id')
                             ->join('program_kerja', 'proses_kerja.program_proses_kerja', '=', 'program_kerja.id')
                             ->join('users as u1', 'proses_kerja.user_id', '=', 'u1.id')
                             ->select('proses_kerja.*', 'pendaftar_kerja.pendaftar_pekerja as namapekerja', 'program_kerja.nama_program as namaprogram', 'u1.name as namaakun');
    
        // Jika pengguna adalah admin, ambil semua data tanpa filter
        if($role === 'admin') {
            $proses_kerja = $query->paginate(10);
        } else {
            // Jika pengguna bukan admin, ambil data sesuai dengan user_id yang sedang login
            $proses_kerja = $query->join('users as u2', 'proses_kerja.user_id', '=', 'u2.id')
                                 ->where('u2.id', $user_id)
                                 ->paginate(10);
        }
    
        // Mendapatkan status pendaftaran, akademik, dan pembayaran pengguna yang sedang login
        $status = DB::table('pendaftar_kerja')
                    ->join('akademik', 'pendaftar_kerja.user_id', '=', 'akademik.user_id')
                    ->join('pembayaran', 'pendaftar_kerja.user_id', '=', 'pembayaran.user_id')
                    ->select('pendaftar_kerja.status as statuspendaftaran', 'akademik.status as statusakademik', 'pembayaran.status as statuspembayaran')
                    ->where('pendaftar_kerja.user_id', $user_id)
                    ->first();
    
                    
        if ($status) {
            $statuspendaftaran = $status->statuspendaftaran;
            $statusakademik = $status->statusakademik;
            $statuspembayaran = $status->statuspembayaran;
        } else {
            // Penanganan ketika tidak ada data ditemukan
            $statuspendaftaran = null;
            $statusakademik = null;
            $statuspembayaran = null;
        }
    
        return view('admin.proseskerja.index', compact('proses_kerja','statuspendaftaran','statusakademik','statuspembayaran'));
    }
    


    
    public function create()
    {
        //

        $pendaftar_kerja = DB::table('pendaftar_kerja')->get();
        $program_kerja = DB::table('program_kerja')->get();

        // $user = DB::table('users')->get();
        // Mengambil daftar pengguna yang bukan admin atau owner
        $user = DB::table('users')
        ->whereNotIn('role', ['admin', 'owner'])
        ->get();

        return view ('admin.proseskerja.create', compact('pendaftar_kerja','program_kerja','user'));


    }


    public function edit(string $id){
        
               
        $program_kerja = DB::table('program_kerja')->get();
        $pendaftar_kerja = DB::table('pendaftar_kerja')->get();

        // Mengambil daftar pengguna yang bukan admin atau owner
        $user = DB::table('users')
        ->whereNotIn('role', ['admin', 'owner'])
        ->get();

        $proses_kerja = DB::table('proses_kerja')->where('id',$id)->get();
        return view ('admin.proseskerja.edit', compact('pendaftar_kerja','proses_kerja','program_kerja','user'));
        
    }


    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            // 'nama' => 'required'|unique:proses_kerja,user_id',
            'user_id' => 'required',
            'nilai' => 'max:3',
            'program_kerja' => 'required',
            // 'sertifikasi_kebahasaan' => 'required',
            // 'sertifikasi_pekerjaan' => 'required',
            'kebahasaan'   => 'file|mimes:pdf|max:1024',
            'sertifikasi'   => 'file|mimes:pdf|max:1024',
            'deskripsi' => 'nullable|max:225',
        ],
        [
            'user_id.required' => 'Akun siswa belum ada',
            // 'user_id.unique' => 'Akun siswa sudah digunakan',
            'nilai.max' => 'Nilai maksimal 3 karakter',
            'program_kerja.required' => 'Program kerja wajib diisi',
            // 'sertifikasi_pekerjaan.required' => 'Sertfikasi pekerjaan wajib diisi',
            // 'sertifikasi_kebahasaan.required' => 'Sertifkasi wajib diisi', 
            // 'deskripsi.required' => 'Deskripsi siswa wajib diisi',
            'deskripsi.max' => 'Maksimal deskripsi 225 karakter',

            'kebahasaan.file' => 'Kebahasaan harus berupa file',
            'kebahasaan.mimes' => 'Kebahasaan harus berupa file dengan format: pdf',
            'kebahasaan.max' => 'Ukuran file kebahasaan maksimal 1MB',

            'sertifikasi.file' => 'sertifikasi harus berupa file',
            'sertifikasi.mimes' => 'sertifikasi harus berupa file dengan format: pdf',
            'sertifikasi.max' => 'Ukuran file kebahasaan maksimal 1MB',
        ]);


        //UPDATE PDF sertifikasi kebahasaan
        $kk = DB::table('proses_kerja')->select('kebahasaan')->where('id', $request->id)->get();
        foreach($kk as $k){
            $namaFileKebahasaanlama = $k->kebahasaan;
        }

        if (!empty($request->kebahasaan)) {
            // Hapus file PDF lama hanya jika ada file PDF baru yang diunggah
            if (!empty($namaFileKebahasaanlama)) {
                unlink('admin/kebahasaan/'.$namaFileKebahasaanlama);
            }
            
            $kebahasaanFileName = 'kebahasaan-' .$request->id . '.' . $request->kebahasaan->extension();
            $request->kebahasaan->move(public_path('admin/kebahasaan'), $kebahasaanFileName);
        } else {
            // Jika tidak ada file PDF baru yang diunggah, gunakan file PDF lama
            $kebahasaanFileName = $namaFileKebahasaanlama;
        }


         //UPDATE PDF SERTIFIKASI PEKERJAAN
         $kk = DB::table('proses_kerja')->select('sertifikasi')->where('id', $request->id)->get();
         foreach($kk as $k){
             $namaFileSertifikasilama = $k->sertifikasi;
         }
 
         if (!empty($request->sertifikasi)) {
             // Hapus file PDF lama hanya jika ada file PDF baru yang diunggah
             if (!empty($namaFileSertifikasilama)) {
                 unlink('admin/sertifikasi/'.$namaFileSertifikasilama);
             }
             
             $sertifikasiFileName = 'sertifikasi-' .$request->id . '.' . $request->sertifikasi->extension();
             $request->sertifikasi->move(public_path('admin/sertifikasi'), $sertifikasiFileName);
         } else {
             // Jika tidak ada file PDF baru yang diunggah, gunakan file PDF lama
             $sertifikasiFileName = $namaFileSertifikasilama;
         }
 

       


        DB::table('proses_kerja')->where('id', $request->id)->update([
            // 'nama_pekerja' => $request->nama,
            'user_id' => $request->user_id,
            'proses1' => $request->proses1,
            'proses2' => $request->proses2,
            'nilai' => $request->nilai,
            'proses3'=>$request->proses3,

            'proses4' => $request->proses4,
            'bulan' => $request->bulan,
            'proses5' => $request->proses5,

            // 'kebahasaan' => $request->kebahasaan,
            'kebahasaan' =>  $kebahasaanFileName,

            'proses6' => $request->proses6,

            // 'sertifikasi' => $request->sertifikasi,
            'sertifikasi' => $sertifikasiFileName,

            'proses7' => $request->proses7,
            'perusahaan' => $request->perusahaan,
            'proses8' => $request->proses8,
            'proses9' => $request->proses9,
            'proses10' => $request->proses10,
            'proses11' => $request->proses11,
            // 'proses12' => $request->proses12,

            'program_proses_kerja' =>$request->program_kerja,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/proseskerja')->with('success','Data berhasil diupdate!');
    }


    // 

    public function store(Request $request){
        $this->validate($request,[
            'nama' => 'required|unique:proses_kerja,nama_pekerja',
            'user_id' => 'required|unique:proses_kerja,user_id',
            'nilai' => 'required',
            'program_kerja' => 'required',
            'kebahasaan' => 'file|mimes:pdf|max:1024',
            'sertifikasi' => 'file|mimes:pdf|max:1024',
            'deskripsi' => 'nullable|max:225',
        ],
        [
            'nama.required' => 'Nama siswa wajib diisi',
            'nama.unique' => 'Nama yang diinput sudah ada',
            'nilai.required'  => 'Nilai test siswa belum diisi',
            'user_id.required' => 'Akun siswa Belum diisi',
            'user_id.unique' => 'Akun siswa sudah digunakan',
            'program_kerja.required' => 'Program kerja wajib diisi',
            // 'deskripsi.required' => 'Deskripsi siswa wajib diisi',
            'deskripsi.max' => 'Maksimal deskripsi 225 karakter',
            // 'sertifikasi.required' => 'Sertfikasi pekerjaan wajib diisi',
    
            'kebahasaan.file' => 'Kebahasaan harus berupa file',
            'kebahasaan.mimes' => 'Kebahasaan harus berupa file dengan format: pdf',
            'kebahasaan.max' => 'Ukuran file kebahasaan maksimal 1MB',

            'sertifikasi.file' => 'Sertifikasi pekerjaan harus berupa file',
            'sertifikasi.mimes' => 'Sertifikasi pekerjaan berupa file dengan format: pdf',
            'sertifikasi.max' => 'Ukuran file Sertifikasi pekerjaan maksimal 1MB',
            
           
        ]);


        // INPUT Sertifikasi Kebahasaan
        if (!empty($request->kebahasaan)) {
            $kebahasaanFileName = 'kebahasaan-' . uniqid() . '.' . $request->kebahasaan->extension();
            $request->kebahasaan->move(public_path('admin/kebahasaan'), $kebahasaanFileName);
        } else {
            $kebahasaanFileName = '';
        }


        // INPUT Sertifikasi pekerjaan
        if (!empty($request->sertifikasi)) {
            $sertifikasiFileName = 'sertifikasi-' . uniqid() . '.' . $request->sertifikasi->extension();
            $request->sertifikasi->move(public_path('admin/sertifikasi'), $sertifikasiFileName);
        } else {
            $sertifikasiFileName = '';
        }

        // Tambah data 
        DB::table('proses_kerja')->insert([
            'nama_pekerja' => $request->nama,
            'user_id' => $request->user_id,
            'proses1' => $request->proses1,
            'proses2' => $request->proses2,
            'nilai' => $request->nilai,
            'proses3' => $request->proses3,
            'proses4' => $request->proses4,
            'bulan' => $request->bulan,
            'proses5' => $request->proses5,
            'kebahasaan' => $kebahasaanFileName,
            'proses6' => $request->proses6,
            // 'sertifikasi' => $request->sertifikasi,
            'sertifikasi' =>  $sertifikasiFileName,
            'proses7' => $request->proses7,
            'perusahaan' => $request->perusahaan,
            'proses8' => $request->proses8,
            'proses9' => $request->proses9,
            'proses10' => $request->proses10,
            'proses11' => $request->proses11,
            // 'proses12' => $request->proses12,

            'program_proses_kerja' =>$request->program_kerja,
            'deskripsi' => $request->deskripsi,
            
            
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
