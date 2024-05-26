@extends('depan.applayout')
@section('content')

<div class="container mb-3">
    <div class="row">
        <div class="col-md-6 mb-5">
        <h4 class="font-weight-bold">1. KELAS INTENSIF</h4>

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="max-width: 500px;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('depan/images/kelasintensif.jpg') }}" style="width: 100px; height: 500px; object-fit: contain;" class="d-block w-100 card-img " alt="Slide 1" onclick="changeSlide(1)">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('depan/images/kelasintensif2.jpg') }}" style="width: 100px; height: 500px; object-fit: contain;" class="d-block w-100 card-img " alt="Slide 2" onclick="changeSlide(2)">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('depan/images/kelasintensifpay.jpg') }}" style="width: 100px; height: 500px; object-fit: contain;" class="d-block w-100 card-img " alt="Slide 3" onclick="changeSlide(3)">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <p  class="font-weight-bold">PROGRAM MAGANG & TG (TOKUTEI GINOU)</p>

            <p>Kelas ini dibuka untuk persiapan mengikuti *program magang maupun program Tokutei ginou/TG.* Program pendidikan ini dibuka untuk masyarakat umum yang memiliki minat untuk bekerja di Jepang.
            </p>

            <p>
            Siswa bisa belajar bahasa Jepang dari nol. *Garansi lulus tes JLPT N4/JFT Basic A2.* Dan *dibimbing sampai dapat job* untuk bekerja di Jepang.
            </p>

            <p>
            Jika setelah selesai program belajar tapi siswa belum menguasai materinya, Siswa bisa *mengulang belajar GRATIS* sampai bisa dan mendapat job di Jepang.
            </p>

            <p>
            Kesempatan untuk bekerja di Jepang terbuka lebar jika sudah bisa menguasai bahasa Jepang yang kami ajarkan.
            </p>

            <p>
            *Jadwal belajar :*
            Setiap hari Senin sampai Jum'at* ( 08.00 s/d 15.00 WIB )

            Yang akan didapat oleh siswa antara lain :
            @ Belajar total waktu 480 jam
            @ Modul/buku materi N5 & N4
            @ Sertifikat / surat keterangan dari lembaga

            Biaya belajar sudah termasuk biaya buku dan pendaftaran.Biaya belajar bisa dicicil tanpa bunga.
            </p>
        </div>

<!-- KELAS KARYAWAN -->

        <div class="col-md-6 mb-5">
        <h4 class="font-weight-bold">2. KELAS KARYAWAN</h4>
            <div id="carouselExampleControlsdua" class="carousel slide" data-ride="carousel" style="max-width: 500px;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('depan/images/kelasregular1.jpg') }}" style="width: 100px; height: 500px; object-fit: contain;" class="d-block w-100 card-img " alt="Slide 1" onclick="changeSlidedua(1)">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('depan/images/kelasregular2.jpg') }}" style="width: 100px; height: 500px; object-fit: contain;" class="d-block w-100 card-img " alt="Slide 2" onclick="changeSlidedua(2)">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControlsdua" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControlsdua" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <p  class="font-weight-bold">PROGRAM TOKUTEI GINOU</p>

            <P>
            Kelas Karyawan dibuka untuk umum. Karyawan yang masih aktif bekerja di perusahaanpun bisa mengikuti kelas ini. Siswa bisa belajar bahasa Jepang dari nol/ dasar. Materi pembelajaran dasar bahasa Jepang N5 dan N4. *Garansi lulus tes JLPT N4 atau JFT Basic A2.* Jika setelah selesai program belajar tapi siswa belum menguasai materinya, Siswa bisa mengulang belajar GRATIS sampai bisa.
            </P>

            <P>
            *Jadwal belajar :*
            Setiap hari Senin sampai Jum'at* ( 19.00 s/d 21.00 WIB ) *2 jam per pertemuan.*

            Yang akan didapat oleh siswa antara lain :
            @ Belajar total waktu 320 jam (sekitar 8 bulan)
            @ Modul/buku materi N5 & N4
            @ Sertifikat/surat keterangan dari lembaga
            </P>

            <P>
            Biaya belajar sudah termasuk biaya buku dan pendaftaran.Biaya belajar *bisa dicicil* tanpa bunga.
            </P>

            <P>
            Siswa kelas ini bisa dibantu untuk proses mendapatkan job, agar bisa bekerja di Jepang melalui *program Tokutei ginou.*
            </P>
            
        </div>
    </div>
</div>

<script>
    function changeSlide(slideNumber) {
        $('#carouselExampleControls').carousel(slideNumber - 1);
    } 
</script>

<script>
    function changeSlidedua(slideNumber) {
        $('#carouselExampleControlsdua').carousel(slideNumber - 1);
    } 
</script>

@endsection
