@extends('admin.layout.appadmin')
@section('content')


    @if (Auth::user()->role == 'siswa')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Halaman Pendaftaran Siswa</h5>
            <p class="card-text">Penting!</p>
            <hr>    
            <p class="card-text ">  <i class="fas fa-minus-circle" style="color: #FFD43B;"> </i> Pastikan data yang input valid </p>
            <p class="card-text ">  <i class="fas fa-minus-circle" style="color: #FFD43B;"> </i> Siswa hanya dapat melakukan 1 kali pendaftaran </p>
            <p class="card-text ">  <i class="fas fa-minus-circle" style="color: #FFD43B;"> </i> Admin akan segera verifikasi data siswa yang masuk  </p>
        </div>
    </div>    
    <hr>
    @endif

    <!-- <form class="p-3 card border" method="POST" action="{{url('programkerja/store')}}" enctype="multipart/form-data">
    @csrf
    
    <div class="card-header">
        <h4 class="card-title">Tambah Pendaftar Kerja</h4>
    </div>
    
    <div class="card-body">
        <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>

    </form> -->

    <div class="card"> 
        <div class="card-content">
            <div class="card-body">

                    <form class="form" method="POST" action="{{url('pendaftarkerja/store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            @if (Auth::user()->role == 'admin')
                            <h4 class="card-title">Tambah Pendaftar Kerja</h4>
                            @endif

                            @if (Auth::user()->role == 'siswa')
                            <h4 class="card-title"> <i class="fas fa-user fa-1x" ></i> Pendaftaran Siswa</h4>
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
                                            <input type="text" value="{{ old('nama')}}" name="nama" id="first-name-column" class="form-control @error('nama') is-invalid @enderror">
                                            @error('nama')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="user_id">Akun Siswa</label>
                                                <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                                    <option value="" disabled {{ old('user_id') == null ? 'selected' : '' }}>Pilih Akun</option>
                                                    @foreach ($users as $p)                                                       
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

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Tempat Lahir </label>
                                            <input type="text" value="{{ old('tempat_lahir')}}" name="tempat_lahir" id="first-name-column" class="form-control @error('tempat_lahir') is-invalid @enderror">
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
                                            <input type="date" value="{{ old('tanggal_lahir')}}" name="tanggal_lahir" id="first-name-column" class="form-control @error('tanggal_lahir') is-invalid @enderror">
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
                                            <input type="number" value="{{ old('berat_badan')}}" name="berat_badan" id="first-name-column" class="form-control @error('berat_badan') is-invalid @enderror">
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
                                                <label for="nikah">Status Pernikahan </label>
                                                <select id="nikah"  value="{{ old('nikah')}}" name="nikah" class="form-control @error('nikah') is-invalid @enderror">
                                                <option  disabled selected>Pilih Status Pernikahan</option>
                                                    <option value="Menikah">Menikah</option>
                                                    <option value="Belum Menikah">Belum Menikah</option>
                                                    <option value="Single Father">Single Father</option>
                                                    <option value="Single Mother">Single Mother</option>
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
                                            <input type="email" value="{{ old('alamat_email')}}" name="alamat_email" id="first-name-column" class="form-control @error('alamat_email') is-invalid @enderror">
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
                                            <input type="number" value="{{ old('no_hp')}}" name="no_hp" id="first-name-column" class="form-control @error('no_hp') is-invalid @enderror">
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
                                            <input type="text" value="{{ old('alamat_rumah')}}" name="alamat_rumah" id="first-name-column" class="form-control @error('alamat_rumah') is-invalid @enderror">
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
                                                <textarea name="sakit" value="{{ old('sakit')}}" rows="4" id="first-name-column" class="form-control @error('sakit') is-invalid @enderror"></textarea>
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
                                                <select id="pendidikan" value="{{ old('pendidikan')}}" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                                                    <option value="SMA">SMA/Sederajat</option>
                                                    <option value="SMK">SMK/Sederajat</option>
                                                    <option value="D3">D3</option>
                                                    <option value="S1">S1</option>
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
                                                <select id="programkerja" value="{{ old('programkerja')}}" name="programkerja" class="form-control @error('programkerja') is-invalid @enderror">
                                                 <option value="" disabled selected>Pilih Program Kerja</option>   
                                                 @foreach ($program_kerja as $p)                                                       
                                                 <option value="{{$p->id}}">{{$p->nama_program}}</option>
                                                 @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <hr>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="foto">Foto 3*4 </label>
                                            <input type="file" value="{{ old('foto')}}" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                                            @error('foto')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kk">Fotokopi Kartu Keluarga *PDF </label>
                                            <input type="file" value="{{ old('kk')}}" name="kk" id="kk" class="form-control @error('kk') is-invalid @enderror">
                                            @error('kk')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="akte">Fotokopi Akte Kelahiran *PDF </label>
                                            <input type="file" value="{{ old('akte')}}" name="akte" id="akte" class="form-control @error('akte') is-invalid @enderror">
                                            @error('akte')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="ijazah">Fotokopi Ijazah *PDF </label>
                                            <input type="file" value="{{ old('ijazah')}}" name="ijazah" id="ijazah" class="form-control @error('ijazah') is-invalid @enderror">
                                            @error('ijazah')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="ktp">Fotokopi ktp *PDF</label>
                                            <input type="file" value="{{ old('ktp')}}" name="ktp" id="ktp" class="form-control @error('ktp') is-invalid @enderror">
                                            @error('ktp')
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



<!-- <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form">
                            <div class="card-header">
                            <h4 class="card-title">Tambah Pendaftar Kerja</h4>
                        </div>
                        
                        <div class="card-body">
                            <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">First Name</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="First Name"
                                                name="fname-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Last Name</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Last Name"
                                                name="lname-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">City</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="City" name="city-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Country</label>
                                            <input type="text" id="country-floating" class="form-control" name="country-floating"
                                                placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Company</label>
                                            <input type="text" id="company-column" class="form-control" name="company-column"
                                                placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Email</label>
                                            <input type="email" id="email-id-column" class="form-control" name="email-id-column"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class='form-check'>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox5" class='form-check-input' checked>
                                                <label for="checkbox5">Remember Me</label>
                                            </div>
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
            </div>
        </div>
</section> -->
