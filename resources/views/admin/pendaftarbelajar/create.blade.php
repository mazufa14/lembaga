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

                    <form class="form" method="POST" action="{{url('pendaftarbelajar/store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Tambah Pendaftar Pelajar</h4>
                        </div>
                        
                             <div class="card-body">
                                <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>
                                   
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Nama Pendaftar </label>
                                            <input type="text" name="nama" id="first-name-column" class="form-control @error('nama') is-invalid @enderror">
                                            @error('nama')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Tempat Lahir </label>
                                            <input type="text" name="tempat_lahir" id="first-name-column" class="form-control @error('tempat_lahir') is-invalid @enderror">
                                            @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Tanggal Lahir </label>
                                            <input type="date" name="tanggal_lahir" id="first-name-column" class="form-control @error('tanggal_lahir') is-invalid @enderror">

                                            @error('tanggal_lahir')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin </label>
                                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Usia </label>
                                            <input type="number" name="usia" id="first-name-column" class="form-control @error('usia') is-invalid @enderror">
                                            @error('usia')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">No hp</label>
                                            <input type="number" name="no_hp" id="first-name-column" class="form-control @error('no_hp') is-invalid @enderror">

                                            @error('no_hp')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Alamat Email <code> *Pastikan alamat email sudah benar </code></label>
                                            <input type="email" name="alamat_email" id="first-name-column" class="form-control @error('alamat_email') is-invalid @enderror">

                                            @error('alamat_email')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Motivasi </label>
                                                <textarea name="motivasi" rows="4" id="first-name-column" class="form-control @error('motivasi') is-invalid @enderror"></textarea>
                                                
                                                @error('motivasi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="target_program">Target Program</label>
                                                <select id="target_program" name="target_program" class="form-control @error('target_program') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Target Program</option>
                                                    <option value="n1">N1</option>
                                                    <option value="n2">N2</option>
                                                    <option value="n3">N3</option>
                                                    <option value="n4">N4</option>
                                                    <option value="n5">N5</option>
                                                </select>
                                                @error('target_program')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="program_belajar">Program Belajar</label>
                                                <select id="program_belajar" name="program_belajar" class="form-control @error('program_belajar') is-invalid @enderror">
                                                 <option value="" disabled selected>Pilih Program belajar</option>   
                                                 @foreach ($program_belajar as $p)                                                       
                                                 <option value="{{$p->id}}">{{$p->nama_program_belajar}}</option>
                                                 @endforeach
                                                </select>
                                                @error('program_belajar')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="foto">Foto 4*6 <code> *Pastikan foto sudah benar </code></label>
                                            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                                            @error('foto')
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

