<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftar_kerja extends Model
{
    use HasFactory;
    protected $table = 'pendaftar_kerja';
    protected $fillable = ['pendaftar_pekerja','tempat_lahir','tanggal_lahir','berat_badan','jenis_kelamin','nikah','alamat_email','no_hp','alamat_rumah','sakit_berat','pendidikan_terakhir','program','foto','user_id','status','fotokk','fotoakte','fotoktp','fotoijazah'];
    public $timestamps = false;


    // public function program_kerja(){
    //     return $this->belongsTo(program_kerja::class,'program');
    // }




}
