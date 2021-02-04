@extends('layouts.admin')

@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark">Paket Gallery</h1>
      </div>
      <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item ">Paket Gallery</li>
            <li class="breadcrumb-item active">Tambah</li>
         </ol>
      </div>
      </div>
   </div>
</div>
<div class="content">
   <div class="container-fluid">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="card card-warning card-outline">
               <div class="card-header">
                  <h5 class="card-title">Tambah Data Paket Gallery</h5>
                  <a href="{{ route('paket-gallery.index')}}" class="btn btn-sm btn-warning shadow-sm float-right">
                     <i class="fas fa-undo-alt fa-sm "></i> Kembali
                  </a>
               </div>
               
               <div class="card-body">
                  @if ($errors->any())
                     <div class="alert alert-danger">
                           <ul>
                              @foreach ($errors->all() as $error )
                                 <li>{{ $error }}</li>
                              @endforeach
                           </ul>
                     </div>
                  @endif
                  <form action="{{ route('paket-gallery.store') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="tour_package_id">Paket Pariwisata</label>
                        <select name="tour_package_id" required class="form-control">
                           <option  value="">Pilih Paket Pariwisata</option>
                           @foreach ($tour_package as $tour_packages)
                                 <option value="{{ $tour_packages->id }}">
                                    {{ $tour_packages->judul }}
                                 </option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" name="image" placeholder="Image">
                     </div>
                     <button type="submit" class="btn btn-primary ">Simpan</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection