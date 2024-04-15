<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProgramkerjaController;
use App\Http\Controllers\PendaftarkerjaController;

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
