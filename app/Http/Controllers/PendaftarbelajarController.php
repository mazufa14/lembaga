<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendaftar_belajar;
use Illuminate\Support\Facades\DB;


class PendaftarbelajarController extends Controller
{
    //
    
    public function index(){

        $pendaftar_belajar = pendaftar_belajar::join('program_belajar','program_belajar', '=', 'program_belajar.id')
        ->select('pendaftar_belajar.*','program_belajar.nama_program_belajar as program_belajar')
        ->get();
        return view ('admin.pendaftarbelajar.index', compact('pendaftar_belajar'));


    }


    public function create()
    {
        $program_belajar = DB::table('program_belajar')->get();
        return view ('admin.pendaftarbelajar.create', compact('program_belajar'));

    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|max:50',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'usia' => 'required|max:3',
            'no_hp' => 'required|max:15',
            'alamat_email' => 'required|email|max:50',
            'motivasi' => 'required|max:50',
            'target_program' => 'required|in:n1,n2,n3,n4,n5',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024', // sesuaikan dengan kebutuhan
            'program_belajar' => 'required|exists:program_belajar,id',
           
        ],[
            'nama.required' => 'Nama pendaftar wajib diisi',
            'nama.max' => 'Nama pendaftar max 50',
            'tempat_lahir.required' => 'Tempat lahir belum diisi',
            'tempat_lahir.max' => 'Tempat lahir max 50',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'tanggal_lahir.required' => 'Tanggal lahir belum diisi',
            'tanggal_lahir.date' => 'Tanggal lahir tidak valid',
            'jenis_kelamin.required' => 'Jenis Kelamin belum diisi',
            'usia.required' => 'Usia belum diisi.',
            'usia.max' => 'Usia max 3 karakter.',
            'no_hp.required' => 'No hp belum diisi',
            'no_hp.max' => 'No hp max 15',
            'alamat_email.required' => 'Email wajib diisi.',
            'alamat_email.max' => 'Email max 50.',
            'alamat_email.email' => 'Format alamat email tidak valid.',
            'motivasi.required' => 'Motivasi belum diisi',
            'motivasi.max' => 'Motivasi max 50',
            'target_program.required' => 'Target program belum diisi',
            'foto.required' => 'Foto belum dipilih.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif.',
            'foto.max' => 'Ukuran gambar maksimum 1MB.',
            'program_belajar.required' => 'Program belajar belum diisi.',
            'program_belajar.exists' => 'Program belajar tidak valid.',
        ]);

        if(!empty($request->foto)){
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/fotosiswa'), $fileName);
        } else {
            $fileName = '';
        }

        // menggunakan query builder
        DB::table('pendaftar_belajar')->insert([
            'pendaftar_belajar' => $request->nama,
            'jenis_kelamin' => $request ->jenis_kelamin,
            'tempat_lahir' =>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'usia' => $request->usia,
            'no_hp' => $request->no_hp,
            'alamat_email'=> $request ->alamat_email,
            'motivasi' => $request ->motivasi,
            'tingkat_belajar' => $request ->target_program,
            'foto' => $fileName,
            'program_belajar'=> $request->program_belajar,
        ]);

        return redirect('/pendaftarbelajar')->with('success','Data Berhasil Tersimpan');


    }

    public function edit(string $id)
    {
        $program_belajar = DB::table('program_belajar')->get();
        $pendaftar_belajar = DB::table('pendaftar_belajar')->where('id',$id)->get();
        return view ('admin.pendaftarbelajar.edit', compact('program_belajar','pendaftar_belajar'));
    }

    public function update(Request $request, string $id){

        $this->validate($request,[
            'nama' => 'required|max:50',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'usia' => 'required|max:3',
            'no_hp' => 'required|max:15',
            'alamat_email' => 'required|email|max:50',
            'motivasi' => 'required|max:100',
            'target_program' => 'required|in:n1,n2,n3,n4,n5',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024', // sesuaikan dengan kebutuhan
            'program_belajar' => 'required|exists:program_belajar,id',
           
        ],[
            'nama.required' => 'Nama pendaftar wajib diisi',
            'nama.max' => 'Nama pendaftar max 50',
            'tempat_lahir.required' => 'Tempat lahir belum diisi',
            'tempat_lahir.max' => 'Tempat lahir max 50',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'tanggal_lahir.required' => 'Tanggal lahir belum diisi',
            'tanggal_lahir.date' => 'Tanggal lahir tidak valid',
            'jenis_kelamin.required' => 'Jenis Kelamin belum diisi',
            'usia.required' => 'Usia belum diisi.',
            'usia.max' => 'Usia max 3 karakter.',
            'no_hp.required' => 'No hp belum diisi',
            'no_hp.max' => 'No hp max 15',
            'alamat_email.required' => 'Email wajib diisi.',
            'alamat_email.max' => 'Email max 50.',
            'alamat_email.email' => 'Format alamat email tidak valid.',
            'motivasi.required' => 'Motivasi belum diisi',
            'motivasi.max' => 'Motivasi max 50',
            'target_program.required' => 'Target program belum diisi',
            // 'foto.required' => 'Foto belum dipilih.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif.',
            'foto.max' => 'Ukuran gambar maksimum 1MB.',
            'program_belajar.required' => 'Program belajar belum diisi.',
            'program_belajar.exists' => 'Program belajar tidak valid.',
        ]);

        // update foto
        $foto = DB::table('pendaftar_belajar')->select('foto')->where('id', $request->id)->get();
        foreach($foto as $f){
        $namaFileFotoLama = $f->foto;
        }


        if (!empty($request->foto)) {
            // Hapus foto lama hanya jika ada foto baru yang diunggah
            if (!empty($namaFileFotoLama)) {
                unlink('admin/fotosiswa/'.$namaFileFotoLama);
            }
            
            $fileName = 'foto-' .$request->id . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/fotosiswa'), $fileName);
        } else {
            // Jika tidak ada foto baru yang diunggah, gunakan foto lama
            $fileName = $namaFileFotoLama;
        }

        // menggunakan query builder
        DB::table('pendaftar_belajar')->where('id', $request->id)->update([
            'pendaftar_belajar' => $request->nama,
            'jenis_kelamin' => $request ->jenis_kelamin,
            'tempat_lahir' =>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'usia' => $request->usia,
            'no_hp' => $request->no_hp,
            'alamat_email'=> $request ->alamat_email,
            'motivasi' => $request ->motivasi,
            'tingkat_belajar' => $request ->target_program,
            'foto' => $fileName,
            'program_belajar'=> $request->program_belajar,
        ]);

        return redirect('/pendaftarbelajar')->with('success','Data Berhasil Tersimpan');


    }

   
    

    public function show (string $id)
    {
        $pendaftar_belajar = pendaftar_belajar::join('program_belajar','program_belajar', '=', 'program_belajar.id')
        ->select('pendaftar_belajar.*','program_belajar.nama_program_belajar as program_belajar')
        ->where('pendaftar_belajar.id',$id)
        ->get();
        return view ('admin.pendaftarbelajar.detail', compact('pendaftar_belajar'));
    }


    public function destroy(string $id)
    {
        DB::table('pendaftar_belajar')->where('id',$id)->delete();
        return redirect('/pendaftarbelajar')->with('success', 'Data berhasil dihapus');
    }
}
