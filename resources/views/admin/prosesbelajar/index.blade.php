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

    <section class="section">
        <div class="card">
            <div class="card-header">
                        <a href="{{url('prosesbelajar/create')}}" class="btn btn-primary" ><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
            <div class="card-body">

                <table class='table table-striped' id="table1">
                    
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Program </th>
                        <!-- <th>Deskripsi</th>  -->
                        <th>Action</th>
                        </tr>
                    </thead>

<!-- <tbody> -->
                    
                    <tbody>
                        @php $no=1 @endphp
                        @foreach ($proses_belajar as $proker)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$proker->namapelajar}}</td>
                            <td>{{$proker->namaprogrambelajar}}</td>
                            <!-- <td>{{$proker->deskripsi}}</td>  -->
                            <td>

                            <a href="{{url('prosesbelajar/show/'.$proker->id)}}" class="btn btn-sm btn-success "><i class="fas fa-eye"></i> Lihat data</a>
                            <a href="{{url('prosesbelajar/edit/'.$proker->id)}}" class="btn btn-sm btn-warning "><i class="fas fa-edit"></i> Edit data </a>

                                            
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$proker->id}}"><i class="fas fa-trash"></i> Hapus data </button>


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
                                                            Apakah anda yakin akan menghapus data {{$proker->namapelajar}} ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="{{url('prosesbelajar/delete/'.$proker->id)}}" type="button" class="btn btn-danger">Delete</a>
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




