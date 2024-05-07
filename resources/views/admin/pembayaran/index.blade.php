@extends('admin.layout.appadmin')
@section('content')

    <!-- @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong style="margin-bottom: 0.5em;">Warning!</strong> There were some problems with your input.
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif -->
    
    <section class="section">
        <div class="card">
            <div class="card-header">
                        <a href="{{url('pembayaran/create')}}" class="btn btn-primary" ><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
            <div class="card-body">

                <table class='table table-striped' id="table1">
                    
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Akun</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Bukti</th>
                        <th>Action</th>
                        </tr>
                    </thead>

<!-- <tbody> -->
                    
                    <tbody>
                        @php $no=1 @endphp
                        @foreach ($pembayaran as $proker)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$proker->namaakun}}</td>
                            <td>{{$proker->keterangan}}</td>
                            <td>
                                <span class="badge {{$proker->status == 'verified' ? 'bg-success' : 'bg-danger'}}">
                                {{$proker->status}}
                                </span>
                            </td>

                            <td>
                                <div class="text-center">
                                    @isset($proker->fotopembayaran)
                                        <img class="card-img p-2" src="{{ url('admin/pembayaran') }}/{{ $proker->fotopembayaran }}" alt="{{ $proker->namaakun }}" style="width: 160px; height: 160px; object-fit: cover;" data-toggle="modal" data-target="#exampleModal{{ $proker->id }}">
                                    @else
                                        <img class="card-img p-2" src="{{ url('admin/img/nophoto.png') }}" alt="No Photo">
                                    @endisset
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $proker->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body p-3">
                                                <img src="{{ url('admin/pembayaran') }}/{{ $proker->fotopembayaran }}" alt="{{ $proker->namaakun }}" class="img-fluid d-block mx-auto" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                            @if (Auth::user()->role == 'admin')
                                <a href="{{url('pembayaran/edit/'.$proker->id)}}" class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i> Edit data </a>
                            @endif
                                <button type="button" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#hapusModal{{$proker->id}}">
                                    <i class="fas fa-trash"></i> Hapus data
                                </button>

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
                                                <a href="{{url('pembayaran/delete/'.$proker->id)}}" type="button" class="btn btn-danger">Hapus</a>
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

@endsection




