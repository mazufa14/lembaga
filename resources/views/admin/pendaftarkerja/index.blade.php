@extends('admin.layout.appadmin')
@section('content')

@if($errors->any())
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
@endif

    <section class="section">
        <div class="card">
            <div class="card-header">
                        <a href="{{url('pendaftarkerja/create')}}" class="btn btn-primary" ><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
            <div class="card-body">

                <table class='table table-striped' id="table1">
                    
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Pendaftar</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Akun</th>

                        <!-- <th>nikah</th>
                        <th>alamat email</th>
                        <th>no hp</th>
                        <th>alamat rumah</th>
                        <th>sakit berat</th>
                        <th>pendidikan </th> -->
                        
                        <th>Program </th> 
                        <th>Action</th>
                        </tr>
                    </thead>

<!-- <tbody> -->
                    
                    <tbody>
                        @php $no=1 @endphp
                        @foreach ($pendaftar_kerja as $proker)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$proker->pendaftar_pekerja}}</td>
                            <td>{{$proker->tempat_lahir}}</td>
                            <td>{{$proker->tanggal_lahir}}</td>
                            <td>{{$proker->jenis_kelamin}}</td>
                            <td>{{$proker->namaakun}}</td>

                            <!-- <td>{{ $proker->nikah}}</td>
                            <td>{{ $proker->alamat_email}}</td>
                            <td>{{ $proker->no_hp}}</td>
                            <td>{{ $proker->alamat_rumah}}</td>
                            <td>{{ $proker->sakit_berat}}</td>
                            <td>{{ $proker->pendidikan_terakhir}}</td> -->
                            

                            <td>{{$proker->namaprogram}}</td>
                            <td>

                            <a href="{{url('pendaftarkerja/show/'.$proker->id)}}" class="btn btn-sm btn-success mb-2"><i class="fas fa-eye"></i> Lihat data</a>
                            <a href="{{url('pendaftarkerja/edit/'.$proker->id)}}" class="btn btn-sm btn-warning mb-2"><i class="fas fa-edit"></i> Edit data </a>

                                                @if (Auth::user()->role == 'admin')
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$proker->id}}"><i class="fas fa-trash"></i> Hapus data </button>
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
                                                            Apakah anda yakin akan menghapus data {{$proker->pendaftar_pekerja}} ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="{{url('pendaftarkerja/delete/'.$proker->id)}}" type="button" class="btn btn-danger">Delete</a>
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




