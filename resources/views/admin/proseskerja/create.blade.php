@extends('admin.layout.appadmin')
@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Datatable</h3>
                <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can check the full documentation <a href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p>
            </div>
            <div class="col-12 col-md-6 order-md-1 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    
    <div class="card"> 
        <div class="card-content">
            <div class="card-body">

                    <form class="form" method="POST" action="{{url('proseskerja/store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Tambah Pendaftar Kerja</h4>
                        </div>
                        
                        <div class="card-body">
                                <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>
                                   
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Siswa</label>
                                            <select id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror">
                                                <option value="" disabled {{ old('nama') == null ? 'selected' : '' }}>Pilih Siswa</option>
                                                @foreach ($pendaftar_kerja as $p)
                                                    <option value="{{ $p->id }}" {{ old('nama') == $p->id ? 'selected' : '' }}>{{ $p->pendaftar_pekerja }}</option>
                                                @endforeach
                                            </select>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        </div>


                                        <!-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Siswa</label>
                                            <select id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Siswa</option>   
                                                @foreach ($pendaftar_kerja as $p)                                                       
                                                <option value="{{$p->id}}">{{$p->pendaftar_pekerja}}</option>
                                                @endforeach
                                            </select>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        </div> -->

                                        <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="user_id">Akun Siswa</label>
                                            <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                                <option value="" disabled {{ old('user_id') == null ? 'selected' : '' }}>Pilih Akun</option>
                                                @foreach ($user as $p)                                                       
                                                    <option value="{{ $p->id }}" {{ old('user_id') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="program_kerja">Program yang dipilih sebelumnya</label>
                                                <select id="program_kerja" name="program_kerja" class="form-control @error('program_kerja') is-invalid @enderror">
                                                    <option value="" disabled {{ old('program_kerja') == null ? 'selected' : '' }}>Pilih Program</option>
                                                    @foreach ($program_kerja as $p)
                                                        <option value="{{ $p->id }}" {{ old('program_kerja') == $p->id ? 'selected' : '' }}>{{ $p->nama_program }}</option>
                                                    @endforeach
                                                </select>
                                                @error('program_kerja')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- proses 1 -->
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="proses1">Proses 1 - Persyaratan awal </label>
                                                <select id="proses1" name="proses1" class="form-control @error('proses1') is-invalid @enderror">
                                                    <option value="Belum">Belum</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                </select>
                                                @error('proses1')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="proses2">Proses 2 - Tes akademik dasar </label>
                                                <select id="proses2" name="proses2" class="form-control @error('proses2') is-invalid @enderror">
                                                    <option value="Belum">Belum</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                </select>
                                                @error('proses2')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Nilai test </label>
                                            <input type="number" value="{{ old('nilai')}}" name="nilai" id="first-name-column" class="form-control @error('nilai') is-invalid @enderror">
                                            @error('nilai')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="proses3">Proses 3 - Daftar ulang</label>
                                                <select id="proses3" name="proses3" class="form-control @error('proses3') is-invalid @enderror">
                                                    <option value="Belum">Belum</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                </select>
                                                @error('proses3')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="proses4">Proses 4 - Pembelajaran</label>
                                                <select id="proses4" name="proses4" class="form-control @error('proses4') is-invalid @enderror">
                                                    <option value="Belum">Belum</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                </select>
                                                @error('proses4')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Selama <code>*Bulan</code> </label>
                                            <input type="number" value="{{ old('bulan')}}" name="bulan" id="first-name-column" class="form-control @error('bulan') is-invalid @enderror">
                                            @error('bulan')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="proses5">Proses 5 - Sertifikasi Kebahasaan</label>
                                                <select id="proses5" name="proses5" class="form-control @error('proses5') is-invalid @enderror">
                                                    <option value="Belum">Belum</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                </select>
                                                @error('proses5')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kebahasaan">Proses 5 - Sertikasi Kebahasaan </label>
                                            <input type="file" name="kebahasaan" id="kebahasaan" class="form-control @error('kebahasaan') is-invalid @enderror">
                                            @error('kebahasaan')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kebahasaan">Proses 5 - Sertikasi Kebahasaan <code>SESUAIKAN DENGAN PROGRAM SISWA</code></label>
                                                <select id="kebahasaan" name="kebahasaan" class="form-control @error('kebahasaan') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Sertifikasi</option> 
                                                <option value="N5">N5</option>
                                                <option value="N4">N4</option>
                                                <option value="N3">N3</option>
                                                <option value="N2">N2</option>
                                                <option value="N1">N1</option>    
                                        
                                                </select>
                                                @error('kebahasaan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div> -->


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="proses6">Proses 6 - Sertikasi Pekerjaan  </label>
                                                <select id="proses6" name="proses6" class="form-control @error('proses6') is-invalid @enderror">
                                                    <option value="Belum">Belum</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                    <!-- <option value="Belum">Tidak diperlukan</option> -->
                                                </select>
                                                @error('proses6')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Bidang Sertifikasi <code>*Pertanian *kontruksi dll</code></label>
                                            <input type="text" value="{{ old('sertifikasi')}}" name="sertifikasi" id="first-name-column" class="form-control @error('sertifikasi') is-invalid @enderror">
                                            @error('sertifikasi')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div> -->

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="sertifikasi">Proses 6 - Bidang Sertifikasi Pekerjaan</label>
                                            <input type="file" name="sertifikasi" id="sertifikasi" class="form-control @error('sertifikasi') is-invalid @enderror">
                                            @error('sertifikasi')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="proses7">Proses 7 - Wawancara / Seleksi user</label>
                                                <select id="proses7" name="proses7" class="form-control @error('proses7') is-invalid @enderror">
                                                    <option value="Belum">Belum</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                    <!-- <option value="Belum">Tidak diperlukan</option> -->
                                                </select>
                                                @error('proses7')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                   
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Nama perusahaan</label>
                                            <input type="text" value="{{ old('perusahaan')}}" name="perusahaan" id="first-name-column" class="form-control @error('perusahaan') is-invalid @enderror">
                                            @error('perusahaan')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="proses8">Proses 8 - Medikal checkup</label>
                                                <select id="proses8" name="proses8" class="form-control @error('proses8') is-invalid @enderror">
                                                    <option value="Belum">Belum</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                    <!-- <option value="Belum">Tidak diperlukan</option> -->
                                                </select>
                                                @error('proses8')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="proses9">Proses 9 - Tanda tangan kontrak</label>
                                                <select id="proses9" name="proses9" class="form-control @error('proses9') is-invalid @enderror">
                                                    <option value="Belum">Belum</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                    <!-- <option value="Belum">Tidak diperlukan</option> -->
                                                </select>
                                                @error('proses9')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="proses10">Proses 10 - Visa</label>
                                                <select id="proses10" name="proses10" class="form-control @error('proses10') is-invalid @enderror">
                                                    <option value="Belum">Belum</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                    <!-- <option value="Belum">Tidak diperlukan</option> -->
                                                </select>
                                                @error('proses10')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="proses11">Proses 11 - Passport</label>
                                                <select id="proses11" name="proses11" class="form-control @error('proses11') is-invalid @enderror">
                                                    <option value="Belum">Belum</option>
                                                    <option value="Memenuhi">Memenuhi</option>
                                                    <!-- <option value="Belum">Tidak diperlukan</option> -->
                                                </select>
                                                @error('proses11')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="proses12">Proses 12 - Keputusan Lembaga</label>
                                                <select id="proses12" name="proses12" class="form-control @error('proses12') is-invalid @enderror">
                                                    <option value="Menunggu keputusan">Menunggu keputusan</option>
                                                    <option value="Layak dan Siap diberangkatkan">Layak dan siap diberangkatkan</option>
                                                </select>
                                                @error('proses12')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="program_kerja">Program yang dipilih sebelumnya</label>
                                                <select id="program_kerja" name="program_kerja" class="form-control @error('program_kerja') is-invalid @enderror">
                                                    <option value="" disabled selected>Pilih Program</option>   
                                                    @foreach ($program_kerja as $p)                                                       
                                                    <option value="{{$p->id}}">{{$p->nama_program}}</option>
                                                    @endforeach
                                                </select>
                                                    @error('program_kerja')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div> -->

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Deskripsi Tambahan <code>*KEBUTUHAN DOKUMEN</code></label>
                                                <textarea name="deskripsi" rows="5" id="first-name-column" class="form-control @error('deskripsi') is-invalid @enderror"></textarea>
                                                @error('deskripsi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                        </form>
            </div>
        </div>
    </div>
            
@endsection

