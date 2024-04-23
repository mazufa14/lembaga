@extends('admin.layout.appadmin')
@section('content')

<div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
         <a href="{{url('/tbl_mobil')}}">
            <div class="card-body">

                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Total Pendaftar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendaftar_kerja }} Pendaftar</div>
                     </div>
                     <div class="col-auto">
                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                        <i class="fas fa-car fa-2x text-gray-300"></i>
                        <!-- <i class="fab fa-product-hunt"></i> -->
                     </div>
                  </div>
            </div>
            </a>
         </div>
      </div>



@endsection