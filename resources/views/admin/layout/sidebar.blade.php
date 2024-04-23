<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembaga tiga</title>
    
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/chartjs/Chart.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    


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
        <img src="{{asset('admin/assets/images/logo.svg')}}" alt="" srcset="">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            
                
                <li class='sidebar-title'>hikari chart</li>
                
            
                
                <li class="sidebar-item ">

                    <a href="{{url('/dashboard')}}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>

                    
                </li>
                
             

                <li class='sidebar-title'>Data Lembaga</li>

                <li class="sidebar-item  ">
                 
              
                <a href="{{url('/pendaftarkerja')}}" class='sidebar-link'>
                    <i data-feather="user" width="20"></i> 
                    <span>Data Pendaftaran Awal </span>
                </a>
                </li>
              

                @if (Auth::user()->role == 'admin')
                <li class="sidebar-item  ">
                <a href="{{url('/programkerja')}}" class='sidebar-link'>
                    <i data-feather="list" width="20"></i> 
                    <span>Program Kerja Lembaga</span>
                </a>
                </li>
                @endif

                <li class="sidebar-item  ">
                <a href="{{url('/proseskerja')}}" class='sidebar-link'>
                    <i data-feather="check-circle" width="20"></i> 
                    <span>Proses Dokumen Siswa</span>
                </a>
                </li>
                
                @if (Auth::user()->role == 'admin')
                <li class='sidebar-title'>Kelola data Halaman</li>
                <a href="{{url('/pendaftarbelajar')}}" class='sidebar-link'>
                    <i data-feather="user" width="20"></i> 
                    <span>Info</span>
                </a>

                <a href="{{url('/pendaftarbelajar')}}" class='sidebar-link'>
                    <i data-feather="user" width="20"></i> 
                    <span>Management akun</span>
                </a>
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