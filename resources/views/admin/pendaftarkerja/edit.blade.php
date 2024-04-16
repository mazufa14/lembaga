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

@foreach ($pendaftar_kerja as $proker)

    <div class="card"> 
        <div class="card-content">
            <div class="card-body">

                    <form class="form" method="POST" action="{{url('pendaftarkerja/update/'.$proker->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Edit Pendaftar Kerja</h4>
                        </div>
                        
                             <div class="card-body">
                                <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>
                                   
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Nama Pendaftar </label>
                                            <input type="text" value="{{$proker->pendaftar_pekerja}}" name="nama" id="first-name-column" class="form-control @error('nama') is-invalid @enderror">
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
                                            <input type="text" value="{{$proker->tempat_lahir}}" name="tempat_lahir" id="first-name-column" class="form-control @error('tempat_lahir') is-invalid @enderror">
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
                                            <input type="date" value="{{$proker->tanggal_lahir}}" name="tanggal_lahir" id="first-name-column" class="form-control @error('tanggal_lahir') is-invalid @enderror">
                                            @error('tanggal_lahir')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Berat Badan <code> *kg </code> </label>
                                            <input type="number" value="{{$proker->berat_badan}}" name="berat_badan" id="first-name-column" class="form-control @error('berat_badan') is-invalid @enderror">
                                            @error('berat_badan')
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
                                                    <option value="" disabled>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki" {{ $proker->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="Perempuan" {{ $proker->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                                                <label for="nikah">Status Pernikahan </label>
                                                <select id="nikah" name="nikah" class="form-control @error('nikah') is-invalid @enderror">
                                                    <option value="" disabled>Pilih Status Pernikahan</option>
                                                    <option value="Menikah" {{ $proker->nikah == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                                    <option value="Belum Menikah" {{ $proker->nikah == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                                    <option value="Single Father" {{ $proker->nikah == 'Single Father' ? 'selected' : '' }}>Single Father</option>
                                                    <option value="Single Mother" {{ $proker->nikah == 'Single Mother' ? 'selected' : '' }}>Single Mother</option>
                                                </select>
                                                @error('nikah')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Alamat Email <code> *Pastikan alamat email sudah benar </code></label>
                                            <input type="email" value="{{$proker->alamat_email}}" name="alamat_email" id="first-name-column" class="form-control @error('alamat_email') is-invalid @enderror">
                                            @error('alamat_email')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">No hp <code> *Pastikan no telepon sudah benar </code></label>
                                            <input type="number" value="{{$proker->no_hp}}" name="no_hp" id="first-name-column" class="form-control @error('no_hp') is-invalid @enderror">
                                            @error('no_hp')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Alamat Rumah</label>
                                            <input type="text" value="{{$proker->alamat_rumah}}" name="alamat_rumah" id="first-name-column" class="form-control @error('alamat_rumah') is-invalid @enderror">
                                            @error('alamat_rumah')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Riwayat Penyakit <code> *Jika tidak ada cukup dengan (-) </code></label>
                                                <textarea name="sakit" rows="2" id="first-name-column" class="form-control @error('sakit') is-invalid @enderror">{{$proker->sakit_berat}}</textarea>
                                                @error('sakit')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pendidikan">Pendidikan Terakhir</label>
                                                
                                                <select id="pendidikan" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror">
                                                    <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                                                    <option value="SMA" {{ $proker->pendidikan_terakhir == 'SMA' ? 'selected' : '' }}>SMA/Sederajat</option>
                                                    <option value="SMK" {{ $proker->pendidikan_terakhir == 'SMK' ? 'selected' : '' }}>SMK/Sederajat</option>
                                                    <option value="D3" {{ $proker->pendidikan_terakhir == 'D3' ? 'selected' : '' }}>D3</option>
                                                    <option value="S1" {{ $proker->pendidikan_terakhir == 'S1' ? 'selected' : '' }}>S1</option>
                                                </select>

                                                @error('pendidikan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="programkerja">Program Kerja</label>
                                                <select id="programkerja" name="programkerja" class="form-control @error('programkerja') is-invalid @enderror">
                                                 <option value="" disabled selected>Pilih Program Kerja</option>   

                                                 @foreach ($program_kerja as $p)
                                                 @php $sel = ($p->id == $proker->program) ? 'selected' : ''; @endphp                                                     
                                                 <option value="{{$p->id}}" {{$sel}}>{{$p->nama_program}}</option>
                                                 @endforeach

                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                            <label for="foto">Foto 3*4 <code> *Pastikan foto sudah benar </code></label>

                                            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                                             @if(!empty($proker->foto))                       
                                             <img src="{{url('admin/img')}}/{{$proker->foto}}" alt="" class="mt-3 border p-3">
                                            @endif   


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
@endforeach

@endsection