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
            <li class="breadcrumb-item active">edit</li>
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
                  <h5 class="card-title">Edit Data Paket Gallery</h5>
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
                  <form action="{{ route('paket-gallery.update',$item->id) }}" method="post" enctype="multipart/form-data">
                     @method('PUT')
                     @csrf
                     <div class="form-group">
                        <label for="travel_packages_id">Paket Pariwisata</label>
                        <select readonly disabled name="travel_packages_id" required class="form-control">
                           <option  value="{{ $item->tour_packages_id }}">{{ $item->tour_packages->judul}}</option>
                           {{-- @foreach ($tour_packages as $tour_package)
                                 <option value="{{ $tour_package->id }}">
                                    {{ $tour_package->judul }}
                                 </option>
                           @endforeach --}}
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" name="image" placeholder="Image">
                     </div>
                     <button type="submit" class="btn btn-primary ">Ubah</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection