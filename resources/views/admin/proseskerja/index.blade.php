@extends('admin.layout.appadmin')
@section('content')


@if (Auth::user()->role == 'siswa' &&  is_null($statuspendaftaran) &&  is_null($statusakademik) && is_null($statuspembayaran))
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><i class="fas fa-exclamation-circle"></i> Status Proses</h5>
            <p class="card-text">Terbuka setelah menyelesaikan pengisian data diri, Tes tulis dan Pembayaran daftar ulang</p>
        </div>
    </div>
@else

    <section class="section">
        <div class="card">
            <div class="card-header">
                        @if (Auth::user()->role == 'admin')
                        <a href="{{url('proseskerja/create')}}" class="btn btn-primary" ><i class="fas fa-plus"></i> Tambah Data</a>
                        @endif
                    </div>
            <div class="card-body">
            @if (Auth::user()->role == 'siswa')
            <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Proses dokumen siswa </h5>
            <hr>
            @endif
                <table class='table table-striped' id="table1">
                    
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Akun</th>
                        <th>Nama Pendaftar</th>
                        <th>Program </th>
                        <!-- <th>Sertfikasi Kebahasaan</th> -->
                        <th>Action</th>
                        </tr>
                    </thead>

<!-- <tbody> -->
                    
                    <tbody>
                        @php $no=1 @endphp
                        @foreach ($proses_kerja as $proker)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$proker->namaakun}}</td>
                            <td>{{$proker->namapekerja}}</td>
                            <td>{{$proker->namaprogram}}</td>
                            <!-- <td>{{$proker->kebahasaan}}<td> -->

                            <td>
                            <a href="{{url('proseskerja/show/'.$proker->id)}}" class="btn btn-sm btn-success mb-2"><i class="fas fa-eye"></i> Lihat data</a>
                            
                            @if (Auth::user()->role == 'admin')
                            <a href="{{url('proseskerja/edit/'.$proker->id)}}" class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i> Edit data </a>
                            

                                                
                                                <button type="button" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#exampleModal{{$proker->id}}"><i class="fas fa-trash"></i> Hapus data </button>
                                                @endif

                                                    <div class="modal fade" id="exampleModal{{$proker->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                       
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                            Apakah anda yakin akan menghapus data {{$proker->namapekerja}} ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="{{url('proseskerja/delete/'.$proker->id)}}" type="button" class="btn btn-danger">Delete</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>

                    <!-- <tbody> -->
                </table>
            </div>


            
        </div>

    </section>
@endif
@endsection




