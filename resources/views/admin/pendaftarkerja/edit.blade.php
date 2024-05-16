@extends('admin.layout.appadmin')
@section('content')



@if (Auth::user()->role == 'siswa')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Halaman Edit Data</h5>
            <p class="card-text">Penting!</p>
            <hr>    
            <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Cek kembali data yang sudah di input</p>
        </div>
    </div>    
    <hr>
    @endif


@foreach ($pendaftar_kerja as $proker)

    <div class="card"> 
        <div class="card-content">
            <div class="card-body">

                    <form class="form" method="POST" action="{{url('pendaftarkerja/update/'.$proker->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            @if (Auth::user()->role == 'admin')
                            <h4 class="card-title">Edit Pendaftar Kerja</h4>
                            @endif

                            @if (Auth::user()->role == 'siswa')
                            <h4 class="card-title"> <i class="fas fa-user fa-1x" ></i> Edit Data Siswa</h4>
                            @endif
                        </div>
                        
                             <div class="card-body">
                            @if (Auth::user()->role == 'admin')
                                <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>
                            @endif   
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

                                        @if (Auth::user()->role == 'admin')
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="status">Status verifikasi data</label>
                                                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                                    <option value="unverified" {{ $proker->status == 'unverified' ? 'selected' : '' }}>Unverified</option>
                                                    <option value="verified" {{ $proker->status == 'verified' ? 'selected' : '' }}>Verified</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        @elseif (Auth::user()->role == 'siswa')
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="status">Status verifikasi data</label>
                                                    <input type="text" id="status" name="status" class="form-control" value="{{ $proker->status }}" readonly>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="foto">Foto 3*4 <code> *Pastikan foto sudah benar </code></label>

                                                <input type="file" value="{{ old('foto') }}" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                                                @if(!empty($proker->foto))                       
                                                <img src="{{url('admin/img')}}/{{$proker->foto}}" alt="" class="mt-3 p-3" width="150px" height="150px">
                                                @endif   

                                                @error('foto')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                            </div> 

                                        </div>


                                        <div class="col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="kk">Kartu Keluarga (PDF) <code>*Pastikan file sudah benar</code></label>
                                                <input type="file" name="kk" id="kk" class="form-control @error('kk') is-invalid @enderror mb-3">

                                                @if(!empty($proker->fotokk))                       
                                                <a href="{{ url('admin/pdfkartukeluarga') }}/{{ $proker->fotokk }}" target="_blank"> <i class="fas fa-file-pdf"></i> Download PDF</a>
                                                @else
                                                    File PDF belum ada
                                                @endif

                                                @error('kk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="akte">Akte Kelahiran (PDF) <code>*Pastikan file sudah benar</code></label>
                                                <input type="file" name="akte" id="akte" class="form-control @error('akte') is-invalid @enderror mb-3">
                                                
                                                @if(!empty($proker->fotoakte))                       
                                                <a href="{{ url('admin/akte') }}/{{ $proker->fotoakte }}" target="_blank"> <i class="fas fa-file-pdf"></i> Download PDF</a>
                                                @else
                                                    File PDF belum ada
                                                @endif

                                                @error('akte')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="ijazah">Fotokopi Ijazah (PDF) <code>*Pastikan file sudah benar</code></label>
                                                <input type="file" name="ijazah" id="ijazah" class="form-control @error('ijazah') is-invalid @enderror mb-3">
                                                
                                                @if(!empty($proker->fotoijazah))                       
                                                <a href="{{ url('admin/ijazah') }}/{{ $proker->fotoijazah }}" target="_blank"> <i class="fas fa-file-pdf"></i> Download PDF</a>
                                                @else
                                                    File PDF belum ada
                                                @endif

                                                @error('ijazah')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="ktp">Fotokopi Ktp (PDF) <code>*Pastikan file sudah benar</code></label>
                                                <input type="file" name="ktp" id="ktp" class="form-control @error('ktp') is-invalid @enderror mb-3">
                                                
                                                @if(!empty($proker->fotoktp))                       
                                                <a href="{{ url('admin/ktp') }}/{{ $proker->fotoktp }}" target="_blank"> <i class="fas fa-file-pdf"></i> Download PDF</a>
                                                @else
                                                    File PDF belum ada
                                                @endif

                                                @error('ktp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
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