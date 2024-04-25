<?php

namespace App\Http\Controllers;

use App\Models\pendaftar_kerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class PendaftarkerjaController extends Controller
{
    //
    public function index(){

        $pendaftar_kerja = pendaftar_kerja::join('program_kerja','program', '=', 'program_kerja.id')
        ->select('pendaftar_kerja.*','program_kerja.nama_program as namaprogram')
        ->get();
        return view ('admin.pendaftarkerja.index', compact('pendaftar_kerja'));

        // $pendaftar_kerja = pendaftar_kerja::all();
        // return view ('admin.pendaftarkerja.index', compact('pendaftar_kerja'));


    }

    public function create()
    {
        $program_kerja = DB::table('program_kerja')->get();
        return view ('admin.pendaftarkerja.create', compact('program_kerja'));

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|max:50',
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
            'programkerja' => 'required|exists:program_kerja,id',

        ],[
            'nama.required' => 'Nama pendaftar wajib diisi',
            'nama.max' => 'Maksimal 50 karakter untuk nama.',
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
            'programkerja.required' => 'Program kerja wajib dipilih.',
            'programkerja.exists' => 'Program kerja yang dipilih tidak valid.',
        ]);
        
        if(!empty($request->foto)){
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/img'), $fileName);
        } else {
            $fileName = '';
        }

        // dengan query builder
        DB::table('pendaftar_kerja')->insert([
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

      // update foto
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
