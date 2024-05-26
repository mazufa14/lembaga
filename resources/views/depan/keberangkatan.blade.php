@extends('depan.applayout')
@section('content')

<div class="container mb-3">
    <div class="row">
        <div class="col-md-6 mb-5">
        <h4 class="font-weight-bold">KEBERANGKATAN SISWA</h4>

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="max-width: 500px;">
                <div class="carousel-inner">
                    <div class="carousel-item active bg-dark">
                        <img src="{{ asset('depan/images/keberangkatan1.jpg') }}" style="width: 100px; height: 500px; object-fit: contain;" class="d-block w-100 card-img " alt="Slide 1" onclick="changeSlide(1)">
                    </div>
                    <div class="carousel-item bg-dark">
                        <img src="{{ asset('depan/images/keberangkatan2.jpg') }}" style="width: 100px; height: 500px; object-fit: contain;" class="d-block w-100 card-img " alt="Slide 2" onclick="changeSlide(2)">
                    </div>
                    <div class="carousel-item bg-dark">
                        <img src="{{ asset('depan/images/keberangkatan3.jpg') }}" style="width: 100px; height: 500px; object-fit: contain;" class="d-block w-100 card-img " alt="Slide 3" onclick="changeSlide(3)">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" >
                    <span class="carousel-control-next-icon"  aria-hidden="true" ></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <p  class="font-weight-bold">KEBERANGKATAN SISWA LEMBAGA HIKARI GAKKAI</p>

            <p>Setiap keberangkatan siswa dari Lembaga Hikari Gakkai tidak hanya sekadar sebuah perjalanan, tetapi juga sebuah pengalaman yang didukung dan ditemani sepenuhnya oleh staf dan pengajar kami. Kami memberikan pendampingan kepada siswa sejak sebelum keberangkatan hingga di bandara. Dengan dukungan penuh dari Lembaga Hikari Gakkai.</p>

</div>

        </div>
        
    </div>
</div>

<script>
    function changeSlide(slideNumber) {
        $('#carouselExampleControls').carousel(slideNumber - 1);
    } 
</script>
    @endsection