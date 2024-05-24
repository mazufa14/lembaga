@extends('admin.layout.appadmin')
@section('content')


@foreach ($proses_kerja as $proker)

<div class="card"> 
    <div class="card-content">
        <div class="card-body">
            <form class="form" method="POST" action="{{url('proseskerja/update/'.$proker->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4 class="card-title">Edit Proses Kerja</h4>
                </div>
                <div class="card-body">
                    <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>

            <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <select id="nama" disabled  class="form-control @error('nama') is-invalid @enderror">
                                <option value="" disabled selected>Pilih Nama Siswa</option>   
                                @foreach ($pendaftar_kerja as $p)
                                @php $sel = ($p->id == $proker->nama_pekerja) ? 'selected' : ''; @endphp                                                     
                                <option value="{{$p->id}}" {{$sel}}>{{$p->pendaftar_pekerja}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>   

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="user_id">Akun</label>
                            <select id="user_id"  name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                <option value="" disabled selected>Pilih Akun</option>   

                                @foreach ($user as $p)
                                @php $sel = ($p->id == $proker->user_id) ? 'selected' : ''; @endphp                                                     
                                <option value="{{$p->id}}" {{$sel}}>{{$p->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="program_kerja">Program Kerja</label>
                            <select id="program_kerja" name="program_kerja" class="form-control @error('program_kerja') is-invalid @enderror">
                                <option value="" disabled selected>Pilih Program Kerja</option>   

                                @foreach ($program_kerja as $p)
                                @php $sel = ($p->id == $proker->program_proses_kerja) ? 'selected' : ''; @endphp                                                     
                                <option value="{{$p->id}}" {{$sel}}>{{$p->nama_program}}</option>
                                @endforeach

                                </select>
                                @error('program_kerja')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="proses1">Proses 1 - Persyaratan awal</label>
                            <select id="proses1" name="proses1" class="form-control @error('proses1') is-invalid @enderror">
                                <option value="" disabled>Keputusan</option>
                                <option value="Memenuhi" {{ $proker->proses1 == 'Memenuhi' ? 'selected' : '' }}>Memenuhi</option>
                                <option value="Belum" {{ $proker->proses1 == 'Belum' ? 'selected' : '' }}>Belum</option>
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
                            <label for="proses2">Proses 2 - Tes akademik dasar</label>
                            <select id="proses2" name="proses2" class="form-control @error('proses2') is-invalid @enderror">
                                <option value="" disabled>Keputusan</option>
                                <option value="Memenuhi" {{ $proker->proses2 == 'Memenuhi' ? 'selected' : '' }}>Memenuhi</option>
                                <option value="Belum" {{ $proker->proses2 == 'Belum' ? 'selected' : '' }}>Belum</option>
                                <!-- <option value="Tidak diperlukan" {{ $proker->kebahasaan == 'Tidak diperlukan' ? 'selected' : '' }}>Tidak diperlukan</option> -->
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
                                <label for="first-name-column">Nilai </label>
                        <input type="number" value="{{$proker->nilai}}" name="nilai" id="first-name-column" class="form-control @error('nilai') is-invalid @enderror">
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
                                <option value="" disabled>Keputusan</option>
                                <option value="Memenuhi" {{ $proker->proses3 == 'Memenuhi' ? 'selected' : '' }}>Memenuhi</option>
                                <option value="Belum" {{ $proker->proses3 == 'Belum' ? 'selected' : '' }}>Belum</option>
                                <!-- <option value="Tidak diperlukan" {{ $proker->kebahasaan == 'Tidak diperlukan' ? 'selected' : '' }}>Tidak diperlukan</option> -->
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
                                <option value="" disabled>Keputusan</option>
                                <option value="Memenuhi" {{ $proker->proses4 == 'Memenuhi' ? 'selected' : '' }}>Memenuhi</option>
                                <option value="Belum" {{ $proker->proses4 == 'Belum' ? 'selected' : '' }}>Belum</option>
                                <!-- <option value="Tidak diperlukan" {{ $proker->kebahasaan == 'Tidak diperlukan' ? 'selected' : '' }}>Tidak diperlukan</option> -->
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
                                <label for="first-name-column">Selama  <code>*Bulan</code> </label>
                            <input type="number" value="{{$proker->bulan}}" name="bulan" id="first-name-column" class="form-control @error('bulan') is-invalid @enderror">
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
                                <option value="" disabled>Keputusan</option>
                                <option value="Memenuhi" {{ $proker->proses5 == 'Memenuhi' ? 'selected' : '' }}>Memenuhi</option>
                                <option value="Belum" {{ $proker->proses5 == 'Belum' ? 'selected' : '' }}>Belum</option>
                                <!-- <option value="Tidak diperlukan" {{ $proker->kebahasaan == 'Tidak diperlukan' ? 'selected' : '' }}>Tidak diperlukan</option> -->
                            </select>
                            @error('proses5')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

<!--                    
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="kebahasaan">Proses 5 - Sertifikasi Kebahasaan <code>SESUAIKAN DENGAN PROGRAM SISWA</code> </label>
                            <select id="kebahasaan" name="kebahasaan" class="form-control @error('kebahasaan') is-invalid @enderror">
                                <option value="n5" {{ $proker->kebahasaan == 'n5' ? 'selected' : '' }}>N5</option>
                                <option value="n4" {{ $proker->kebahasaan == 'n4' ? 'selected' : '' }}>N4</option>
                                <option value="n3" {{ $proker->kebahasaan == 'n3' ? 'selected' : '' }}>N4</option>
                                <option value="n2" {{ $proker->kebahasaan == 'n2' ? 'selected' : '' }}>N4</option>
                                <option value="n1" {{ $proker->kebahasaan == 'n1' ? 'selected' : '' }}>N4</option>
                                <option value="Tidak diperlukan" {{ $proker->kebahasaan == 'Tidak diperlukan' ? 'selected' : '' }}>Tidak diperlukan</option>
                            </select>
                            @error('kebahasaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div> -->

                    <div class="col-md-6 col-12 mb-3">
                        <div class="form-group">
                            <label for="kebahasaan">Sertifikasi Kebahasaan (PDF) </label>
                            <input type="file" name="kebahasaan" id="kebahasaan" class="form-control @error('kebahasaan') is-invalid @enderror mb-3">

                            @if(!empty($proker->kebahasaan))                       
                            <a href="{{ url('admin/kebahasaan') }}/{{ $proker->kebahasaan }}" target="_blank"> <i class="fas fa-file-pdf"></i> Lihat PDF</a>
                            @else
                                File PDF belum ada
                            @endif

                            @error('kebahasaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="proses6">Proses 6 - Sertifikasi Pekerjaan </label>
                            <select id="proses6" name="proses6" class="form-control @error('proses6') is-invalid @enderror">
                                <option value="Memenuhi" {{ $proker->proses6 == 'Memenuhi' ? 'selected' : '' }}>Memenuhi</option>
                                <option value="Belum" {{ $proker->proses6 == 'Belum' ? 'selected' : '' }}>Belum</option>
                                <!-- <option value="Tidak diperlukan" {{ $proker->sertifikasi == 'Tidak diperlukan' ? 'selected' : '' }}>Tidak diperlukan</option> -->
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
                                <label for="first-name-column">Bidang Sertfikasi <code>*Pertanian *kontruksi dll</code> </label>
                            <input type="text" value="{{$proker->sertifikasi}}" name="sertifikasi" id="first-name-column" class="form-control @error('sertifikasi') is-invalid @enderror">
                                @error('sertifikasi')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                                @enderror
                        </div>
                    </div> -->

                    <div class="col-md-6 col-12 mb-3">
                        <div class="form-group">
                            <label for="sertifikasi">Sertifikasi Pekerjaan (PDF) </label>
                            <input type="file" name="sertifikasi" id="sertifikasi" class="form-control @error('sertifikasi') is-invalid @enderror mb-3">

                            @if(!empty($proker->kebahasaan))                       
                            <a href="{{ url('admin/sertifikasi') }}/{{ $proker->sertifikasi }}" target="_blank"> <i class="fas fa-file-pdf"></i> Lihat PDF</a>
                            @else
                                File PDF belum ada
                            @endif

                            @error('sertifikasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="proses7">Proses 7 -Wawancara/Seleksi User </label>
                            <select id="proses7" name="proses7" class="form-control @error('proses7') is-invalid @enderror">
                                <option value="Memenuhi" {{ $proker->proses7 == 'Memenuhi' ? 'selected' : '' }}>Memenuhi</option>
                                <option value="Belum" {{ $proker->proses7 == 'Belum' ? 'selected' : '' }}>Belum</option>
                                <!-- <option value="Tidak diperlukan" {{ $proker->sertifikasi == 'Tidak diperlukan' ? 'selected' : '' }}>Tidak diperlukan</option> -->
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
                                <label for="first-name-column">Nama Perusahaan</label>
                            <input type="text" value="{{$proker->perusahaan}}" name="perusahaan" id="first-name-column" class="form-control @error('perusahaan') is-invalid @enderror">
                                @error('perusahaan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="proses8">Proses 8 - Medikal checkup </label>
                            <select id="proses8" name="proses8" class="form-control @error('proses8') is-invalid @enderror">
                                <option value="Memenuhi" {{ $proker->proses8 == 'Memenuhi' ? 'selected' : '' }}>Memenuhi</option>
                                <option value="Belum" {{ $proker->proses8 == 'Belum' ? 'selected' : '' }}>Belum</option>
                                <!-- <option value="Tidak diperlukan" {{ $proker->sertifikasi == 'Tidak diperlukan' ? 'selected' : '' }}>Tidak diperlukan</option> -->
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
                            <label for="proses9">Proses 9 - Tanda tangan kontrak perusahaan </label>
                            <select id="proses9" name="proses9" class="form-control @error('proses9') is-invalid @enderror">
                                <option value="Memenuhi" {{ $proker->proses9 == 'Memenuhi' ? 'selected' : '' }}>Memenuhi</option>
                                <option value="Belum" {{ $proker->proses9 == 'Belum' ? 'selected' : '' }}>Belum</option>
                                <!-- <option value="Tidak diperlukan" {{ $proker->sertifikasi == 'Tidak diperlukan' ? 'selected' : '' }}>Tidak diperlukan</option> -->
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
                            <label for="proses10">Proses 10 - Visa </label>
                            <select id="proses10" name="proses10" class="form-control @error('proses10') is-invalid @enderror">
                                <option value="Memenuhi" {{ $proker->proses10 == 'Memenuhi' ? 'selected' : ''}}>Memenuhi<option>
                                <option value="Belum" {{ $proker->proses10 == 'Belum' ? 'selected' : '' }}>Belum</option>
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
                            <label for="proses11">Proses 11 - Passport </label>
                            <select id="proses11" name="proses11" class="form-control @error('proses11') is-invalid @enderror">
                                <option value="Memenuhi" {{ $proker->proses11 == 'Memenuhi' ? 'selected' : '' }}>Memenuhi</option>
                                <option value="Belum" {{ $proker->proses11 == 'Belum' ? 'selected' : '' }}>Belum</option>
                                <!-- <option value="Tidak diperlukan" {{ $proker->sertifikasi == 'Tidak diperlukan' ? 'selected' : '' }}>Tidak diperlukan</option> -->
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
                            <label for="proses12">Proses 12 - Keputusan Lembaga </label>
                            <select id="proses12" name="proses12" class="form-control @error('proses12') is-invalid @enderror">
                                <option value="Menunggu keputusan" {{ $proker->proses12 == 'Menunggu keputusan' ? 'selected' : '' }}>Menunggu keputusan</option>
                                <option value="Layak dan Siap diberangkatkan" {{ $proker->proses12 == 'Layak dan Siap diberangkatkan' ? 'selected' : '' }}>Layak dan siap diberangkatkan</option>
                               
                            </select>
                            @error('proses12')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div> -->

                        
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <div class="justify-content-center text-center mb-3">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" rows="5" id="deskripsi"  class="form-control @error('deskripsi') is-invalid @enderror">{{$proker->deskripsi}}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div> 
                    </div>       

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
