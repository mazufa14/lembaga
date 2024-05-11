<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Hikkari Gakkai</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('depan/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('depan/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('depan/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('depan/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('depan/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;800&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
   </head>
   <body>
      <!-- header top section start -->
      <div class="header_top_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="header_top_main">
                     <div class="call_text"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>  0815-4246-7836</a></div>
                     
                     <div class="call_text_1"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Hikkari Gakkai</a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header top section start -->
      <!-- header section start -->
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="logo"><a href="index.html"><img width="70px" src="{{asset('admin/assets/images/hikkari.png')}}"></a></div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('/rumah')}}">Home</a>
                     </li>
                     
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('/about')}}">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('/program')}}">Program</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
                     </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                     <div class="login_text">
                        <ul>
                           <li><a href="#"></a></li>
                           <li><a href="#"></a></li>
                        </ul>
                     </div>
                     <div class="quote_btn"><a href="{{url('/login')}}"><i class="fa fa-user" aria-hidden="true"></i> Login / Regist</a></div>
                  </form>
               </div>
            </nav>
         </div>
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="banner_taital_main">
                                 <h1 class="banner_taital">LPK HIKARI GAKKAI </h1>
                                 <p class="banner_text">Lembaga pendidikan bahasa Jepang yang memberikan supports kepada semua siswa yang memiliki minat dan tujuan ke Jepang melalui program magang, kerja dan sekolah bahasa</p>
                                 <div class="btn_main">
                                    <div class="started_text active"><a href="#">Contact US</a></div>
                                    <div class="started_text"><a href="#">About Us</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="banner_taital_main">
                                 <h1 class="banner_taital">Pendidikan Dan Pelatihan</h1>
                                 <p class="banner_text">Memberikan garansi kepada semua siswa untuk lulus tes kemampuan bahasa Jepang JLPT atau sejenisnya sesuai dengan level kemampuan yang dipelajari. </p>
                                 <div class="btn_main">
                                    <div class="started_text active"><a href="#">Contact US</a></div>
                                    <div class="started_text"><a href="#">About Us</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
               </div>
               <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
        <!-- banner section end -->
      </div>
      <!-- header section end -->