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
            <li class="breadcrumb-item active">Gallery Video</li>
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
                  <h5 class="card-title">Data Gallery Video</h5>
                  <a href="{{ route('video.create')}}" class="btn btn-sm btn-primary shadow-sm float-right">
                     <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Gallery Video
                  </a>
               </div>
               <div class="card-body">
                  @if (session('status'))
                     <div class="alert alert-success">
                        {{ session('status') }}
                     </div>
                  @endif
                  <table id="list-data" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                        <th style="width:5%;">No</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Aksi</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php $no = 1; ?>
                     @forelse ($items as $item)
                        <tr>
                           <td>{{ $no }}</td>
                           <td>{{ $item->title }}</td>
                           <td>{{ $item->url }}</td>
                           <td style="width: 15%">
                              {{-- <a href="{{ route('paket-pariwisata.show', $item->id)}}" class="btn btn-success btn-sm"><i class="fas fa-eye "></i></a> --}}
                              <a href="{{ route('video.edit', $item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                              <form action="{{ route('video.destroy', $item->id)}}" method="post" class="d-inline">  
                                 @csrf
                                 @method('delete')
                                 {{-- <a href="" onclick="return confirm('yakin akan hapus Paket Ini ? ')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                 <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                 </button>
                              </form>
                           </td>
                        </tr>
                        <?php $no++ ?>
                     @empty
                        <tr>
                           <td colspan="4" class="text-center">
                              Data Kosong
                           </td>
                        </tr>
                     @endforelse
                     </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

