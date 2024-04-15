@extends('admin.layout.appadmin')
@section('content')


@foreach ($pendaftar_kerja as $proker)

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

                <div class="justify-content-center text-center">
                        @empty($proker->foto)
                        <img class="card-img p-2 border" src="{{ url('admin/img/nophoto.png') }}" alt="No Photo">
                        @else
                        <img class="card-img p-2 border" src="{{ url('admin/img') }}/{{ $proker->foto }}" alt="{{ $proker->pendaftar_pekerja }}" style="width: 200px; height: 200px ; object-fit: contain;">
                        @endempty
                    </div>
                </div>
            
            <div class="card-body">
            <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>
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
    </div>



@endforeach  



@endsection