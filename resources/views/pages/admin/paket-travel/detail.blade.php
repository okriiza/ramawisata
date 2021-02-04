@extends('layouts.admin')

@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark">Paket Pariwisata</h1>
      </div>
      <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item ">Paket Pariwisata</li>
            <li class="breadcrumb-item active">Detail</li>
         </ol>
      </div>
      </div>
   </div>
</div>
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg">
            <div class="card card-warning card-outline">
               <div class="card-header">
                  <h5 class="card-title">Detail Data Paket Pariwisata</h5>
                  <a href="{{ route('paket-pariwisata.index')}}" class="btn btn-sm btn-warning shadow-sm float-right">
                     <i class="fas fa-undo-alt fa-sm "></i> Kembali
                  </a>
               </div>
               
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <table class="table table-bordered table-responsive">
                           <tr>
                              <th>Nama Paket</th>
                              <td>{{ $item->judul}}</td>
                           </tr>
                           <tr>
                              <th style="width:15%">Tentang Paket</th>
                              <td class="text-justify">{!! $item->tentang_wisata !!}</td>
                           </tr>
                           <tr>
                              <th>Fasilitas</th>
                              <td class="ml-3">{!! $item->fasilitas !!}</td>
                           </tr>
                           <tr>
                              <th>Notes</th>
                              <td>{{$item->notes}}</td>
                           </tr>
                     </table>
                     </div>
                     <div class="col-md-6">
                        @foreach ($item->price_packages as $harga)
                        <table class="table table-bordered table-responsive">
                           <tr>
                              <th style="width:30%">Hari / Tempat / Keterangan</th>
                              <th>Seat 59</th>
                              <th>Seat 47</th>
                              <th>Seat 30</th>
                           </tr>
                           <tr>
                              <td>{{ $harga->price_title}}</td>
                              <td class="text-justify">Rp. {{ number_format($harga->seat_59,0,".",".") }}</td>
                              <td>Rp. {{ number_format($harga->seat_47,0,".",".")}}</td>
                              <td>Rp. {{ number_format($harga->seat_30,0,".",".")}}</td>
                           </tr>
                     </table>
                        @endforeach
                        <h4>Foto Pariwisata</h4>
                        <hr>
                        @foreach ($item->gallery_packages as $galeri)
                           <img src="{{ Storage::url($galeri->image) }}" style="width:150px" class="img-thumbnail mb-2"> 
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection