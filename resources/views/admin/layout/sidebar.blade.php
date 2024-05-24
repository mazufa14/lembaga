<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikkari Gakkai</title>
    
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/chartjs/Chart.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/hikkari.png')}}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- ALTER TABLE pendaftar_kerja ADD FOREIGN KEY (user_id) REFERENCES users(id); -->
<!-- diatas untuk membuat foreign key -->
    <style>
        .dataTables_filter {
            float: right;
        }

        .dataTables_info {
            margin-right: 1rem;
            width: 200px;

        }

        .dataTables_paginate {
        margin-bottom: 20px;
        }

        .dataTables_paginate a {
        margin: 0 2px;
        }

    </style>

    
    

    <!--  -->
    

</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <img src="{{asset('admin/assets/images/hikkari.png')}}" height="100" alt="" srcset="">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">

                 <!--  SIDEBAR SISWAS -->
                @if (Auth::user()->role == 'siswa')
                <li class='sidebar-title'>Data Siswa</li>

               
                <li class="sidebar-item ">
                    <a href="{{url('/dashboard')}}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>
                </li>



                <li class='sidebar-title'>Seleksi Awal</li>
                    <li class="sidebar-item  ">
                        <a href="{{url('/pendaftarkerja')}}" class='sidebar-link'>
                            <i data-feather="user-plus" width="20"></i> 
                            <span>1. Daftar & Seleksi Berkas</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="{{url('/akademik')}}" class='sidebar-link'>
                            <i data-feather="git-branch" width="20"></i> 
                            <span>2. Tes Potensi Akademik</span>
                        </a>
                    </li>

                <li class="sidebar-item  ">
                    <a href="{{url('/pembayaran')}}" class='sidebar-link'>
                        <i data-feather="dollar-sign" width="20"></i> 
                        <span>3. Pembayaran</span>
                    </a>
                </li>
                
              

                <li class='sidebar-title'>Seleksi Lembaga</li>

                <li class="sidebar-item  ">
                    <a href="{{url('/proseskerja')}}" class='sidebar-link'>
                        <i data-feather="check-circle" width="20"></i> 
                        <span>Proses Dokumen Siswa</span>
                    </a>
                </li>
                @endif


                

                <!--  SIDEBAR ADMIN -->
            
                @if (Auth::user()->role == 'admin')
               
                <li class='sidebar-title'>hikari chart</li>
                
                
                <li class="sidebar-item ">
                    <a href="{{url('/dashboard')}}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>
                </li>

               


                <li class='sidebar-title'>Data Lembaga</li>
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="briefcase" width="20"></i> 
                        <span>Data Lembaga</span>
                    </a>

                    <ul class="submenu ">
                        
                        <li class="sidebar-item ">
                            <a href="{{url('/pendaftarkerja')}}" class='sidebar-link'>
                                <i data-feather="user" width="20"></i> 
                                <span>Data Pendaftaran Awal </span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{url('/akademik')}}" class='sidebar-link'>
                                <i data-feather="git-branch" width="20"></i> 
                                <span>Tes Potensi Akademik</span>
                            </a>
                        </li>


                        <li class="sidebar-item  ">
                            <a href="{{url('/programkerja')}}" class='sidebar-link'>
                                <i data-feather="list" width="20"></i> 
                                <span>Program Kerja Lembaga</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{url('/proseskerja')}}" class='sidebar-link'>
                                <i data-feather="check-circle" width="20"></i> 
                                <span>Proses Dokumen Siswa</span>
                            </a>
                        </li>



                        <li class="sidebar-item  ">
                            <a href="{{url('/pembayaran')}}" class='sidebar-link'>
                                <i data-feather="dollar-sign" width="20"></i> 
                                <span>Pembayaran</span>
                            </a>
                        </li>

                       

                    </a>
                        
                    </ul>

                    </li>  


                <li class='sidebar-title'>Akun</li>
                    <a href="{{url('/akun')}}" class='sidebar-link'>
                        <i data-feather="user-check" width="20"></i> 
                        <span>Management akun</span>
                    </a>
                @endif
                

                <!-- SIDEBAR PENGUJI -->
                @if (Auth::user()->role == 'penguji')
               
                <li class='sidebar-title'>hikari chart</li>
                
                
                <li class="sidebar-item ">
                    <a href="{{url('/dashboard')}}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>
                </li>

               
                <li class='sidebar-title'>Penguji</li>

                    <li class="sidebar-item  ">
                        <a href="{{url('/akademik')}}" class='sidebar-link'>
                            <i data-feather="git-branch" width="20"></i> 
                            <span>Tes Potensi Akademik</span>
                        </a>
                    </li>

                @endif
                
            
                
                <!-- <li class='sidebar-title'>Pendaftar Belajar</li>
            
                <li class="sidebar-item  ">
                <a href="{{url('/pendaftarbelajar')}}" class='sidebar-link'>
                    <i data-feather="user" width="20"></i> 
                    <span>Pendaftar Belajar</span>
                </a>
                </li>

                <li class="sidebar-item  ">
                <a href="{{url('/programbelajar')}}" class='sidebar-link'>
                    <i data-feather="list" width="20"></i> 
                    <span>Program Belajar</span>
                </a>
                </li>

                <li class="sidebar-item  ">
                <a href="{{url('/prosesbelajar')}}" class='sidebar-link'>
                    <i data-feather="check-circle" width="20"></i> 
                    <span>Proses Belajar</span>
                </a>
                </li> -->
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>