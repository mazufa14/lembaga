<?php

namespace App\Models;

// use App\Models\proses_kerja;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proses_kerja extends Model
{
    use HasFactory;

    //mapping table 
    protected $table = 'proses_kerja';
    //mapping kolom atau field
    protected $fillable = ['nama_pekerja','program_proses_kerja','deskripsi','sertfikasi','kebahasaan','user_id'];
    public $timestamps = false;

    // function ke proses kerja
    public function user()
    {
        return $this->belongsTo(proses_kerja::class);
    }

}
