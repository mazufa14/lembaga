<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\DepanController;

use App\Http\Controllers\ProgramkerjaController;
use App\Http\Controllers\ProgrambelajarController;
use App\Http\Controllers\PendaftarkerjaController;
use App\Http\Controllers\PendaftarbelajarController;
use App\Http\Controllers\ProseskerjaController;
use App\Http\Controllers\ProsesbelajarController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AkademikController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('depan.home');
});


// Route::get('/', function () {
//     return view('test');
// });

// pemanggilan baru


Route::get('/notfound',[DashboardController::class,'page']);
Route::get('/home',function () {
    return redirect('/dashboard');
});


// admin harus diperbaiki tampilannya
Route::get('/rumah',[DepanController::class, 'rumah']);
Route::get('/about',[DepanController::class, 'about']);
Route::get('/contact',[DepanController::class, 'contact']);
Route::get('/program',[DepanController::class, 'program']);
Route::get('/caradaftar',[DepanController::class, 'caradaftar']);
Route::get('/kerjasama',[DepanController::class, 'kerjasama']);
Route::get('/keberangkatan',[DepanController::class, 'keberangkatan']);

Route::middleware(['guest'])->group(function() {
    Route::get('/login',[SesiController::class,'index'])->name('login');
    Route::post('/login',[SesiController::class,'login']);
    Route::get('/register',[SesiController::class,'register']);
    Route::post('/register',[SesiController::class,'store']);
});


Route::group(['middleware' => ['auth', 'peran:admin-siswa-penguji']], function(){
    Route::get('/logout',[SesiController::class,'logout']);
    Route::get('/dashboard',[DashboardController::class,'index']);


    // ganti password
    Route::get('/profil',[SesiController::class, 'password']);
    Route::post('/password/update', [SesiController::class, 'update']);



    // PROGRAM KERJA
    // tabel program kerja
    Route::get('/programkerja',[ProgramkerjaController::class,'index']);
    Route::get('/programkerja/create', [ProgramKerjaController::class, 'create']);
    Route::post('/programkerja/store', [ProgramKerjaController::class, 'store']);
    Route::get('/programkerja/delete/{id}', [ProgramKerjaController::class, 'delete']);
    Route::get('/programkerja/edit/{id}', [ProgramKerjaController::class, 'edit']);
    Route::post('/programkerja/update/{id}', [ProgramKerjaController::class, 'update']);

    //tabel pendaftar kerja
    Route::get('/pendaftarkerja',[PendaftarkerjaController::class,'index']);
    Route::get('/pendaftarkerja/create',[PendaftarkerjaController::class,'create']);
    Route::post('/pendaftarkerja/store',[PendaftarkerjaController::class,'store']);
    Route::get('/pendaftarkerja/show/{id}',[PendaftarkerjaController::class,'show']);
    Route::get('/pendaftarkerja/delete/{id}',[PendaftarkerjaController::class,'destroy']);
    Route::post('/pendaftarkerja/update/{id}', [PendaftarkerjaController::class, 'update']);
    Route::get('/pendaftarkerja/edit/{id}', [PendaftarkerjaController::class, 'edit']);

    Route::get('/pendaftarkerja/pdf',[PendaftarkerjaController::class,'generatePDF']);

    // tabel proses kerja
    Route::get('/proseskerja',[ProseskerjaController::class,'index']);
    Route::get('/proseskerja/create',[ProseskerjaController::class,'create']);
    Route::post('/proseskerja/store',[ProseskerjaController::class,'store']);
    Route::get('/proseskerja/show/{id}',[ProseskerjaController::class,'show']);
    Route::get('/proseskerja/delete/{id}',[ProseskerjaController::class,'destroy']);
    Route::post('/proseskerja/update/{id}', [ProseskerjaController::class, 'update']);
    Route::get('/proseskerja/edit/{id}', [ProseskerjaController::class, 'edit']);

    // tabel pembayaran
    Route::get('/pembayaran',[PembayaranController::class,'index']);
    Route::get('/pembayaran/create',[PembayaranController::class,'create']);
    Route::post('/pembayaran/store',[PembayaranController::class,'store']);
    Route::get('/pembayaran/delete/{id}',[PembayaranController::class,'destroy']);
    Route::post('/pembayaran/update/{id}', [PembayaranController::class, 'update']);
    Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit']);
    Route::get('/pembayaran/pdf',[PembayaranController::class,'generatePDF']);

    // tabel test akademik 
    Route::get('/akademik',[AkademikController::class,'index']);
    Route::get('/akademik/create',[AkademikController::class,'create']);
    Route::post('/akademik/store',[AkademikController::class,'store']);
    Route::get('/akademik/delete/{id}',[AkademikController::class,'destroy']);
    Route::post('/akademik/update/{id}', [AkademikController::class, 'update']);
    Route::get('/akademik/edit/{id}', [AkademikController::class, 'edit']);

    // Akun controller
    // Route::get('/sidebar',[AkunController::class,'sidebar']);
    Route::get('/akun',[AkunController::class,'index']);
    Route::get('/akun/create',[AkunController::class,'create']);
    Route::post('/akun/store',[AkunController::class,'store']);
    Route::get('/akun/delete/{id}',[AkunController::class,'destroy']);
    

});

// Route::middleware(['auth'])->group(function(){
// });






// PROGRAM BELAJAR
//tabel pendaftar BELAJAR
Route::get('/pendaftarbelajar',[PendaftarbelajarController::class,'index']);
Route::get('/pendaftarbelajar/create',[PendaftarbelajarController::class,'create']);
Route::post('/pendaftarbelajar/store',[PendaftarbelajarController::class,'store']);
Route::get('/pendaftarbelajar/show/{id}',[PendaftarbelajarController::class,'show']);
Route::get('/pendaftarbelajar/delete/{id}',[PendaftarbelajarController::class,'destroy']);
Route::post('/pendaftarbelajar/update/{id}', [PendaftarbelajarController::class, 'update']);
Route::get('/pendaftarbelajar/edit/{id}', [PendaftarbelajarController::class, 'edit']);

// tabel program belajar
Route::get('/programbelajar',[ProgrambelajarController::class,'index']);
Route::get('/programbelajar/create', [ProgrambelajarController::class, 'create']);
Route::post('/programbelajar/store', [ProgrambelajarController::class, 'store']);
Route::get('/programbelajar/delete/{id}', [ProgrambelajarController::class, 'delete']);
Route::get('/programbelajar/edit/{id}', [ProgrambelajarController::class, 'edit']);
Route::post('/programbelajar/update/{id}', [ProgrambelajarController::class, 'update']);


// tabel proses belajar
Route::get('/prosesbelajar',[ProsesbelajarController::class,'index']);
Route::get('/prosesbelajar/create',[ProsesbelajarController::class,'create']);
Route::post('/prosesbelajar/store',[ProsesbelajarController::class,'store']);
Route::get('/prosesbelajar/show/{id}',[ProsesbelajarController::class,'show']);
Route::get('/prosesbelajar/delete/{id}',[ProsesbelajarController::class,'destroy']);
Route::post('/prosesbelajar/update/{id}', [ProsesbelajarController::class, 'update']);
Route::get('/prosesbelajar/edit/{id}', [ProsesbelajarController::class, 'edit']);