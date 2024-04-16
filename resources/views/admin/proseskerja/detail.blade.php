@extends('admin.layout.appadmin')
@section('content')


@foreach ($proses_kerja as $proker)

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