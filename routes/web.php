<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProgramkerjaController;

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