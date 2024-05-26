@extends('admin.layout.appadmin')
@section('content')


  


    <div class="card"> 
        <div class="card-content">
            <div class="card-body">

                    <form class="form" method="POST" action="{{url('akademik/store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            @if (Auth::user()->role == 'admin')
                            <h4 class="card-title">Hasil Test Siswa</h4>
                            @endif

                            @if (Auth::user()->role == 'siswa')
                            <h4 class="card-title"> <i class="fas fa-user fa-1x" ></i> Tes Potensi Akademik</h4>
                            @endif
                        </div>
                        
                             <div class="card-body">
                                @if (Auth::user()->role == 'admin')
                                <p>Admin dapat melakukan <code> Kelola Data </code> data dengan <code> Operasi </code> yang diberikan</p>
                                @endif 

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="user_id">Akun Siswa</label>
                                        <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                            <option value="" disabled {{ old('user_id') == null ? 'selected' : '' }}>Pilih Akun</option>
                                            @foreach ($users as $p)                                                       
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
                                        <label for="foto">Nilai</label>
                                    <input type="numebr" value="{{ old('nilai')}}" name="nilai" id="nilai" class="form-control @error('nilai') is-invalid @enderror">
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
                                        <option value="" disabled selected>Pilih Status</option>
                                            <option value="Lulus">Lulus</option>
                                            <option value="Belum lulus">Belum lulus</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="akademik">Hasil Test </label>
                                    <input type="file" value="{{ old('akademik')}}" name="akademik" id="akademik" class="form-control @error('akademik') is-invalid @enderror">
                                    @error('akademik')
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
                                </div>
                        </form>
            </div>
        </div>
    </div>
            
@endsection




