<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException; 

class SesiController extends Controller
{
    //
    function index()
    {
        return view('admin.login.index');
    }

    function register()
    {
        return view('admin.login.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:8',
            'password' => 'required|max:20|min:5|confirmed', // Menggunakan 'confirmed' untuk memeriksa konfirmasi password
            // 'email' => 'required|email|max:50',
            // 'role' => 'nullable'
        ],
        [
            'username.required' => 'Username belum diisi',
            'username.min' => 'Username minimal 8',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password belum diisi',
            'password.max' => 'Password maksimal 20 karakter',
            'password.min' => 'Password minimal 5 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok', // Pesan untuk konfirmasi password
            // 'email.required' => 'Email belum diisi',
            // 'email.email' => 'Email tidak valid',
            // 'email.max' => 'Maksimal 50 karakter',
            // 'email.unique' => 'Email sudah digunakan',
            // 'role' => 'Role belum diisi'
        ]);
    
        // tambah data ke tabel user
        DB::table('users')->insert([
            'name' => $request->username,
            // 'email' => $request->email,
            'password' => bcrypt($request->password), 
        ]);
        return redirect('/login')->with('success', 'Registrasi Berhasil!');
    }

    

   


    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'name' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('/dashboard');
        } else {
            return redirect('/login')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
