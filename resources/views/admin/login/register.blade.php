<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/hikkari.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('admin/assets/css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <title>Regitrasi Akun - Hikkari Gakkai</title>
    <style>
        body {
            background-image:  url('{{ asset('depan/images/depanbaru.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>

       
<div class="container py-5">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">

                    <div>
                        <a href="{{ url('/') }}"><i class="fas fa-arrow-left fa-sm" style="color: #19191a;"></i></a>
                    </div>

                    <div class="text-center mb-5">
                   
                    <img src="{{asset('admin/assets/images/hikkari.png')}}" height="130" class="mb-4 rounded-circle">

                       
                        <h3>Registrasi</h3>
                        <p>Lembaga Hikkari Gakkai</p>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                    </div>

                    <form action="" method="POST">
                    @csrf

                    <div class="form-group position-relative ">
                            <label for="username" class="form-label">Username </label>
                            <div class="position-relative">
                                <input type="text" value="{{ old('username')}}" name="username" class="form-control" id="email">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>

                        

                        <div class="form-group position-relative ">
                            <div class="clearfix">
                                <label for="password" class="form-label">Password</label>
                            </div>
                            <div class="position-relative">
                                <input type="password" name="password"class="form-control" id="password">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative ">
                            <div class="clearfix">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                            </div>
                            <div class="position-relative">
                                <input type="password" name="password_confirmation"class="form-control" id="password_confirmation">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>

                        <div class='form-check clearfix my-4'>
                            <div class="checkbox float-start">
                                <input type="checkbox" id="checkbox1" class='form-check-input' >
                                <label for="checkbox1">Remember me</label>
                            </div>
                            <div class="float-end">
                                <a href="{{url('/login')}}">Already have an account?</a>
                            </div>
                        </div>
                        <div class="clearfix">
                            <button class="btn btn-primary float-end" type="submit">Register</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Feather Icons -->

</body>
</html>