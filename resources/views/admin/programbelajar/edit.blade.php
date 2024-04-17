@extends('admin.layout.appadmin')
@section('content')


@foreach ($program_belajar as $proker)

<div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Program Belajar</h3>
                <p class="text-subtitle text-muted">Admin memasukkan data program kerja pada lembaga <a href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p>
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

<form class="p-3 card border" method="POST" action="{{url('programbelajar/update/'.$proker->id)}}" enctype="multipart/form-data">
    @csrf
    
    <div class="card-header">
        <h4 class="card-title">Edit Program Belajar</h4>
    </div>
    
    <div class="card-body">
        <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>

        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Program Kerja</label> 
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-card"></i>
                        </div>
                    </div>
                    <input id="text" name="proker" type="text" class="form-control" value="{{$proker->nama_program_belajar}}">
                </div>
            </div>
        </div> 

        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>


@endforeach
@endsection