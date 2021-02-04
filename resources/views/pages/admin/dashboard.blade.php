@extends('layouts.admin')

@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark">Dashboard</h1>
      </div>
      <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
         </ol>
      </div>
      </div>
   </div>
</div>

<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg">
            <div class="card card-primary card-outline">
               <div class="card-header">
                  <h5 class="m-0">Welcome !</h5>
               </div>
               <div class="card-body">
                  {{-- <h6 class="card-title">Welcome pada halaman admin pariwisataku</h6> --}}
                  <p class="card-text">Selamat Datang Di halaman Admin <b>Rama Wisata</b>.</p>
                  {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection