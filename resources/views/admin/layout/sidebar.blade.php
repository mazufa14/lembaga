<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voler Admin Dashboard</title>
    
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
            
                
                <li class='sidebar-title'>Main Menu</li>
                
            
                
                <li class="sidebar-item active ">

                    <a href="index.html" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>

                    
                </li>
                
            
                
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="triangle" width="20"></i> 
                        <span>Components</span>
                    </a>

                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="component-alert.html">Alert</a>
                        </li>
                        
                    </ul>
                    
                </li>
                
            
                
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="briefcase" width="20"></i> 
                        <span>Extra Components</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="component-extra-avatar.html">Avatar</a>
                        </li>
                        <li>
                            <a href="component-extra-divider.html">Divider</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  ">
                <a href="{{url('/programkerja')}}" class='sidebar-link'>
                    <i data-feather="user" width="20"></i> 
                    <span>Pendaftar Kerja</span>
                </a>
                </li>

                <li class="sidebar-item  ">
                <a href="{{url('/programkerja')}}" class='sidebar-link'>
                    <i data-feather="list" width="20"></i> 
                    <span>Program Kerja</span>
                </a>
                </li>

                <li class="sidebar-item  ">
                <a href="{{url('/programkerja')}}" class='sidebar-link'>
                    <i data-feather="layers" width="20"></i> 
                    <span>Proses kerja</span>
                </a>
                </li>
                
                
            
                
                <li class='sidebar-title'>Forms &amp; Tables</li>
            
                
                <li class="sidebar-item  ">

                    <a href="form-layout.html" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i> 
                        <span>Form Layout</span>
                    </a>

                    
                </li>
                
            
                
                <li class="sidebar-item  ">

                    <a href="form-editor.html" class='sidebar-link'>
                        <i data-feather="layers" width="20"></i> 
                        <span>Form Editor</span>
                    </a>

                    
                </li>
                
            
                
                <li class="sidebar-item  ">

                    <a href="table.html" class='sidebar-link'>
                        <i data-feather="grid" width="20"></i> 
                        <span>Table</span>
                    </a>

                    
                </li>
                
            
                
                <li class="sidebar-item  ">

                    <a href="table-datatable.html" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i> 
                        <span>Datatable</span>
                    </a>

                    
                </li>
                
            
                
                <li class='sidebar-title'>Extra UI</li>
                
            
                
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="user" width="20"></i> 
                        <span>Widgets</span>
                    </a>

                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="ui-chatbox.html">Chatbox</a>
                        </li>
                        
                        <li>
                            <a href="ui-pricing.html">Pricing</a>
                        </li>
                        
                        <li>
                            <a href="ui-todolist.html">To-do List</a>
                        </li>
                        
                    </ul>
                    
                </li>
                
            
                
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="trending-up" width="20"></i> 
                        <span>Charts</span>
                    </a>

                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="ui-chart-chartjs.html">ChartJS</a>
                        </li>
                        
                        <li>
                            <a href="ui-chart-apexchart.html">Apexchart</a>
                        </li>
                        
                    </ul>
                    
                </li>
                
            
                
                <li class='sidebar-title'>Pages</li>
                
            
                
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="user" width="20"></i> 
                        <span>Authentication</span>
                    </a>

                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="auth-login.html">Login</a>
                        </li>
                        
                        <li>
                            <a href="auth-register.html">Register</a>
                        </li>
                        
                        <li>
                            <a href="auth-forgot-password.html">Forgot Password</a>
                        </li>
                        
                    </ul>
                    
                </li>
                
            
                
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="alert-circle" width="20"></i> 
                        <span>Errors</span>
                    </a>

                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="error-403.html">403</a>
                        </li>
                        
                        <li>
                            <a href="error-404.html">404</a>
                        </li>
                        
                        <li>
                            <a href="error-500.html">500</a>
                        </li>
                        
                    </ul>
                    
                </li>
                
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>