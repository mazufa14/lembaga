<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\akademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException; 
// use illuminate\Http\Facades\DB;


class AkunController extends Controller
{


    // public function sidebar()
    // {
    // // Mengambil semua nilai status dari tabel akademik
    // $statuses = akademik::pluck('status');

    // // Mengirimkan data menggunakan with
    // return view('admin.layout.sidebar')->with('statuses', $statuses);
    // }

    // public function sidebar()
    // {
    //     //sintax dengan eloquent
    //     $akademik = akademik::all();
    //     return view ('admin.layout.sidebar', compact('akademik'));
    // }

    public function index()
    {
        //sintax dengan eloquent
        $user = User::all();
        return view ('admin.akuncontrol.index', compact('user'));
    }

    public function create()
    {
        return view('admin.akuncontrol.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:50|unique:users,name',
            'password' => 'required|max:50|min:5',
            // 'email' => 'required|email|max:50|unique:users,email',
            // 'role' => 'nullable'
        ],
        [
            'username.required' => 'Username belum diisi',
            'username.max' => 'Username maksimal 50',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password belum diisi',
            'password.max' => 'Password maksimal 50 karakter',
            'password.min' => 'Password minimal 5 karakter',

            // 'email.required' => 'Email belum diisi',
            // 'email.email' => 'Email tidak valid',
            // 'email.max' => 'Maksimal 50 karakter',
            // 'email.unique' => 'Email sudah digunakan',
            // 'role' => 'Role belum diisi'
        ]);

        // tambah data ke tabel user
        DB::table('users')->insert([
            'name'=>$request->username,
            // 'email' =>$request->email,
            'password' =>bcrypt($request->password), 
            'role' =>$request->role,
        ]);
        return redirect('/akun')->with('success','Data berhasil tersimpan!');

    }

    public function destroy(string $id)
    {
    try {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/akun')->with('success', 'Data berhasil dihapus!');
    } catch (QueryException $e) {
        return redirect('/akun')->with('error', 'Gagal menghapus data. Terdapat relasi yang terkait.');
    } catch (\Exception $e) {
        return redirect('/akun')->with('error', 'Gagal menghapus data.');
    }
    }
   
}
