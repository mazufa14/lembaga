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

                    <form class="form" method="POST" action="{{url('proseskerja/store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Tambah Pendaftar Kerja</h4>
                        </div>
                        
                             <div class="card-body">
                                <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>
                                   
                                    <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Siswa</label>
                                            <select id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror">
                                                <option value="" disabled {{ old('nama') == null ? 'selected' : '' }}>Pilih Siswa</option>
                                                @foreach ($pendaftar_kerja as $p)
                                                    <option value="{{ $p->id }}" {{ old('nama') == $p->id ? 'selected' : '' }}>{{ $p->pendaftar_pekerja }}</option>
                                                @endforeach
                                            </select>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Siswa</label>
                                            <select id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Siswa</option>   
                                                @foreach ($pendaftar_kerja as $p)                                                       
                                                <option value="{{$p->id}}">{{$p->pendaftar_pekerja}}</option>
                                                @endforeach
                                            </select>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div> -->

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="user_id">Akun Siswa</label>
                                            <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                                <option value="" disabled {{ old('user_id') == null ? 'selected' : '' }}>Pilih Akun</option>
                                                @foreach ($user as $p)                                                       
                                                    <option value="{{ $p->id }}" {{ old('user_id') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-6 col-12">
                                            <div class="form-group">
                                            <label for="user_id">Akun Siswa</label>
                                            <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Akun</option>   
                                                @foreach ($user as $p)                                                       
                                                <option value="{{$p->id}}"  >{{$p->name}}</option>
                                                @endforeach
                                            </select>
                                                @error('user_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div> -->


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="program_kerja">Program yang dipilih sebelumnya</label>
                                                <select id="program_kerja" name="program_kerja" class="form-control @error('program_kerja') is-invalid @enderror">
                                                    <option value="" disabled {{ old('program_kerja') == null ? 'selected' : '' }}>Pilih Program</option>
                                                    @foreach ($program_kerja as $p)
                                                        <option value="{{ $p->id }}" {{ old('program_kerja') == $p->id ? 'selected' : '' }}>{{ $p->nama_program }}</option>
                                                    @endforeach
                                                </select>
                                                @error('program_kerja')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="program_kerja">Program yang dipilih sebelumnya</label>
                                                <select id="program_kerja" name="program_kerja" class="form-control @error('program_kerja') is-invalid @enderror">
                                                    <option value="" disabled selected>Pilih Program</option>   
                                                    @foreach ($program_kerja as $p)                                                       
                                                    <option value="{{$p->id}}">{{$p->nama_program}}</option>
                                                    @endforeach
                                                </select>
                                                    @error('program_kerja')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div> -->

                                       
                                    
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kebahasaan">Sertikasi Kebahasaan <code>*JLPT *JFT *MIN N4</code></label>
                                                <select id="kebahasaan" name="kebahasaan" class="form-control @error('kebahasaan') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Sertifikasi</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                    <option value="Belum">Belum</option>
                                                    <!-- <option value="Belum">Tidak diperlukan</option> -->
                                                </select>
                                                @error('kebahasaan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan">Sertikasi Pekerjaan <code>*SSW</code> </label>
                                                <select id="pekerjaan" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Sertifikasi</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                    <option value="Belum">Belum</option>
                                                    <!-- <option value="Belum">Tidak diperlukan</option> -->
                                                </select>
                                                @error('pekerjaan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Deskripsi Tambahan <code>*KEBUTUHAN DOKUMEN</code></label>
                                                <textarea name="deskripsi" rows="5" id="first-name-column" class="form-control @error('deskripsi') is-invalid @enderror"></textarea>
                                                @error('deskripsi')
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

