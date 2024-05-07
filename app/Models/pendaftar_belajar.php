<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftar_belajar extends Model
{
    use HasFactory;
    protected $table = 'pendaftar_belajar';
    protected $fillable = ['pendaftar_belajar','jenis_kelamin','tempat_lahir','tanggal_lahir','usia','no_hp','alamat_email','motivasi','tingkat_belajar','foto','program_belajar'];
    public $timestamps = false;
}
