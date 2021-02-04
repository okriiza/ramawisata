@extends('layouts.admin')

@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark">Gallery Video</h1>
      </div>
      <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item ">Gallery Video</li>
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
                  <h5 class="card-title">Tambah Data Gallery Video</h5>
                  <a href="{{ route('video.index')}}" class="btn btn-sm btn-warning shadow-sm float-right">
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
                  <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div id="url-video">
                        <div class="url-video">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title[]" placeholder="Title" value="{{ old('title')}}">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="url">Url</label>
                                    <div class="btn btn-success btn-sm btn-tambah float-right mb-1" id="add"><i class="fa fa-plus"></i></div>
                                    <input type="text" class="form-control" name="url[]" placeholder="Url" value="{{ old('url') }}">
                                 </div>
                              </div>
                           </div>
                        </div>
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