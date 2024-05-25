@extends('admin.layout.appadmin')
@section('content')


@if (Auth::user()->role == 'siswa' && is_null($statuspendaftar))
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><i class="fas fa-exclamation-circle"></i> Status Akademik</h5>
            <p class="card-text">Silahkan Lengkapi data pendaftaran. Admin akan verifikasi data pendaftaran anda</p>
        </div>
    </div>
@elseif (Auth::user()->role == 'siswa' && $statuspendaftar == 'unverified')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><i class="fas fa-exclamation-circle"></i> Status Akademik</h5>
            <p class="card-text">Data anda akan segera diverifikasi oleh admin.</p>
        </div>
    </div>
@else

        @if (Auth::user()->role == 'siswa')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Test Akademik Siswa</h5>
                <p class="card-text">Penting!</p>
                <hr>    
                <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Setelah siswa dinyatakan lulus segera melakukan pembayaran daftar ulang</p>
                <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Admin akan segera verifikasi data siswa yang masuk </p>
                <p class="card-text "> <i class="fas fa-minus-circle" style="color: #FFD43B;"></i> Minimal Nilai TPA 300 </p>
                <hr>
            </div>
        </div>    
        <hr>
        @endif

    <section class="section">
        <div class="card">
            <div class="card-header">
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'penguji')
                        <a href="{{url('akademik/create')}}" class="btn btn-primary" ><i class="fas fa-plus"></i> Tambah Data</a>
                         @endif
                    </div>
            <div class="card-body">

            @if (Auth::user()->role == 'siswa')
            <h5 class="card-title"> <i class="fas fa-clipboard-list"></i> Hasil Test Siswa</h5>
            <hr>
            @endif
                <table class='table table-striped' id="table1">
                    
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Akun</th>
                        <th>Nilai (TPA)</th>
                        <th>Status</th>
                        <!-- <th>Hasil Test</th> -->
                        <th>Action</th>
                        </tr>
                    </thead>

<!-- <tbody> -->
                    
                    <tbody>
                        @php $no=1 @endphp
                        @foreach ($akademik as $proker)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$proker->namaakun}}</td>
                            <td>{{$proker->nilai}}</td>
                            <td>
                                <span class="badge {{$proker->status == 'Lulus' ? 'bg-success' : 'bg-danger'}}">
                                {{$proker->status}}
                                </span>
                            </td>

                            <!-- <td>
                                <div class="mb-3">
                                    <div class="p-3">
                                        @empty($proker->fototest)
                                            <p>Test Belum keluar</p>
                                        @else
                                            <a href="{{ url('admin/akademik') }}/{{ $proker->fototest }}" target="_blank"> <i class="fas fa-file-pdf"></i> Lihat Hasil</a>
                                        @endempty
                                    </div>
                                </div>
                            </td> -->

                            <td>
                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'penguji')
                                <a href="{{url('akademik/edit/'.$proker->id)}}" class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i> Edit data </a>
                            
                                <button type="button" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#hapusModal{{$proker->id}}">
                                    <i class="fas fa-trash"></i> Hapus data
                                </button>

                                <a href="{{ url('admin/akademik') }}/{{ $proker->fototest }}" class="btn btn-sm btn-success mb-2" target="_blank"> <i class="fas fa-file-pdf"></i> Lihat Hasil</a>
                            @endif

                            @if (Auth::user()->role == 'siswa')
                                <div class="p-3">
                                    @empty($proker->fototest)
                                        <p>Test Belum keluar</p>
                                    @else
                                        <a href="{{ url('admin/akademik') }}/{{ $proker->fototest }}" class="btn btn-sm btn-warning mb-2" target="_blank"> <i class="fas fa-file-pdf"></i> Lihat Hasil</a>
                                    @endempty
                                </div>
                            @endif


                            <!-- Modal hapus -->
                                <div class="modal fade" id="hapusModal{{$proker->id}}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{$proker->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel{{$proker->id}}">Hapus Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin akan menghapus data {{$proker->namaakun}}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <a href="{{url('akademik/delete/'.$proker->id)}}" type="button" class="btn btn-danger">Hapus</a>
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




