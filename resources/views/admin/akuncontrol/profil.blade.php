@extends('admin.layout.appadmin')
@section('content')

<div class="card p-4">
    <h5 class="card-title text-center mb-4">Ganti Password</h5>
    <form class="form" method="POST" action="{{url('/password/update')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="current_password">Password Saat Ini:</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>
        <div class="form-group">
            <label for="new_password">Password Baru:</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Konfirmasi Password Baru:</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>


@endsection