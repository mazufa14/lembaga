<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;

      //mapping table 
      protected $table = 'pembayaran';
      //mapping kolom atau field
      protected $fillable = ['user_id','status','keterangan','fotopembayaran'];
      public $timestamps = false;
}
