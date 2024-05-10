@extends('admin.layout.appadmin')
@section('content')

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

    
    <div class="card"> 
        <div class="card-content">
            <div class="card-body">

                    <form class="form" method="POST" action="{{url('akun/store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Tambah Akun Siswa</h4>
                        </div>
                        
                             <div class="card-body">
                                <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>
                                   
                                    <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Username Akun </label>
                                        <input type="text" name="username" value="{{ old('username')}}" id="first-name-column" class="form-control @error('username') is-invalid @enderror">
                                        @error('username')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Password </label>
                                        <input type="password" name="password" id="first-name-column" class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="role">Role Akun </label>
                                                <select id="role" name="role" class="form-control @error('role') is-invalid @enderror">
                                                <!-- <option value="" disabled selected>Pilih Role Akun</option> -->
                                                    <option value="siswa">Siswa</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="penguji">Penguji</option>
                                                </select>
                                                @error('role')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                                                            
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                        </form>
            </div>
        </div>
    </div>
            
@endsection