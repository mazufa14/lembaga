@extends('admin.layout.appadmin')
@section('content')




<!-- DASHBOARD ADMIN -->
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
        <h5 class="card-title"> <i class="fas fa-check-circle fa-lg" style="color: #50ff05;"></i> Selamat Datang , {{Auth::user()->role}} !</h5>
        <p class="card-text">Ini adalah area kelola data admin lembaga hikari gakkai</p>

         <hr>
        <h5>Akun </h5>
        <hr>
         <div class="column" style="display: flex;">
            <p class="card-text" style="margin-right: 10px;"> <i class="fas fa-user"></i> Username :</p>
            <p class="card-text">@if(empty(Auth::user()->name)) {{ '' }} @else {{ Auth::user()->name }} @endif</p>
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

<!-- DASHBOARD PENGUJI -->
@if (Auth::user()->role == 'penguji')
<div class="card">
    <div class="card-body">
        <h5 class="card-title"> <i class="fas fa-check-circle fa-lg" style="color: #50ff05;"></i> Selamat Datang , {{Auth::user()->role}} !</h5>
        <p class="card-text">Ini adalah area kelola data admin lembaga hikari gakkai</p>

         <hr>
        <h5>Akun </h5>
        <hr>
         <div class="column" style="display: flex;">
            <p class="card-text" style="margin-right: 10px;"> <i class="fas fa-user"></i> Username :</p>
            <p class="card-text">@if(empty(Auth::user()->name)) {{ '' }} @else {{ Auth::user()->name }} @endif</p>
         </div>
        
         <!-- <div class="column" style="display: flex;">
            <p class="card-text" style="margin-right: 10px;"> <i class="fas fa-envelope"></i> Email Akun :</p>
            <p class="card-text">{{Auth::user()->email}}</p>
         </div> -->

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



<!-- DASHBOARD SISWA -->
@if (Auth::user()->role == 'siswa')


<style>
    .card-title .fas {
        margin-right: 0.5em; /* Sesuaikan jarak yang Anda inginkan */
    }
</style>


<div class="card">
    <div class="card-body">
        <h5 class="card-title">  <i class="fas fa-check-circle fa-lg" style="color: #50ff05;"></i> Selamat Datang , {{Auth::user()->role}} !</h5>
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
            <p class="card-text" style="margin-right: 10px;"> <i class="fas fa-clock"></i> Waktu login :</p>

            <?php
               date_default_timezone_set('Asia/Jakarta'); // Set timezone ke Waktu Indonesia Barat (WIB)
               $now = new DateTime();
            ?>
            <p class="card-text"> <?php echo $now->format('l, d F Y H:i:s'); ?> WIB</p>

         </div>

      </div>
</div>


<!-- ALUR PENDAFTARAB -->
<div class="card ">
  <div class="card-body">
    <h5 class="card-title">
      <i class="fas fa-check-circle fa-lg" style="color: #50ff05;"></i> Alur Pendaftaran
    </h5>
    <hr>
    <ol class="list-group list-group-numbered">
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
          <div class="fw-bold">Isi Data Diri</div>
          Lengkapi formulir pendaftaran dengan informasi pribadi Anda.
        </div>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
          <div class="fw-bold">Tes Tulis</div>
          Ikuti tes tulis yang dijadwalkan untuk penilaian.
        </div>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
          <div class="fw-bold">Pembayaran Awal / Daftar Ulang</div>
          Selesaikan pembayaran awal dan lakukan daftar ulang .
        </div>
      </li>
    </ol>
  </div>
</div>


<div class="row">
   <div class="col-md-4">
         <div class="card widget-todo">
            <div class="card-header border-bottom mb-3 d-flex justify-content-between align-items-center">
               <h5 class="card-title d-flex">
               <i class="fas fa-check-circle"></i> Persyaratan Daftar Ulang 
               </h5>
            </div>
            <div class="card-body">
               <p> <code>*</code> Dokumen yang wajib dibawa saat daftar ulang</p>
            </div>
            
            
            <div class="card-body ">
               <table class='table table-borderless'>
                     <tr>
                        <td class='col-3'><i class="far fa-check-square" style="color: #0a76db;"></i></td>
                        <td class='col-3'>Fotokopi Ijazah</td>
                        <td class='col-3'>.</td>
                        
                     </tr>

                     <tr>
                        <td class='col-3'><i class="far fa-check-square" style="color: #0a76db;"></i></td>
                        <td class='col-3'>Fotokopi Akte</td>
                     </tr>

                     <tr>
                        <td class='col-3'><i class="far fa-check-square" style="color: #0a76db;"></i></td>
                        <td class='col-3'>Fotokopi KK</td>
                     </tr>

                     <tr>
                        <td class='col-3'><i class="far fa-check-square" style="color: #0a76db;"></i></td>
                        <td class='col-3'>Fotokopi Ktp </td>
                     </tr>       
               </table>
            </div>
         </div>
   </div>

  

   <div class="col-md-4">
      <div class="card ">
         <div class="card-header">
               <h4>  <i class="fas fa-check-circle"></i> Seleksi Berkas</h4>
               <hr>
         </div>
         <div class="card-body">
               @if($berkas === 'verified')
                  <h5 class="text-center">LOLOS SELEKSI BERKAS</h5>
                  <div class="text-center border-radius"> <img src="{{asset('admin/lulus/checklist.png')}}" class="card-img rounded-circle img-thumbnail mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="Checklist"></div>
                  <div class="text-center mb-5">
                     <h6 class='text-green'> Selamat anda lolos seleksi berkas,Setelah lolos berkas, siswa diharapkan melakukan tes Tulis pada tanggal dibawah ini</h6>
                  </div>
                  <div class="card p-4">
                     <h5 class='text-danger text-center'>Lakukan Tes Tulis Pada Tanggal</h5>
                     <h5 class='text-danger text-center' id="tanggal"> </h5>                
                     <script>
                        // Mendapatkan tanggal saat ini
                        var currentDate = new Date();

                        // Menambahkan 3 hari ke tanggal saat ini
                        currentDate.setDate(currentDate.getDate() + 3);

                        // Menampilkan tanggal dalam format yang diinginkan
                        document.getElementById("tanggal").innerHTML = currentDate.toLocaleDateString();
                        </script>
                  </div>

               @else
                  <h5 class="text-center">PROSES PENILAIAN</h5>
                  <div class="text-center "> <img src="{{asset('admin/lulus/loading.png')}}" class="card-img  mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="Proses"></div>
                  <div class="text-center mb-5">
                     <h6 class='text-green'>Silahkan lakukan isi data diri anda dan lengkapi berkas-berkas</h6>
                  </div>
               @endif
         </div>
      </div>
   </div>

   <div class="col-md-4">
      <div class="card ">
         <div class="card-header">
               <h4>  <i class="fas fa-check-circle"></i>  Tes Tulis / Daftar Ulang</h4>
               <hr>
         </div>
         <div class="card-body">
               @if($akademik === 'Lulus')
                  <h5 class="text-center">ANDA LOLOS </h5>
                  <div class="text-center border-radius"> <img src="{{asset('admin/lulus/checklist.png')}}" class="card-img rounded-circle img-thumbnail mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="Checklist"></div>
                  <div class="text-center mb-5">
                     <h6 class='text-green'>Selamat anda lolos seleksi di lembaga hikkari gakkai sebagai siswa, Segera kumpulkan berkas daftar ulang</h6>
                  </div>
               @else
                  <h5 class="text-center">PROSES PENILAIAN </h5>
                  <div class="text-center "> <img src="{{asset('admin/lulus/loading.png')}}" class="card-img  mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="Proses"></div>
                  <div class="text-center mb-5">
                     <h6 class='text-green'>Anda Belum Melakukan tes Tulis</h6>
                  </div>
               @endif
         </div>
      </div>
   </div>



</div>







@endif
@endsection