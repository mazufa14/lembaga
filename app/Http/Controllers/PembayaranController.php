<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\pembayaran;
use App\Models\akademik;
use App\Models\pendaftar_kerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException; 
use PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf; 


class PembayaranController extends Controller
{
    //
    
    // public function index(){
    //     // Mendapatkan role pengguna yang sedang login
    //     $role = Auth::user()->role;
    //     $user = Auth::user();
    //     $role = $user->role;
    //     $user_id = $user->id;
    
    //     // Inisialisasi query untuk mengambil data pembayaran
    //     $query = pembayaran::join('users', 'pembayaran.user_id', '=', 'users.id')
    //         ->select('pembayaran.*', 'users.name as namaakun');
    
    //     // Jika pengguna adalah admin, ambil semua data pembayaran
    //     if($role === 'admin') {
    //         $pembayaran = $query->paginate(10);
    //     } else {
    //         // Jika pengguna bukan admin, ambil data pembayaran sesuai dengan user_id yang sedang login
    //         $user_id = Auth::id();
    //         $pembayaran = $query->where('pembayaran.user_id', $user_id)->paginate(10);
    //     }
    
    //     $statusakademik = akademik::where('user_id', $user_id)->value('status');

    //     return view('admin.pembayaran.index', compact('pembayaran','statusakademik'));
    // }


    public function index()
    {
        // Mendapatkan role pengguna yang sedang login
        $user = Auth::user();
        $role = $user->role;
        $user_id = $user->id;
        
        // Inisialisasi query untuk mengambil data pembayaran
        $query = pembayaran::join('users', 'pembayaran.user_id', '=', 'users.id')
            ->select('pembayaran.*', 'users.name as namaakun');
    
        // Jika pengguna adalah admin, ambil semua data pembayaran
        if ($role === 'admin') {
            $pembayaran = $query->paginate(10);
        } else {
            // Jika pengguna bukan admin, ambil data pembayaran sesuai dengan user_id yang sedang login
            $pembayaran = $query->where('pembayaran.user_id', $user_id)->paginate(10);
        }

        // Mendapatkan status pembayaran pengguna yang sedang login
        $statusakademik = akademik::where('user_id', $user_id)->value('status');

        // Kembalikan view dengan data pembayaran dan status pembayaran (jika tidak admin)
        return view('admin.pembayaran.index', compact('pembayaran', 'statusakademik'));
    }
    


    public function create()
    {
        
        if (Auth::user()->role === 'admin') {
            $users = DB::table('users')
                ->whereNotIn('role', ['admin', 'owner'])
                ->get();
        } else {
            $userId = Auth::id();
            $users = collect([User::findOrFail($userId)]);
        }
       
    
        return view('admin.pembayaran.create', compact('users'));

        

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required|unique:pembayaran,user_id',
            'keterangan' => 'required|max:100',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024', // sesuaikan dengan kebutuhan

        ],[
            'user_id.required' => 'Akun siswa Belum diisi',
            'user_id.unique' => 'Data pembayaran sudah ada',

            'keterangan.required' => 'Keterangan belum diisi',
            'keterangan.max' => 'Maksimal 100 karakter',
            
            'foto.required' => 'Foto pembayaran belum diinput.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format file harus jpeg, png, jpg, atau gif.',
            'foto.max' => 'Maksimal 1 MB untuk ukuran file.',
        ]);
        
        // INPUT FOTO
        if(!empty($request->foto)){
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/pembayaran'), $fileName);
        } else {
            $fileName = '';
        }


        // dengan query builder
        DB::table('pembayaran')->insert([
            'user_id' => $request->user_id,
            'keterangan' =>$request-> keterangan,
            'fotopembayaran' => $fileName,
        ]);

        return redirect('/pembayaran')->with('success','Data Berhasil Tersimpan');
    
    }

    public function edit(string $id)
    {
        $users = DB::table('users')->get();
        $pembayaran = DB::table('pembayaran')->where('id',$id)->get();
        return view ('admin.pembayaran.edit', compact('users','pembayaran'));
    }


    public function update(Request $request, string $id)
    {
    //     $this->validate($request,[
    //         'user_id' => 'required',
    //         'keterangan' => 'required|max:100',
    //         'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024', // sesuaikan dengan kebutuhan
    //     ],
    //     [
    //         'user_id.required' => 'Akun siswa Belum diisi',
    //         'user_id.max' => 'Maksimal 100 karakter',

    //         'keterangan.required' => 'Keterangan belum diisi',
    //         'keterangan.max' => 'Maksimal 100 karakter',
            
    //         'foto.required' => 'Foto pembayaran belum diinput.',
    //         'foto.image' => 'File harus berupa gambar.',
    //         'foto.mimes' => 'Format file harus jpeg, png, jpg, atau gif.',
    //         'foto.max' => 'Maksimal 1 MB untuk ukuran file.',
    //     ]
    //   );



        //update FOTO pembayaran
        // $foto = DB::table('pembayaran')->select('fotopembayaran')->where('id', $request->id)->get();
        // foreach($foto as $f){
        //     $namaFileFotoLama = $f->foto;
        // }

        // if (!empty($request->foto)) {
        //     // Hapus foto lama hanya jika ada foto baru yang diunggah
        //     if (!empty($namaFileFotoLama)) {
        //         unlink('admin/pembayaran/'.$namaFileFotoLama);
        //     }
            
        //     $fileName = 'foto-' .$request->id . '.' . $request->foto->extension();
        //     $request->foto->move(public_path('admin/pembayaran'), $fileName);
        // } else {
        //     // Jika tidak ada foto baru yang diunggah, gunakan foto lama
        //     $fileName = $namaFileFotoLama;
        // }


        DB::table('pembayaran')->where('id', $request->id)->update([
            'user_id' => $request->user_id,
            'keterangan' =>$request-> keterangan,
            'status' => $request-> status,
        ]);
        return redirect('/pembayaran')->with('success', 'Data  berhasil di Update!');

    }


    public function generatePDF(){
    
        // $pembayaran = pembayaran::all();

        $pembayaran = Pembayaran::join('users', 'pembayaran.user_id', '=', 'users.id')
        ->select('pembayaran.*', 'users.name as nama','program_kerja.name as namaprogram')
        ->get();
    
        $pdf = FacadePdf::loadview('admin.pembayaran.pdf', compact('pembayaran'));
    
        return $pdf->stream('Laporan Pembayaran.pdf');
    
    
        }


    public function destroy(string $id)
    {
        try {
            DB::table('pembayaran')->where('id', $id)->delete();
            return redirect('/pembayaran')->with('success', 'Data berhasil dihapus');
        } catch (QueryException $e) {
            return redirect('/pembayaran')->with('error', 'Gagal menghapus data. Terdapat relasi yang terkait.');
        }
    }


}
