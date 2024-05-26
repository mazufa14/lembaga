@extends('depan.applayout')
@section('content')

<section class="about_section layout_padding-bottom">
    <div class="container text-center">
        <div class="heading_container">
            <h2 >Alur Pendaftaran : </h2>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="detail-box border p-4">
                    <p class="step">1. Buat Akun</p>
                    <p>Buat akun baru untuk mengakses layanan pendaftaran.</p>
                    <a href="#" class="btn btn-primary">Buat Akun</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box border p-4">
                    <p class="step">2. Daftar Diri</p>
                    <p>Lengkapi informasi pribadi Anda untuk melakukan pendaftaran.</p>
                    <a href="#" class="btn btn-primary">Daftar Diri</a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="detail-box border p-4">
                    <p class="step">3. Tes Tulis</p>
                    <p>Ikuti tes tulis untuk menentukan kualifikasi Anda.</p>
                    <a href="#" class="btn btn-primary">Ikuti Tes Tulis</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box border p-4">
                    <p class="step">4. Pembayaran Daftar Ulang</p>
                    <p>Lakukan pembayaran daftar ulang untuk menyelesaikan pendaftaran.</p>
                    <a href="#" class="btn btn-primary">Bayar Daftar Ulang</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
