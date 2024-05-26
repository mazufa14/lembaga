@extends('admin.layout.appadmin')
@section('content')


@if (Auth::user()->role == 'siswa')

<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Halaman Pembayaran Siswa</h5>
            <p class="card-text"> <i class="fas fa-exclamation"></i> Sesuaikan Pembayaran Dengan Program Yang Dipilih</p>
            <p class="card-text"> <i class="fas fa-money-check-alt"></i> No Rekening BANK (BNI): 1298544410 - A/N - Nur Khodijah</p>
            
        <hr>    
        <div class="row">
            <div class="col d-flex flex-column align-items-center">
                <h5 class="card-title">KELAS INTENSIF MAGANG/TOKUTEI GINOU</h5>
                <img src="{{ asset('depan/images/kelasintensifpay.jpg') }}" class="card-img" style="max-width: 400px; max-height: 400px;">
            </div>
            <div class="col d-flex flex-column align-items-center">
                <h5 class="card-title">KELAS KARYAWAN TOKUTEI GINOU</h5>
                <img src="{{ asset('depan/images/kelasregular2.jpg') }}" class="card-img" style="max-width: 400px; max-height: 400px;">
            </div>
        </div>
    </div>
</div>
  
    <hr>
    @endif


    <div class="card"> 
        <div class="card-content">
            <div class="card-body">

                    <form class="form" method="POST" action="{{url('pembayaran/store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            @if (Auth::user()->role == 'admin')
                            <h4 class="card-title">Tambah Pembayaran Siswa</h4>
                            @endif

                            @if (Auth::user()->role == 'siswa')
                            <h4 class="card-title"> <i class="fas fa-user fa-1x" ></i> Pembayaran</h4>
                            @endif
                        </div>
                        
                             <div class="card-body">
                                @if (Auth::user()->role == 'admin')
                                <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>
                                @endif 

                            <div class="row">
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
                                                <label for="foto">Bukti Pembayaran</label>
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
                                                <label for="first-name-column">Keterangan Pembayaran </label>
                                                <textarea readonly name="keterangan"  rows="3" id="first-name-column" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', 'Daftar Ulang') }}</textarea>
                                                @error('keterangan')
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
                                </div>
                        </form>
            </div>
        </div>
    </div>
            
@endsection




