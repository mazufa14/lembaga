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

@foreach ($pendaftar_belajar as $proker)
<div class="card">
    <div class="card-content">
        <div class="card-body">
      
            <form class="form" method="POST" action="{{url('pendaftarbelajar/update/'.$proker->id)}}" enctype="multipart/form-data">
                @csrf

                <div class="card-header">
                    <h4 class="card-title">Edit Pendaftar Pelajar</h4>
                </div>

                <div class="card-body">
                    <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <!-- Input Nama -->
                            <div class="form-group">
                                <label for="first-name-column">Nama Pendaftar </label>
                                <input type="text" value="{{$proker->pendaftar_belajar}}" name="nama" id="first-name-column" class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                                @enderror
                            </div>    
                        </div>

                        <div class="col-md-6 col-12">
                            <!-- Input Tempat Lahir -->
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
                            <!-- Input Target Program -->
                            <div class="form-group">
                                <label for="target_program">Target Program</label>
                                <select id="target_program" name="target_program" class="form-control @error('target_program') is-invalid @enderror">
                                <option value="" disabled selected>Pilih Target Program</option>
                                    <option value="n1" {{ $proker->tingkat_belajar == 'n1' ? 'selected' : '' }}>n1</option>
                                    <option value="n2" {{ $proker->tingkat_belajar == 'n2' ? 'selected' : '' }}>n2</option>
                                    <option value="n3" {{ $proker->tingkat_belajar == 'n3' ? 'selected' : '' }}>n3</option>
                                    <option value="n4" {{ $proker->tingkat_belajar == 'n4' ? 'selected' : '' }}>n4</option>
                                    <option value="n5" {{ $proker->tingkat_belajar == 'n5' ? 'selected' : '' }}>n5</option>
                                </select>
                                @error('target_program')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <!-- Input Tanggal Lahir -->
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
                            <!-- Input Jenis Kelamin -->
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
                                <label for="first-name-column">Usia </label>
                                <input type="number" value="{{$proker->usia}}" name="usia" id="first-name-column" class="form-control @error('usia') is-invalid @enderror">
                                @error('usia')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <!-- Input Nomor HP -->
                            <div class="form-group">
                                <label for="first-name-column">No hp</label>
                                <input type="number" value="{{$proker->no_hp}}" name="no_hp" id="first-name-column" class="form-control @error('no_hp') is-invalid @enderror">

                                @error('no_hp')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <!-- Input Alamat Email -->
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
                            <!-- Input Motivasi -->
                            <div class="form-group">
                                <label for="first-name-column">Motivasi </label>
                                <textarea name="motivasi" rows="4" id="first-name-column" class="form-control @error('motivasi') is-invalid @enderror">{{$proker->motivasi}}</textarea>
                                
                                @error('motivasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12 ">
                            <!-- Input Program Belajar -->
                            <div class="form-group">
                                <label for="program_belajar">Program Belajar</label>
                                <select id="program_belajar" name="program_belajar" class="form-control @error('program_belajar') is-invalid @enderror">
                                <option value="" disabled selected>Pilih Program belajar</option> 

                                @foreach ($program_belajar as $p) 
                                @php $sel = ($p->id == $proker->program_belajar) ? 'selected' : ''; @endphp
                                <option value="{{$p->id}}" {{$sel}}>{{$p->nama_program_belajar}}</option>
                                @endforeach

                            </div>
                        </div>

                        <div class="col-md-6 col-12 mb-3">
                           
                                <div class="form-group">
                                    <label for="foto">Foto 3*4 <code> *Pastikan foto sudah benar </code></label>

                                    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                                    @if(!empty($proker->foto))                       
                                    <img src="{{url('admin/fotosiswa')}}/{{$proker->foto}}" alt="" class="mt-3 border p-3">
                                    @endif   


                                    @error('foto')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                        </div>
                        
                    </div>

                    <div class="col-12 ">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection