@extends('admin.layout.appadmin')
@section('content')


@foreach ($proses_kerja as $proker)


<!-- /* ubah ukuran teks sesuai kebutuhan */ -->
<!-- <style>
    
    .card-text {
    font-size: 15px; 
}

.centered-text {
    display: flex;
    justify-content: center;
    align-items: center;
}

</style> -->


<div class="card">
    <div class="card-body">
        <h5 class="card-title">  <i class="fas fa-circle fa-lg" style="color: #50ff05;"></i> Halaman proses siswa </h5>
        <p class="card-text"> Semua proses data siswa di atur oleh pihak lembaga mulai dari pendaftaran sampai keberangkatan</p>
        <hr>
        <p class="card-text text-center">Di sini, Anda akan melihat semua proses, mulai dari pendaftaran dan seleksi awal pada lembaga,proses sertifikasi kebahasaan, seleksi pengguna, wawancara, pemeriksaan medis, penandatanganan kontrak, hingga persiapan keberangkatan.</p>
    </div>
</div>
<hr>


<!--  PROSES 1 -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Proses 1 - Persyaratan awal dan Pendaftaran </h5>
        <p class="card-text"> Semua proses data siswa di atur oleh pihak lembaga mulai dari pendaftaran sampai keberangkatan</p>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Laki-laki / Perempuan </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Lulusan SMU sederajat </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Usia minimal 17 tahun </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Sehat Jasmani & Rohani </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Tidak bertato </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Tidak bertindik (laki-laki) </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Tinggi Min. 153 (perempuan) </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Tinggi Min. 160 (laki-laki) </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Berat proporsional </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Tidak buta warna/ mata normal </p>
        
    </div>

    <div class="card-body">
        <table class='table table-striped'>
        <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 1 </h5>
        <hr>
            <thead>
                <tr>
                    <th>Program siswa</th>
                    <!-- <th>Lembaga melakukan cek data</th> -->
                    <th>Status proses lembaga</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{$proker->namaprogram}}</td>
                    <!-- <td>{{$proker->namapekerja}}</td> -->
                    <td>
                    <span class="badge {{$proker->proses1 == 'Memenuhi' ? 'bg-success' : 'bg-danger'}}">
                        {{$proker->proses1}}
                    </span>    
                   </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<hr>

<!-- proses 2 -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Proses 2 - Tes Akademik dasar </h5>
        <p class="card-text">Mengerjakan tes potensi akademik dasar</p>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Mengerjakan test tulis </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Terdiri dari beberapa soal </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Nilai minimal yag didapat >= 300 </p>
    </div>

    <div class="card-body">
        <table class='table table-striped'>
        <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 2 </h5>
        <hr>
            <thead>
                <tr>
                    <th>Program siswa</th>
                    <th>Nilai</th>
                    <th>Status proses lembaga</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{$proker->namaprogram}}</td>
                    <td>{{$proker->nilai}}</td>
                    <td>
                    <span class="badge {{$proker->proses2 == 'Memenuhi' ? 'bg-success' : 'bg-danger'}}">
                        {{$proker->proses2}}
                    </span>    
                   </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<hr>

<!--  PROSES 3 -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Proses 3 - Daftar Ulang </h5>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Fotokopy KTP </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Fotokopy KK </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Akte kelahiran  </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Ijazah terakhir  </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Foto ukuran 3x4 tiga lembar background warna bebas  </p>
    </div>

    <div class="card-body">
        <table class='table table-striped'>
        <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 3 </h5>
        <hr>
            <thead>
                <tr>
                    <th>Program siswa</th>
                    <th>Status proses lembaga</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{$proker->namaprogram}}</td>
                    <td>
                    <span class="badge {{$proker->proses3 == 'Memenuhi' ? 'bg-success' : 'bg-danger'}}">
                        {{$proker->proses3}}
                    </span>    
                   </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<hr>

<!-- PROSES 4 -->


<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Proses 4 - Program belajar </h5>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Siswa mengambil program belajar yang disediakan lembaga </p>
    </div>

    <div class="card-body">
        <table class='table table-striped'>
        <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 4 </h5>
        <hr>
            <thead>
                <tr>
                    <th>Program siswa</th>
                    <th>Lama bulan belajar</th>
                    <th>Status proses lembaga</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{$proker->namaprogram}}</td>
                    <td>{{$proker->bulan}}</td>
                    <td>
                    <span class="badge {{$proker->proses4 == 'Memenuhi' ? 'bg-success' : 'bg-danger'}}">
                        {{$proker->proses4}}
                    </span>    
                   </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

    

<hr>





<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Proses 5 - Sertifikasi Kebahasaan </h5>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Siswa mengikuti test sertfikasi kebahasaan <code>* diatur oleh lembaga</code></p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Mengambil sertifikasi sesuai dengan program kerja yang diikuti </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> jika siswa gagal maka diulang dibulan selanjutnya  </p>
    </div>

        <div class="card-body">
            <table class='table table-striped'>
            <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 5 </h5>
            <hr>
                <thead>
                    <tr>
                        <th>Program siswa</th>
                        <th>Sertifikasi kebahasaan</th>
                        <th>Status proses lembaga</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{$proker->namaprogram}}</td>
                       
                        <td>
                            <div class="rounded">
                            @empty($proker->kebahasaan)
                                <button class="btn btn-success">No PDF</button>
                            @else
                                <a href="{{ url('admin/kebahasaan') }}/{{ $proker->kebahasaan }}" class="btn btn-success" target="_blank"> <i class="fas fa-file-pdf"></i> Lihat PDF</a>
                            @endempty
                            </div>
                        </td>

                        <td>
                        <span class="badge {{$proker->proses5 == 'Memenuhi' ? 'bg-success' : 'bg-danger'}}">
                            {{$proker->proses5}}
                        </span>    
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>



<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Proses 6 - Sertifikasi Pekerjaan </h5>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Siswa mengikuti test sertifikasi pekerjaan <code>* diatur oleh lembaga</code></p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> hanya siswa yang mengambil program Tokutei Ginou/Bekerja  </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Jika siswa gagal maka diulang dibulan selanjutnya  </p>
    </div>

        <div class="card-body">
            <table class='table table-striped'>
            <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 6 </h5>
            <hr>
                <thead>
                    <tr>
                        <th>Program siswa</th>
                        <th>Bidang Sertifikasi <code>* Speciﬁed Skilled Workers</code> </th>
                        <th>Status proses lembaga</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{$proker->namaprogram}}</td>

                        <td>
                            <div class="rounded">
                            @empty($proker->sertifikasi)
                                <button class="btn btn-success">No PDF</button>
                            @else
                                <a href="{{ url('admin/sertifikasi') }}/{{ $proker->sertifikasi }}" class="btn btn-success" target="_blank"> <i class="fas fa-file-pdf"></i> Lihat PDF</a>
                            @endempty
                            </div>   
                        </td>

                        <td>
                        <span class="badge {{$proker->proses6 == 'Memenuhi' ? 'bg-success' : 'bg-danger'}}">
                            {{$proker->proses6}}
                        </span>    
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>


<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Proses 7 - Wawancara/seleksi user </h5>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Siswa akan dicarikan perusahaan oleh lembaga sesuai dengan bidang pekerjaan </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Jika siswa gagal wawancara akan dicarikan perusahaan lain</p>
    </div>

        <div class="card-body">
            <table class='table table-striped'>
            <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 7 </h5>
            <hr>
                <thead>
                    <tr>
                        <th>Program siswa</th>
                        <th>Nama Perusahaan </th>
                        <th>Status proses lembaga</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{$proker->namaprogram}}</td>
                        <td>{{$proker->perusahaan}}</td>
                        <td>
                        <span class="badge {{$proker->proses7 == 'Memenuhi' ? 'bg-success' : 'bg-danger'}}">
                            {{$proker->proses7}}
                        </span>    
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>


<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Proses 8 - Medikal Checkup </h5>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Setelah wawancara berhasil Siswa melakukan medikal checkup <code>diatur oleh lembaga</code></p>
    </div>

        <div class="card-body">
            <table class='table table-striped'>
            <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 8 </h5>
            <hr>
                <thead>
                    <tr>
                        <th>Program siswa</th>
                        <!-- <th>Nama Perusahaan </th> -->
                        <th>Status proses lembaga</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{$proker->namaprogram}}</td>
                        <!-- <td>Medikal checkup </td> -->
                        <td>
                        <span class="badge {{$proker->proses8 == 'Memenuhi' ? 'bg-success' : 'bg-danger'}}">
                            {{$proker->proses8}}
                        </span>    
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>


<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Proses 9 - Tanda Tangan Kontrak </h5>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Siswa melakukan tanda tangan kontrak sesuai dengan perusahaan</p>
    </div>

        <div class="card-body">
            <table class='table table-striped'>
            <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 9 </h5>
            <hr>
                <thead>
                    <tr>
                        <th>Program siswa</th>
                        <th>Nama Perusahaan </th>
                        <th>Status proses lembaga</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{$proker->namaprogram}}</td>
                        <td>{{$proker->perusahaan}}</td>
                        <td>
                        <span class="badge {{$proker->proses9 == 'Memenuhi' ? 'bg-success' : 'bg-danger'}}">
                            {{$proker->proses9}}
                        </span>    
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>


<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Proses 10 - Passport </h5>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Lembaga akan segera mengajukan passport ke badan imigrasi</p>        
    </div>

        <div class="card-body">
            <table class='table table-striped'>
            <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 10 </h5>
            <hr>
                <thead>
                    <tr>
                        <th>Program siswa</th>
                        <!-- <th>Dokumen visa</th> -->
                        <th>Status proses lembaga</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{$proker->namaprogram}}</td>
                        <!-- <td>{{$proker->perusahaan}}</td> -->
                        <td>
                        <span class="badge {{$proker->proses10 == 'Memenuhi' ? 'bg-success' : 'bg-danger'}}">
                            {{$proker->proses10}}
                        </span>    
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>


<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Proses 11 - Visa </h5>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Setelah siswa mendapatkan passport lembaga akan mengajukan visa ke kantor Kedutaan Besar  </p>        
    </div>

        <div class="card-body">
            <table class='table table-striped'>
            <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 11 </h5>
            <hr>
                <thead>
                    <tr>
                        <th>Program siswa</th>
                        <!-- <th>Dokumen visa</th> -->
                        <th>Status proses lembaga</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{$proker->namaprogram}}</td>
                        <!-- <td>{{$proker->perusahaan}}</td> -->
                        <td>
                        <span class="badge {{$proker->proses11 == 'Memenuhi' ? 'bg-success' : 'bg-danger'}}">
                            {{$proker->proses11}}
                        </span>    
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>


<!-- <div class="card">
    <div class="card-body">
        <h5 class="card-title"> Proses 12 - Keputusan Lembaga </h5>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Setelah siswa mendapatkan passport lembaga akan mengajukan visa ke kantor Kedutaan Besar  </p>        
    </div>

        <div class="card-body">
            <table class='table table-striped'>
            <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 12 </h5>
            <hr>
                <thead>
                    <tr>
                        <th>Program siswa</th>
                        <th>Status proses lembaga</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{$proker->namaprogram}}</td>
                        <td>
                        <span class="badge {{$proker->proses12 == 'Layak dan Siap diberangkatkan' ? 'bg-success' : 'bg-danger'}}">
                            {{$proker->proses12}}
                        </span>    
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div> -->





<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Catatan Tambahan Siswa</h5>
        <hr>    
        <p class="card-text">Deskripsi siswa:</p>
        <textarea readonly class="form-control" rows="4" placeholder="Masukkan deskripsi siswa di sini..."> {{$proker->deskripsi}}</textarea>
    </div>
</div>




@endforeach  
@endsection