<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proses_belajar extends Model
{
    use HasFactory;
    //mapping table 
    protected $table = 'proses_belajar';
    //mapping kolom atau field
    protected $fillable = ['nama_murid','program_proses_belajar','deskripsi'];
    public $timestamps = false;
}
