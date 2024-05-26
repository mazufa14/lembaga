<?php

namespace App\Http\Controllers;

use App\Models\pendaftar_kerja;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PendaftarkerjaController extends Controller
{
    
    // public function index(){

    //     $pendaftar_kerja = pendaftar_kerja::join('program_kerja','program', '=', 'program_kerja.id')
    //     ->join('users','user_id', '=' , 'users.id')
    //     ->select('pendaftar_kerja.*','program_kerja.nama_program as namaprogram', 'users.name as namaakun')
    //     ->get();
    //     return view ('admin.pendaftarkerja.index', compact('pendaftar_kerja'));

    //     // $pendaftar_kerja = pendaftar_kerja::all();
    //     // return view ('admin.pendaftarkerja.index', compact('pendaftar_kerja'));


    // }


    public function index(){
        // Mendapatkan role pengguna yang sedang login
        $role = Auth::user()->role;
    
        // Inisialisasi query untuk mengambil data pendaftar kerja
        $query = pendaftar_kerja::join('program_kerja', 'program', '=', 'program_kerja.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->select('pendaftar_kerja.*', 'program_kerja.nama_program as namaprogram', 'users.name as namaakun');
    
        // Jika pengguna adalah admin, ambil semua data
        if($role === 'admin') {
            $pendaftar_kerja = $query->paginate(10);
        } else {
            // Jika pengguna bukan admin, ambil data sesuai dengan user_id yang sedang login
            $user_id = Auth::id();
            $pendaftar_kerja = $query->where('users.id', $user_id)->paginate(10);
        }
    
        return view('admin.pendaftarkerja.index', compact('pendaftar_kerja'));
    }

    public function create()
    {
        // 1
        // $program_kerja = DB::table('program_kerja')->get();
        // $user = DB::table('users')
        // ->whereNotIn('role', ['admin', 'owner'])
        // ->get();
        // return view ('admin.pendaftarkerja.create', compact('program_kerja','user'));

        // 2
        // if (Auth::user()->role === 'siswa') {
        //     $userId = Auth::id();
        //     $users = collect([User::findOrFail($userId)]);
        // } else {
        //     $users = DB::table('users')
        //         ->whereNotIn('role', ['admin', 'owner'])
        //         ->get();
        // }
        // return view ('admin.pendaftarkerja.create', compact('program_kerja','users'));


        $program_kerja = DB::table('program_kerja')->get();

        if (Auth::user()->role === 'admin') {
            $users = DB::table('users')
                ->whereNotIn('role', ['admin', 'penguji'])
                ->get();
        } else {
            $userId = Auth::id();
            $users = collect([User::findOrFail($userId)]);
        }
       
    
        return view('admin.pendaftarkerja.create', compact('program_kerja', 'users'));

        

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|max:50',
            'user_id' => 'required|unique:pendaftar_kerja,user_id',
            'tempat_lahir' => 'required|max:20',
            'tanggal_lahir' => 'required|before_or_equal: -17 years',
            'berat_badan' => 'required|max:3',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nikah' => 'required',
            'alamat_email' => 'required|email|max:50',
            'no_hp' => 'required|max:15',
            'alamat_rumah' => 'required|max:50',
            'sakit' => 'required|max:50',
            'pendidikan' => 'required|in:SMA,SMK,D3,S1',

            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024', // sesuaikan dengan kebutuhan
            'kk'   => 'required|mimes:pdf|max:1000',
            'akte'   => 'required|mimes:pdf|max:1000',
            'ijazah'   => 'required|mimes:pdf|max:1000',
            'ktp'   => 'required|mimes:pdf|max:1000',
            
            'programkerja' => 'required|exists:program_kerja,id',

        ],[
            'nama.required' => 'Nama pendaftar wajib diisi',
            'nama.max' => 'Maksimal 50 karakter untuk nama.',
            'user_id.required' => 'Akun siswa Belum diisi',
            'user_id.unique' => 'Akun sudah input data',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tempat_lahir.max' => 'Maksimal 50 karakter untuk tempat lahir.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'tanggal_lahir.before_or_equal' => 'Anda harus berusia minimal 18 tahun.',
            'berat_badan.required' => 'Berat badan wajib diisi.',
            'berat_badan.max' => 'Maksimal 3 karakter untuk berat badan.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'nikah.required' => 'Status pernikahan wajib diisi.',
            // 'nikah.in' => 'Status pernikahan harus Belum atau Menikah.',
            'alamat_email.required' => 'Alamat email wajib diisi.',
            'alamat_email.email' => 'Format alamat email tidak valid.',
            'alamat_email.max' => 'Maksimal 50 karakter untuk alamat email.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.max' => 'Maksimal 15 karakter untuk nomor HP.',
            'alamat_rumah.required' => 'Alamat rumah wajib diisi.',
            'alamat_rumah.max' => 'Maksimal 100 karakter untuk alamat rumah.',
            'sakit.required' => 'Kondisi kesehatan wajib diisi.',
            'sakit.max' => 'Maksimal 100 karakter untuk kondisi kesehatan.',
            'pendidikan.required' => 'Pendidikan terakhir wajib diisi.',
            'pendidikan.in' => 'Pendidikan terakhir harus SMA, SMK, D3, atau S1.',

            'foto.required' => 'Foto pendaftar wajib diunggah.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format file harus jpeg, png, jpg, atau gif.',
            'foto.max' => 'Maksimal 1 MB untuk ukuran file.',

            'kk.required' => 'Dokumen wajib diunggah.',
            'kk.mimes' => 'Format file harus pdf.',
            'kk.max' => 'Maksimal 1 MB untuk ukuran file.',

            'akte.required' => 'Dokumen wajib diunggah.',
            'akte.mimes' => 'Format file harus pdf.',
            'akte.max' => 'Maksimal 1 MB untuk ukuran file.',

            'ijazah.required' => 'Dokumen wajib diunggah.',
            'ijazah.mimes' => 'Format file harus pdf.',
            'ijazah.max' => 'Maksimal 1 MB untuk ukuran file.',

            'ktp.required' => 'Dokumen wajib diunggah.',
            'ktp.mimes' => 'Format file harus pdf.',
            'ktp.max' => 'Maksimal 1 MB untuk ukuran file.',

            'programkerja.required' => 'Program kerja wajib dipilih.',
            'programkerja.exists' => 'Program kerja yang dipilih tidak valid.',
        ]);
        
        // INPUT FOTO
        if(!empty($request->foto)){
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/img'), $fileName);
        } else {
            $fileName = '';
        }

        // INPUT FOTO KARTU KELUARAG
        if (!empty($request->kk)) {
            $kkFileName = 'kk-' . uniqid() . '.' . $request->kk->extension();
            $request->kk->move(public_path('admin/pdfkartukeluarga'), $kkFileName);
        } else {
            $kkFileName = '';
        }

       // INPUT FOTO AKTE
        if (!empty($request->akte)) {
            $akteFileName = 'akte-' . uniqid() . '.' . $request->akte->extension();
            $request->akte->move(public_path('admin/akte'), $akteFileName);
        } else {
            $akteFileName = '';
        }

          // INPUT FOTO KTP BERUPA PDF 
        if (!empty($request->ktp)) {
            $ktpFileName = 'ktp-' . uniqid() . '.' . $request->ktp->extension();
            $request->ktp->move(public_path('admin/ktp'), $ktpFileName);
        } else {
            $ktpFileName = '';
        }

        // INPUT FOTO ijazah
        if (!empty($request->ijazah)) {
            $ijazahFileName = 'ijazah-' . uniqid() . '.' . $request->ijazah->extension();
            $request->ijazah->move(public_path('admin/ijazah'), $ijazahFileName);
        } else {
            $ijazahFileName = '';
        }



        // dengan query builder
        DB::table('pendaftar_kerja')->insert([
            'pendaftar_pekerja' =>$request->nama,
            'user_id' => $request->user_id,
            'tempat_lahir' =>$request-> tempat_lahir,
            'tanggal_lahir'=>$request-> tanggal_lahir,
            'berat_badan' =>$request-> berat_badan,
            'jenis_kelamin' => $request ->jenis_kelamin,
            'nikah' => $request-> nikah,
            'alamat_email'=> $request -> alamat_email,
            'no_hp' => $request-> no_hp,
            'alamat_rumah' => $request->alamat_rumah,
            'sakit_berat' => $request->sakit ,
            'pendidikan_terakhir' => $request-> pendidikan,
            'program' => $request->programkerja,
            'foto' => $fileName,
            'fotokk' => $kkFileName,
            'fotoakte' => $akteFileName,
            'fotoijazah' => $ijazahFileName,
            'fotoktp' =>  $ktpFileName,
        ]);

        return redirect('/pendaftarkerja')->with('success','Data Berhasil Tersimpan');

    }

    public function show(string $id)
    {
        $pendaftar_kerja = pendaftar_kerja::join('program_kerja','program', '=', 'program_kerja.id')
        ->select('pendaftar_kerja.*','program_kerja.nama_program as namaprogram')
        ->where('pendaftar_kerja.id', $id)
        ->get();
        return view ('admin.pendaftarkerja.detail', compact('pendaftar_kerja'));
    }


    public function edit(string $id)
    {
        $program_kerja = DB::table('program_kerja')->get();
        $pendaftar_kerja = DB::table('pendaftar_kerja')->where('id',$id)->get();
        return view ('admin.pendaftarkerja.edit', compact('program_kerja','pendaftar_kerja'));
    }



    public function generatePDF(){
    
        $pendaftar_kerja = pendaftar_kerja::all();
    
        $pdf = FacadePdf::loadview('admin.pendaftarkerja.pdf', compact('pendaftar_kerja'));
    
        return $pdf->stream('Laporan Pendaftaran.pdf');
     
    
        }


    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'nama' => 'required|max:50',
            'tempat_lahir' => 'required|max:20',
            'tanggal_lahir' => 'required',
            'berat_badan' => 'required|max:3',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nikah' => 'required',
            'alamat_email' => 'required|email|max:50',
            'no_hp' => 'required|max:15',
            'alamat_rumah' => 'required|max:50',
            'sakit' => 'required|max:50',
            'pendidikan' => 'required|in:SMA,SMK,D3,S1',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024', // sesuaikan dengan kebutuhan
            // 'kk'   => 'required|mimes:pdf|max:1000',
            'programkerja' => 'required|exists:program_kerja,id',
        ],
        [
            'nama.required' => 'Nama pendaftar wajib diisi',
            'nama.max' => 'Maksimal 50 karakter untuk nama.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tempat_lahir.max' => 'Maksimal 50 karakter untuk tempat lahir.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'berat_badan.required' => 'Berat badan wajib diisi.',
            'berat_badan.max' => 'Maksimal 3 karakter untuk berat badan.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'nikah.required' => 'Status pernikahan wajib diisi.',
            // 'nikah.in' => 'Status pernikahan harus Belum atau Menikah.',
            'alamat_email.required' => 'Alamat email wajib diisi.',
            'alamat_email.email' => 'Format alamat email tidak valid.',
            'alamat_email.max' => 'Maksimal 50 karakter untuk alamat email.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.max' => 'Maksimal 15 karakter untuk nomor HP.',
            'alamat_rumah.required' => 'Alamat rumah wajib diisi.',
            'alamat_rumah.max' => 'Maksimal 100 karakter untuk alamat rumah.',
            'sakit.required' => 'Kondisi kesehatan wajib diisi.',
            'sakit.max' => 'Maksimal 100 karakter untuk kondisi kesehatan.',
            'pendidikan.required' => 'Pendidikan terakhir wajib diisi.',
            'pendidikan.in' => 'Pendidikan terakhir harus SMA, SMK, D3, atau S1.',
            // 'foto.required' => 'Foto pendaftar wajib diunggah.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format file harus jpeg, png, jpg, atau gif.',
            'foto.max' => 'Maksimal 1 MB untuk ukuran file.',
            'programkerja.required' => 'Program kerja wajib dipilih.',
            'programkerja.exists' => 'Program kerja yang dipilih tidak valid.',
        ]
      );


    //   //update foto
    //   $foto = DB::table('pendaftar_kerja')->select('foto')->where('id', $request->id)->get();
    //   foreach($foto as $f){
    //       $namaFileFotoLama = $f->foto;
    //   }

    //   if(!empty($request->foto)){

    //   //jika ada foto lama maka hapus fotonya 
    //   if(!empty($namaFileFotoLama->foto)) unlink('admin/img'.$namaFileFotoLama->foto);
  
    //   //proses ganti foto
    //   $fileName = 'foto-'.$request->id . '.' . $request->foto->extension();
    //   $request->foto->move(public_path('admin/img'), $fileName);
    //   } 
      
    //   else {
    //       $fileName = '';
    //   }

        //update FOTO SISWA
        $foto = DB::table('pendaftar_kerja')->select('foto')->where('id', $request->id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }

        if (!empty($request->foto)) {
            // Hapus foto lama hanya jika ada foto baru yang diunggah
            if (!empty($namaFileFotoLama)) {
                unlink('admin/img/'.$namaFileFotoLama);
            }
            
            $fileName = 'foto-' .$request->id . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/img'), $fileName);
        } else {
            // Jika tidak ada foto baru yang diunggah, gunakan foto lama
            $fileName = $namaFileFotoLama;
        }


        // UPDATE PDF KARTU KELUARGA
        $kk = DB::table('pendaftar_kerja')->select('fotokk')->where('id', $request->id)->get();
        foreach($kk as $k){
            $namaFileKKlama = $k->fotokk;
        }

        if (!empty($request->kk)) {
            // Hapus file PDF lama hanya jika ada file PDF baru yang diunggah
            if (!empty($namaFileKKlama)) {
                unlink('admin/pdfkartukeluarga/'.$namaFileKKlama);
            }
            
            $kkFileName = 'kk-' .$request->id . '.' . $request->kk->extension();
            $request->kk->move(public_path('admin/pdfkartukeluarga'), $kkFileName);
        } else {
            // Jika tidak ada file PDF baru yang diunggah, gunakan file PDF lama
            $kkFileName = $namaFileKKlama;
        }


        // UPDATE FOTO AKTE
        $akte = DB::table('pendaftar_kerja')->select('fotoakte')->where('id', $request->id)->get();
        foreach ($akte as $a) {
            $namaFileAkteLama = $a->fotoakte;
        }

        if (!empty($request->akte)) {
            // Hapus foto akte lama hanya jika ada foto akte baru yang diunggah
            if (!empty($namaFileAkteLama)) {
                unlink('admin/akte/' . $namaFileAkteLama);
            }
            
            $akteFileName = 'akte-' . $request->id . '.' . $request->akte->extension();
            $request->akte->move(public_path('admin/akte'), $akteFileName);
        } else {
            // Jika tidak ada foto akte baru yang diunggah, gunakan foto akte lama
            $akteFileName = $namaFileAkteLama;
        }

         // UPDATE FOTO IJAZAH
         $ijazah = DB::table('pendaftar_kerja')->select('fotoijazah')->where('id', $request->id)->get();
         foreach ($ijazah as $a) {
             $namaFileIjazahLama = $a->fotoijazah;
         }
 
         if (!empty($request->ijazah)) {
             // Hapus foto akte lama hanya jika ada foto akte baru yang diunggah
             if (!empty($namaFileIjazahLama)) {
                 unlink('admin/ijazah/' . $namaFileIjazahLama);
             }
             
             $ijazahFileName = 'ijazah-' . $request->id . '.' . $request->ijazah->extension();
             $request->ijazah->move(public_path('admin/ijazah'), $ijazahFileName);
         } else {
             // Jika tidak ada foto akte baru yang diunggah, gunakan foto akte lama
             $ijazahFileName = $namaFileIjazahLama;
         }



         // UPDATE FOTO KTP
        $ktp = DB::table('pendaftar_kerja')->select('fotoktp')->where('id', $request->id)->get();
        foreach ($ktp as $k) {
            $namaFileKTPLama = $k->fotoktp;
        }

        if (!empty($request->ktp)) {
            // Hapus foto KTP lama hanya jika ada foto KTP baru yang diunggah
            if (!empty($namaFileKTPLama)) {
                unlink(public_path('admin/ktp/' . $namaFileKTPLama));
            }
            
            $ktpFileName = 'ktp-' . $request->id . '.' . $request->ktp->extension();
            $request->ktp->move(public_path('admin/ktp'), $ktpFileName);
        } else {
            // Jika tidak ada foto KTP baru yang diunggah, gunakan foto KTP lama
            $ktpFileName = $namaFileKTPLama;
        }


    
        DB::table('pendaftar_kerja')->where('id', $request->id)->update([
            'pendaftar_pekerja' =>$request->nama,
            'tempat_lahir' =>$request-> tempat_lahir,
            'tanggal_lahir'=>$request-> tanggal_lahir,
            'berat_badan' =>$request-> berat_badan,
            'jenis_kelamin' => $request ->jenis_kelamin,
            'nikah' => $request-> nikah,
            'alamat_email'=> $request -> alamat_email,
            'no_hp' => $request-> no_hp,
            'alamat_rumah' => $request->alamat_rumah,
            'sakit_berat' => $request->sakit ,
            'pendidikan_terakhir' => $request-> pendidikan,
            'program' => $request->programkerja,
            'foto' => $fileName,
            'status' =>$request->status,
            'fotokk' => $kkFileName,
            'fotoakte' =>  $akteFileName,
            'fotoijazah' =>  $ijazahFileName,
            'fotoktp' =>  $ktpFileName,
        ]);
        return redirect('/pendaftarkerja')->with('success', 'Data  berhasil di Update!');

    }


    // public function destroy(string $id)
    // {
    //     DB::table('pendaftar_kerja')->where('id',$id)->delete();
    //     return redirect('/pendaftarkerja')->with('success', 'Data berhasil dihapus');
    // }

    public function destroy(string $id)
    {
        try {
            DB::table('pendaftar_kerja')->where('id', $id)->delete();
            return redirect('/pendaftarkerja')->with('success', 'Data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect('/pendaftarkerja')->with('error', 'Gagal menghapus data. Terdapat relasi yang terkait.');
        }
    }

}
