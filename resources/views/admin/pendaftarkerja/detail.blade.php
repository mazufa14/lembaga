@extends('admin.layout.appadmin')
@section('content')


@foreach ($pendaftar_kerja as $proker)



<!-- <div class="page-title">
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
    </div> -->

    
   
    <!-- <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center mb-3">Informasi siswa</h4>

                <div class="justify-content-center text-center">
                        @empty($proker->foto)
                        <img class="card-img p-2 border" src="{{ url('admin/img/nophoto.png') }}" alt="No Photo">
                        @else
                        <img class="card-img " src="{{ url('admin/img') }}/{{ $proker->foto }}" alt="{{ $proker->pendaftar_pekerja }}" style="width: 200px; height: 200px ; object-fit: contain;">
                        @endempty
                    </div>
                </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="disabledInput">Nama Pendaftar </label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->pendaftar_pekerja}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Tempat Lahir </label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->tempat_lahir}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Tanggal Lahir </label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->tanggal_lahir}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Berat Badan <code> *kg </code></label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->berat_badan}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->jenis_kelamin}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Status Pernikahan</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->nikah}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Alamat Rumah</label>
                            <textarea class="form-control" id="readonlyInput" readonly="readonly" rows="4">{{$proker->alamat_rumah}}</textarea>
                        </div>
                    </div>


                    <div class="col-md-6">

                    <div class="form-group">
                            <label for="disabledInput">No hp </label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->no_hp}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Alamat Email</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->alamat_email}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Riwayat Penyakit</label>
                            <textarea class="form-control" id="readonlyInput" readonly="readonly" rows="4">{{$proker->sakit_berat}}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="disabledInput">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->pendidikan_terakhir}}">
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Program yang diambil</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="{{$proker->namaprogram}}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
   


   
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title text-center mb-3">
                Data Siswa - {{$proker->pendaftar_pekerja}}
            </h5>
            <div class="text-center">
                @empty($proker->foto)
                <img class="card-img p-2 rounded-circle img-thumbnail" src="{{ url('admin/img/nophoto.png') }}" alt="No Photo">
                @else
                <img class="card-img rounded-circle img-thumbnail" src="{{ url('admin/img') }}/{{ $proker->foto }}" alt="{{ $proker->pendaftar_pekerja }}" style="width: 160px; height: 160px; object-fit: cover;">
                @endempty
            </div>
            <hr>

            <div class="row">

                    <div class="col-md-6">

                    <div class="mb-3">
                        <div class="p-3 border rounded">
                            <h5 class="mb-2"></i> Nama Pendaftar</h5>
                            <p class="mb-0">{{$proker->pendaftar_pekerja}}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                            <h5 class="mb-2">Tempat Lahir</h5>
                            <p class="mb-0">{{$proker->tempat_lahir}}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                            <h5 class="mb-2">Tanggal Lahir</h5>
                            <p class="mb-0">{{$proker->tanggal_lahir}}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                            <h5 class="mb-2">Berat Badan <code>*kg</code></h5>
                            <p class="mb-0">{{$proker->berat_badan}}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                            <h5 class="mb-2">Jenis Kelamin</h5>
                            <p class="mb-0">{{$proker->jenis_kelamin}}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                            <h5 class="mb-2">Status Pernikahan</h5>
                            <p class="mb-0">{{$proker->nikah}}</p>
                        </div>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                        <h5 class="mb-2">Fotokopi KK</h5>
                        @empty($proker->fotokk)
                            <p>No PDF</p>
                        @else
                            <a href="{{ url('admin/pdfkartukeluarga') }}/{{ $proker->fotokk }}" target="_blank"> <i class="fas fa-file-pdf"></i> Download PDF</a>
                        @endempty
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                        <h5 class="mb-2">Fotokopi ijazah</h5>
                        @empty($proker->fotoijazah)
                            <p>No PDF</p>
                        @else
                            <a href="{{ url('admin/ijazah') }}/{{ $proker->fotoijazah }}" target="_blank"> <i class="fas fa-file-pdf"></i> Download PDF</a>
                        @endempty
                        </div>
                    </div>

                    

                        
                    </div>

                    <div class="col-md-6">

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                            <h5 class="mb-2">No hp</h5>
                            <p class="mb-0">{{$proker->no_hp}}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                            <h5 class="mb-2">Alamat Email</h5>
                            <p class="mb-0">{{$proker->alamat_email}}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                            <h5 class="mb-2">Riwayat Penyakit</h5>
                            <p class="mb-0">{{$proker->sakit_berat}}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                            <h5 class="mb-2">Pendidikan Terakhir</h5>
                            <p class="mb-0">{{$proker->pendidikan_terakhir}}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                            <h5 class="mb-2">Program yang diambil</h5>
                            <p class="mb-0">{{$proker->namaprogram}}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                            <h5 class="mb-2">Alamat Rumah</h5>
                            <p class="mb-0">{{$proker->alamat_rumah}}</p>
                        </div>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                        <h5 class="mb-2">Fotokopi Akte</h5>
                        @empty($proker->fotoakte)
                            <p>No PDF</p>
                        @else
                            <a href="{{ url('admin/akte') }}/{{ $proker->fotoakte }}" target="_blank"> <i class="fas fa-file-pdf"></i> Download PDF</a>
                        @endempty
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="border p-3 rounded">
                        <h5 class="mb-2">Fotokopi Ktp</h5>
                        @empty($proker->fotoktp)
                            <p>No PDF</p>
                        @else
                            <a href="{{ url('admin/ktp') }}/{{ $proker->fotoktp }}" target="_blank"> <i class="fas fa-file-pdf"></i> Download PDF</a>
                        @endempty
                        </div>
                    </div>
                    


                    </div>

        </div>
    </div>
    
   
             

@endforeach  
@endsection