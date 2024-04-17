@extends('admin.layout.appadmin')
@section('content')

<!-- @if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div class="d-flex justify-content-between">
        <strong style="margin-bottom: 0.5em;">Warning!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: white; outline: none; border: none; background: none; font-size: 2.5rem;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    There were some problems with your input.
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif -->

<div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Program belajar</h3>
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

<form class="p-3 card border" method="POST" action="{{url('programbelajar/store')}}" enctype="multipart/form-data">
    @csrf
    
    <div class="card-header">
        <h4 class="card-title">Tambah Program belajar</h4>
    </div>
    
    <div class="card-body">
        <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>

        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Program Belajar</label> 
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-card"></i>
                        </div>
                    </div>
                    <input id="text" name="proker" type="text" class="form-control @error('proker') is-invalid @enderror" placeholder="Program Belajar">
                    @error('proker')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
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




@endsection