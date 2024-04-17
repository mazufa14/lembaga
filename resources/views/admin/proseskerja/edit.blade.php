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

@foreach ($proses_kerja as $proker)

<div class="card"> 
    <div class="card-content">
        <div class="card-body">
       
        
                <form class="form" method="POST" action="{{url('proseskerja/update/'.$proker->id)}}" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="card-header">
                            <h4 class="card-title">Edit Proses Kerja</h4>
                        </div>
                
                            <div class="card-body">
                                <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <select id="nama" disabled  class="form-control @error('nama') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Nama Siswa</option>   

                                                @foreach ($pendaftar_kerja as $p)
                                                @php $sel = ($p->id == $proker->nama_pekerja) ? 'selected' : ''; @endphp                                                     
                                                <option value="{{$p->id}}" {{$sel}}>{{$p->pendaftar_pekerja}}</option>
                                                @endforeach

                                            </select>
                                        </div>




                                        <div class="form-group">
                                            <label for="programkerja">Program Kerja</label>
                                            <select id="programkerja" name="program_kerja" class="form-control @error('program_kerja') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Program Kerja</option>   

                                                @foreach ($program_kerja as $p)
                                                @php $sel = ($p->id == $proker->program_proses_kerja) ? 'selected' : ''; @endphp                                                     
                                                <option value="{{$p->id}}" {{$sel}}>{{$p->nama_program}}</option>
                                                @endforeach

                                            </select>
                                            @error('program_kerja')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="sertifikasi_kebahasaan">Sertifikasi Kebahasaan </label>
                                            <select id="sertifikasi_kebahasaan" name="sertifikasi_kebahasaan" class="form-control @error('sertifikasi_kebahasaan') is-invalid @enderror">
                                                <option value="" disabled>Pilih Jenis Kelamin</option>
                                                <option value="Sudah" {{ $proker->kebahasaan == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                                                <option value="Belum" {{ $proker->kebahasaan == 'Belum' ? 'selected' : '' }}>Belum</option>
                                                <option value="Tidak diperlukan" {{ $proker->kebahasaan == 'Tidak diperlukan' ? 'selected' : '' }}>Tidak diperlukan</option>
                                            </select>
                                            @error('sertifikasi_kebahasaan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="sertfikasi">Sertifikasi Pekerjaan </label>
                                            <select id="sertfikasi" name="sertifikasi_pekerjaan" class="form-control @error('sertifikasi') is-invalid @enderror">
                                                <option value="" disabled>Pilih Jenis Kelamin</option>
                                                <option value="Sudah" {{ $proker->sertifikasi == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                                                <option value="Belum" {{ $proker->sertifikasi == 'Belum' ? 'selected' : '' }}>Belum</option>
                                                <option value="Tidak diperlukan" {{ $proker->sertifikasi == 'Tidak diperlukan' ? 'selected' : '' }}>Tidak diperlukan</option>
                                            </select>
                                            @error('sertifikasi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="justify-content-center text-center mb-3">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" rows="5" id="deskripsi"  class="form-control @error('deskripsi') is-invalid @enderror">{{$proker->deskripsi}}</textarea>
                                    </div>
                                    @error('deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                </div>
                                
                                    <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                           </div>
                </form>
           
                    
        </div>
    </div>
</div>
@endforeach

@endsection