<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/fevicon.png" type="">

  <title> Hikkari Gakkai </title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('depan/css/bootstrap.css')}}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="{{asset('depan/css/font-awesome.min.css')}}" rel="stylesheet" />
  <link rel="shortcut icon" href="{{asset('admin/assets/images/hikkari.png')}}" type="image/x-icon">
  <!-- Custom styles for this template -->
  <link href="{{asset('depan/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('depan/css/responsive.css')}}" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid ">
          <div class="contact_nav">
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call : 0815-4246-7836
              </span>
            </a>
            <a href="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Hikari Gakkai
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
              <span>
                <img width="50px" src="{{asset('admin/assets/images/hikkari.png')}}"></a>
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
             
              <ul class="navbar-nav">
                  <li class="nav-item ">
                      <a class="nav-link" href="{{url('/rumah')}}">Home <span class="sr-only">(current)</span></a>
                  </li>
                 
                  <li class="nav-item">
                      <a class="nav-link" href="{{url('/about')}}">Tentang Kami</a>
                  </li>

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Layanan
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{url('/caradaftar')}}">Cara Pendaftaran</a>
                          <a class="dropdown-item" href="{{url('/program')}}">Program Tersedia</a>
                          <a class="dropdown-item" href="{{url('/contact')}}">Hubungi Kami</a>
                      </div>
                  </li>

                 
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Program
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{url('/kerjasama')}}">Kerja Sama</a>
                          <a class="dropdown-item" href="{{url('/keberangkatan')}}">Keberangkatan</a>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('/login') }}"> <i class="fa fa-user" aria-hidden="true"></i> Daftar</a>
                  </li>
              </ul>


            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <section class="slider_section mb-5">
      <div class="slider_bg_box">
        <img src="{{asset('depan/images/depanbaru.jpg')}}" alt="">
      </div>
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 ">
                  <div class="detail-box">
                    <h1>
                      LPK Hikkari Gakkai <br>
                    </h1>
                    <p>
                    Lembaga HIKKARI adalah sebuah Lembaga yang berjalan dibidang Pendidikan dan pelatihan Bahasa jepang yang memberikan garansi kepada semua pendaftar untuk lulus test kemampuan ber Bahasa jepang dan juga Dan kami juga memberikan support kepada semua siswa yang memilki minat dan tujuan melanjutkan Pendidikan ataupun yang akan bekerja dijepang.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Daftar
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 ">
                  <div class="detail-box">
                    <h1>
                    Pendidikan Dan Pelatihan <br>
                      
                    </h1>
                    <p>
                    Kami memberikan Garansi Keberhasilan kepada setiap siswa untuk lulus tes kemampuan bahasa Jepang JLPT atau uji sejenisnya, sesuai dengan tingkat kemampuan yang telah dipelajari mereka. Jaminan prestasi yang pasti!
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Daftar
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
        </ol>
      </div>

    </section>
    <!-- end slider section -->
  </div>

