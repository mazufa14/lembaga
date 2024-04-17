<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program_belajar extends Model
{
    use HasFactory;
    //mapping table 
    protected $table = 'program_belajar';
    //mapping kolom atau field
    protected $fillable = ['nama_program_belajar'];
    public $timestamps = false;
}
