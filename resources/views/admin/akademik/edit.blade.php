@extends('admin.layout.appadmin')
@section('content')



@foreach ($akademik as $proker)

    <div class="card"> 
        <div class="card-content">
            <div class="card-body">

                    <form class="form" method="POST" action="{{url('akademik/update/'.$proker->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Edit Hasil Test Potensi Akademik</h4>
                        </div>
                        
                             <div class="card-body">
                                <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>
                                   
                                    <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="user_id">Akun</label>
                                            <select  id="user_id"  name="user_id" class="form-control @error('user_id') is-invalid @enderror" readonly>
                                                  
                                                @foreach ($users as $p)
                                                @php $sel = ($p->id == $proker->user_id) ? 'selected' : ''; @endphp                                                     
                                                <option value="{{$p->id}}" {{$sel}}>{{$p->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="user_id">Akun</label>
                                            <input type="text" id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ $proker->user_id }}" readonly>
                                        </div>
                                    </div> -->

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nilai (TPA)</label>
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
                                            <label for="status">Status </label>
                                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                                <option value="Lulus" {{ $proker->status == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                                                <option value="Belum lulus" {{ $proker->status == 'Belum lulus' ? 'selected' : '' }}>Belum lulus</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                      
                                    <div class="col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="akademik">Hasil Test (TPA) </label>
                                                <input type="file" name="akademik" id="akademik" class="form-control @error('akademik') is-invalid @enderror mb-3">

                                                @if(!empty($proker->fototest))                       
                                                <a href="{{ url('admin/akademik') }}/{{ $proker->fototest }}" target="_blank"> <i class="fas fa-file-pdf"></i> Download PDF</a>
                                                @else
                                                    File PDF belum ada
                                                @endif

                                                @error('akademik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                       

                                            <div class="col-12 ">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            </div>
                                        
                                    </div>
                        </form>
            </div>
        </div>
    </div>
@endforeach



@endsection