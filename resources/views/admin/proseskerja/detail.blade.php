@extends('admin.layout.appadmin')
@section('content')


@foreach ($proses_kerja as $proker)

@if (Auth::user()->role == 'admin')
<div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Datatable</h3>
                <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can check the full documentation <a href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p>
            </div>
            <div class="col-12 col-md-6 order-md-1 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center mb-3">Informasi siswa</h4>

            <div class="card-body">
            <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disabledInput">Nama siswa</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->namapekerja}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Proses 1 - Persyaratan awal</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->proses1}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Proses 2 - Nilai Test</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->nilai}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Proses 4 - Pembelajaran</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->proses4}}">
                        </div>

                        
                        
                        <div class="form-group">
                            <label for="disabledInput">Program kerja yang diambil</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->namaprogram}}">
                        </div>
                    </div>
                    
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="disabledInput">Sertifikasi Kebahasaan </label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->kebahasaan}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Proses 2 - Test akademik dasar</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->proses2}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Proses 3 - Daftar Ulang</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->proses3}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Proses 4 - Pembelajaran Selama</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->bulan}}">
                        </div>


                        <div class="form-group">
                            <label for="disabledInput">Sertfikasi Pekerjaan</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->sertifikasi}}">
                        </div>

                        <!-- <div class="form-group">
                            <label for="disabledInput">Deskripsi</label>
                            <textarea class="form-control" id="readonlyInput" readonly="readonly" rows="4">{{$proker->deskripsi}}</textarea>
                        </div>                         -->

                    </div>

                    <div class="justify-content-center text-center">
                        <label for="disabledInput">Deskripsi</label>
                        <textarea class="form-control" id="readonlyInput" readonly="readonly" rows="5">{{$proker->deskripsi}}</textarea>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
@endif

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
</div>

<div class="card">
    <div class="card-body">
        <table class='table table-striped'>
        <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 1 </h5>
        <hr>
            <thead>
                <tr>
                    <th>Program siswa</th>
                    <th>Lembaga melakukan cek data</th>
                    <th>Status proses lembaga</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{$proker->namaprogram}}</td>
                    <td>{{$proker->namapekerja}}</td>
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
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Mengerjakan test </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Terdiri dari beberapa soal </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Nilai minimal yag didapat >70 </p>
    </div>
</div>

<div class="card">
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
        <p class="card-text">Dokumen yang diserahkan saat daftar ulang</p>
        <hr>    
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Fotokopy KTP </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Fotokopy KK </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Akte kelahiran  </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Ijazah terakhir  </p>
        <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Foto ukuran 3x4 tiga lembar background warna bebas  </p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class='table table-striped'>
        <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 3 </h5>
        <hr>
            <thead>
                <tr>
                    <th>Program siswa</th>
                    <th>Lembaga melakukan cek data daftar ulang siswa</th>
                    <th>Status proses lembaga</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{$proker->namaprogram}}</td>
                    <td>{{$proker->namapekerja}}</td>
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
</div>

<div class="card">
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
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class='table table-striped'>
        <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses 5 </h5>
        <hr>
            <thead>
                <tr>
                    <th>Program siswa</th>
                    <th>Tingkat Sertifikasi kebahasaan</th>
                    <th>Status proses lembaga</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{$proker->namaprogram}}</td>
                    <td>{{$proker->kebahasaan}}</td>
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

<br><br>

<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center mb-3">Informasi siswa</h4>

            <div class="card-body">
            <p>Siswa dapat melihat tahapan <code> proses </code> data yang sudah dilalui </p>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disabledInput">Nama siswa</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->namapekerja}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Program kerja yang diambil</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->namaprogram}}">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                            <label for="disabledInput">Sertifikasi Kebahasaan </label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->kebahasaan}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Sertfikasi Pekerjaan</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->sertifikasi}}">
                        </div>

                        <!-- <div class="form-group">
                            <label for="disabledInput">Deskripsi</label>
                            <textarea class="form-control" id="readonlyInput" readonly="readonly" rows="4">{{$proker->deskripsi}}</textarea>
                        </div>                         -->

                    </div>

                    <div class="justify-content-center text-center">
                        <label for="disabledInput">Deskripsi</label>
                        <textarea class="form-control" id="readonlyInput" readonly="readonly" rows="5">{{$proker->deskripsi}}</textarea>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
    

    




@endforeach  
@endsection