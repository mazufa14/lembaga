<?php

namespace App\Models;

use App\Models\pendaftar_kerja;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program_kerja extends Model
{
    use HasFactory;

    //mapping table 
    protected $table = 'program_kerja';
    //mapping kolom atau field
    protected $fillable = ['nama_program'];
    public $timestamps = false;

    //relasi antar table
    // public function pendaftar_kerja(){
    //     return $this->hasMany(pendaftar_kerja::class);
    // }

    // public function proses_kerja(){
    //     return $this->hasMany(proses_kerja::class);
    // }
}
