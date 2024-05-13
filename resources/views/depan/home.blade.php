@extends('depan.applayout')
@section('content')


  <!-- about section -->

 <section class="about_section layout_padding-bottom">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About <span>Us</span>
              </h2>
            </div>
            <p>
              There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
              in some form, by injected humour, or randomised words which don't look even slightly believable. If you
              are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
              the middle of text. All
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{asset('depan/images/depanbaru2.jpg')}}" alt="">
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- end about section -->

<!-- slider section -->
<section class="slider_section mb-5 py-5">
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


@endsection