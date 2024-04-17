<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProgramkerjaController;
use App\Http\Controllers\PendaftarkerjaController;
use App\Http\Controllers\ProseskerjaController;

use App\Http\Controllers\PendaftarbelajarController;

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
    return view('welcome');
});


// Route::get('/', function () {
//     return view('test');
// });

// pemanggilan baru

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/notfound',[DashboardController::class,'page']);


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

// tabel proses kerja
Route::get('/proseskerja',[ProseskerjaController::class,'index']);
Route::get('/proseskerja/create',[ProseskerjaController::class,'create']);
Route::post('/proseskerja/store',[ProseskerjaController::class,'store']);
Route::get('/proseskerja/show/{id}',[ProseskerjaController::class,'show']);
Route::get('/proseskerja/delete/{id}',[ProseskerjaController::class,'destroy']);
Route::post('/proseskerja/update/{id}', [ProseskerjaController::class, 'update']);
Route::get('/proseskerja/edit/{id}', [ProseskerjaController::class, 'edit']);

// PROGRAM BELAJAR

//tabel pendaftar BELAJAR
Route::get('/pendaftarbelajar',[PendaftarbelajarController::class,'index']);
Route::get('/pendaftarbelajar/create',[PendaftarbelajarController::class,'create']);
Route::post('/pendaftarbelajar/store',[PendaftarbelajarController::class,'store']);
Route::get('/pendaftarbelajar/show/{id}',[PendaftarbelajarController::class,'show']);
Route::get('/pendaftarbelajar/delete/{id}',[PendaftarbelajarController::class,'destroy']);
Route::post('/pendaftarbelajar/update/{id}', [PendaftarbelajarController::class, 'update']);
Route::get('/pendaftarbelajar/edit/{id}', [PendaftarbelajarController::class, 'edit']);