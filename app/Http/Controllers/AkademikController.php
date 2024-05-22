<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\akademik;
use App\Models\pendaftar_kerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException; 



class AkademikController extends Controller
{
    //
    // public function index(){
    //     // Mendapatkan role pengguna yang sedang login
    //     $role = Auth::user()->role;
    
    //     // Inisialisasi query untuk mengambil data pembayaran
    //     $query = akademik::join('users', 'akademik.user_id', '=', 'users.id')
    //         ->select('akademik.*', 'users.name as namaakun');
    
    //     // Jika pengguna adalah admin, ambil semua data pembayaran
    //     if($role === 'admin' || $role === 'penguji') {
    //         $akademik = $query->paginate(10);
    //     } else {
    //         // Jika pengguna bukan admin, ambil data pembayaran sesuai dengan user_id yang sedang login
    //         $user_id = Auth::id();
    //         $akademik = $query->where('akademik.user_id', $user_id)->paginate(10);
    //     }


    //     $user_id = Auth::id();
    //     $statusakademik = akademik::where('user_id', $user_id)->value('status');
        
    //     return view('admin.akademik.index', compact('akademik','statusakademik'));

    // }

    public function index()
    {
        // Mendapatkan role pengguna yang sedang login
        $user = Auth::user();
        $role = $user->role;
        $user_id = $user->id;

        // Inisialisasi query untuk mengambil data akademik
        $query = akademik::join('users', 'akademik.user_id', '=', 'users.id')
            ->select('akademik.*', 'users.name as namaakun');

        // Jika pengguna adalah admin atau penguji, ambil semua data akademik
        if ($role === 'admin' || $role === 'penguji') {
            $akademik = $query->paginate(10);
        } else {
            // Jika pengguna bukan admin atau penguji, ambil data akademik sesuai dengan user_id yang sedang login
            $akademik = $query->where('akademik.user_id', $user_id)->paginate(10);
        }

        // Mendapatkan status akademik pengguna yang sedang login
        $statuspendaftar = pendaftar_kerja::where('user_id', $user_id)->value('status');

        return view('admin.akademik.index', compact('akademik', 'statuspendaftar'));
    }


    public function create()
    {
        $role = Auth::user()->role;

        if (Auth::user()->role === 'admin' || $role === 'penguji' ) {
            $users = DB::table('users')
                ->whereNotIn('role', ['admin', 'penguji'])
                ->get();
        } else {
            $userId = Auth::id();
            $users = collect([User::findOrFail($userId)]);
        }
       
    
        return view('admin.akademik.create', compact('users'));

        
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required|unique:akademik,user_id',
            'nilai' => 'required|max:3',
            'status' => 'required',
            'akademik'   => 'required|mimes:pdf|max:1000',

        ],[
            'user_id.required' => 'Akun siswa Belum diisi',
            'user_id.unique' => 'Data siswa sudah ada',

            'nilai.required' => 'Nilai belum diisi',
            'nilai.max' => 'Maksimal 3 karakter',

            'status.required' => 'Status belum diisi',
            
            'akademik.required' => 'Hasil test belum diunggah.',
            'akademik.mimes' => 'Format file harus pdf.',
            'akademik.max' => 'Maksimal 1 MB untuk ukuran file.',
        ]);
        
       
         // INPUT FOTO test akademik
         if (!empty($request->akademik)) {
            $AkademikFileName = 'akademik-' . uniqid() . '.' . $request->akademik->extension();
            $request->akademik->move(public_path('admin/akademik'),$AkademikFileName);
        } else {
            $AkademikFileName = '';
        }


        // dengan query builder
        DB::table('akademik')->insert([
            'user_id' => $request->user_id,
            'nilai' =>$request-> nilai,
            'status' => $request->status,
            'fototest' => $AkademikFileName,
        ]);

        return redirect('/akademik')->with('success','Data Berhasil Tersimpan');
    
    }

    public function edit(string $id)
    {
        $users = DB::table('users')->get();
        $akademik = DB::table('akademik')->where('id',$id)->get();
        return view ('admin.akademik.edit', compact('users','akademik'));
    }



    public function update(Request $request, string $id)
    {

        $this->validate($request,[
            'user_id' => 'required',
           
            'nilai' => 'required|max:3',
            'status' => 'required',
            'akademik'   => 'mimes:pdf|max:1000',

        ],[
            'user_id.required' => 'Akun siswa Belum diisi',

            'nilai.required' => 'Nilai belum diisi',
            'nilai.max' => 'Maksimal 3 karakter',

            'status.required' => 'Status belum diisi',
            
            'akademik.mimes' => 'Format file harus pdf.',
            'akademik.max' => 'Maksimal 1 MB untuk ukuran file.',
        ]);

        // UPDATE FOTO AKADEMIK
        $fotoAkademik = DB::table('akademik')->select('fototest')->where('id', $request->id)->get();
        foreach ($fotoAkademik as $foto) {
            $namaFileAkademikLama = $foto->fototest;
        }

        if (!empty($request->akademik)) {
            // Hapus foto akademik lama hanya jika ada foto akademik baru yang diunggah
            if (!empty($namaFileAkademikLama)) {
                unlink(public_path('admin/akademik/' . $namaFileAkademikLama));
            }
            
            $akademikFileName = 'akademik-' . $request->id . '.' . $request->akademik->extension();
            $request->akademik->move(public_path('admin/akademik'), $akademikFileName);
        } else {
            // Jika tidak ada foto akademik baru yang diunggah, gunakan foto akademik lama
            $akademikFileName = $namaFileAkademikLama;
        }


        // update data
        DB::table('akademik')->where('id', $request->id)->update([
            'user_id' => $request->user_id,
            'nilai' =>$request->nilai,
            'status' => $request-> status,
            'fototest' => $akademikFileName,
        ]);
        return redirect('/akademik')->with('success', 'Data  berhasil di Update!');

    }


    public function destroy(string $id)
    {
        try {
            DB::table('akademik')->where('id', $id)->delete();
            return redirect('/akademik')->with('success', 'Data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect('/akademik')->with('error', 'Gagal menghapus data. Terdapat relasi yang terkait.');
        }
    }
}
