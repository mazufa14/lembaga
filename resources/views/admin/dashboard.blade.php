@extends('admin.layout.appadmin')
@section('content')

@if (Auth::user()->role == 'admin')
<div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <a href="{{url('/pendaftarkerja')}}">
               <div class="card-body">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                 Total Pendaftar</div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendaftar_kerja }} Pendaftar</div>
                        </div>
                        <div class="col-auto">
                           <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                     </div>
               </div>
            </a>
         </div>
      </div>


      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <a href="{{url('/programkerja')}}">
               <div class="card-body">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                 Program Kerja</div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $program_kerja }} Program </div>
                        </div>
                        <div class="col-auto">
                           <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                     </div>
               </div>
            </a>
         </div>
      </div>


      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <a href="{{url('/proseskerja')}}">
               <div class="card-body">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                 Proses Kerja</div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $proses_kerja }} Proses Siswa </div>
                        </div>
                        <div class="col-auto">
                           <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                     </div>
               </div>
            </a>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <a href="{{url('/akun')}}">
               <div class="card-body">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                 Akun</div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $akun_siswa }} Akun Siswa </div>
                        </div>
                        <div class="col-auto">
                           <i class="fas fa-user-check fa-2x text-gray-300"></i>
                        </div>
                     </div>
               </div>
            </a>
         </div>
      </div>      
</div>



<div class="card">
    <div class="card-body">
        <h5 class="card-title"> <i class="fas fa-circle fa-lg" style="color: #50ff05;"></i> Selamat Datang , {{Auth::user()->role}} !</h5>
        <p class="card-text">Ini adalah area kelola data admin lembaga hikari gakkai</p>

         <hr>
        <h5>Akun </h5>
        <hr>
         <div class="column" style="display: flex;">
            <p class="card-text" style="margin-right: 10px;"> <i class="fas fa-user"></i> Username :</p>
            <p class="card-text">@if(empty(Auth::user()->name)) {{ '' }} @else {{ Auth::user()->name }} @endif</p>
         </div>
        
         <div class="column" style="display: flex;">
            <p class="card-text" style="margin-right: 10px;"> <i class="fas fa-envelope"></i> Email Akun :</p>
            <p class="card-text">{{Auth::user()->email}}</p>
         </div>

         <div class="column" style="display: flex;">
            <p class="card-text" style="margin-right: 10px;"> <i class="fas fa-clock"></i> Waktu login :</p>

            <?php
               date_default_timezone_set('Asia/Jakarta'); // Set timezone ke Waktu Indonesia Barat (WIB)
               $now = new DateTime();
            ?>
            <p class="card-text"> <?php echo $now->format('l, d F Y H:i:s'); ?> WIB</p>

         </div>
    </div>
</div>
@endif



@if (Auth::user()->role == 'siswa')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">  <i class="fas fa-circle fa-lg" style="color: #50ff05;"></i> Selamat Datang , {{Auth::user()->role}} !</h5>
        <p class="card-text"> Selamat datang di area data proses siswa lembaga hikari gakkai</p>
        <hr>
        <p class="card-text text-center">Di sini, Anda akan melihat semua proses, mulai dari pendaftaran dan seleksi awal pada lembaga,proses sertifikasi kebahasaan, seleksi pengguna, wawancara, pemeriksaan medis, penandatanganan kontrak, hingga persiapan keberangkatan.</p>
        <hr>

        <h5>Akun anda</h5>
         <div class="column" style="display: flex;">
            <p class="card-text" style="margin-right: 10px;"> <i class="fas fa-user"></i> Username :</p>
            <p class="card-text">@if(empty(Auth::user()->name)) {{ '' }} @else {{ Auth::user()->name }} @endif</p>
         </div>
        
         <div class="column" style="display: flex;">
            <p class="card-text" style="margin-right: 10px;"> <i class="fas fa-envelope"></i> Email Akun :</p>
            <p class="card-text">{{Auth::user()->email}}</p>
         </div>

         <div class="column" style="display: flex;">
            <p class="card-text" style="margin-right: 10px;"> <i class="fas fa-clock"></i> Waktu login :</p>

            <?php
               date_default_timezone_set('Asia/Jakarta'); // Set timezone ke Waktu Indonesia Barat (WIB)
               $now = new DateTime();
            ?>
            <p class="card-text"> <?php echo $now->format('l, d F Y H:i:s'); ?> WIB</p>

         </div>

      </div>
</div>
@endif




@endsection