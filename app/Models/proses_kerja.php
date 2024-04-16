<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proses_kerja extends Model
{
    use HasFactory;

    //mapping table 
    protected $table = 'proses_kerja';
    //mapping kolom atau field
    protected $fillable = ['nama_pekerja','program_proses_kerja','deskripsi','sertfikasi','kebahasaan'];
    public $timestamps = false;

}
