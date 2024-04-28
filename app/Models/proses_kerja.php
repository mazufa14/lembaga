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
    protected $fillable = ['nama_pekerja','program_proses_kerja','deskripsi','sertfikasi','kebahasaan','user_id','proses1','proses2','nilai','proses3','proses4','proses5','bulan','proses6','proses7','perusahaan','proses8','proses9','proses10','proses11','proses12'];
    public $timestamps = false;

    // function ke proses kerja
    public function user()
    {
        return $this->belongsTo(proses_kerja::class);
    }

}
