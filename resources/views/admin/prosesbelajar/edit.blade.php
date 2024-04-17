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

@foreach ($proses_belajar as $proker)

<div class="card"> 
    <div class="card-content">
        <div class="card-body">
       
        
                <form class="form" method="POST" action="{{url('prosesbelajar/update/'.$proker->id)}}" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="card-header">
                            <h4 class="card-title">Edit Proses belajar</h4>
                        </div>
                
                            <div class="card-body">
                                <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <select id="nama" disabled  class="form-control @error('nama') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Nama Siswa</option>   

                                                @foreach ($pendaftar_belajar as $p)
                                                @php $sel = ($p->id == $proker->nama_murid) ? 'selected' : ''; @endphp                                                     
                                                <option value="{{$p->id}}" {{$sel}}>{{$p->pendaftar_belajar}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>    

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="program_belajar">Program belajar</label>
                                            <select id="program_belajar" name="program_belajar" class="form-control @error('program_belajar') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Program Kerja</option>   

                                                @foreach ($program_belajar as $p)
                                                @php $sel = ($p->id == $proker->program_proses_belajar) ? 'selected' : ''; @endphp                                                     
                                                <option value="{{$p->id}}" {{$sel}}>{{$p->nama_program_belajar}}</option>
                                                @endforeach

                                            </select>
                                            @error('program_belajar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="justify-content-center text-center mb-3">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" rows="5" id="deskripsi"  class="form-control @error('deskripsi') is-invalid @enderror">{{$proker->deskripsi}}</textarea>
                                    </div>
                                    @error('deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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