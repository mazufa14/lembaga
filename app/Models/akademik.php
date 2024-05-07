<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akademik extends Model
{
    use HasFactory;
     //mapping table 
     protected $table = 'akademik';
     //mapping kolom atau field
     protected $fillable = ['user_id','nilai','status','fototest'];
     public $timestamps = false;
}
