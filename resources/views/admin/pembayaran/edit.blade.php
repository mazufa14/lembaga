@extends('admin.layout.appadmin')
@section('content')



@foreach ($pembayaran as $proker)

    <div class="card"> 
        <div class="card-content">
            <div class="card-body">

                    <form class="form" method="POST" action="{{url('pembayaran/update/'.$proker->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Edit Pendaftar Kerja</h4>
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




                                        @if (Auth::user()->role == 'admin')
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="status">Status verifikasi data</label>
                                                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                                    <option value="unverified" {{ $proker->status == 'unverified' ? 'selected' : '' }}>Unverified</option>
                                                    <option value="verified" {{ $proker->status == 'verified' ? 'selected' : '' }}>Verified</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        @elseif (Auth::user()->role == 'siswa')
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="status">Status verifikasi data</label>
                                                    <input type="text" id="status" name="status" class="form-control" value="{{ $proker->status }}" readonly>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Keterangan<code> *Jika tidak ada cukup dengan (-) </code></label>
                                                <textarea name="keterangan" rows="2" id="first-name-column" class="form-control @error('keterangan') is-invalid @enderror">{{$proker->keterangan}}</textarea>
                                                @error('keterangan')
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