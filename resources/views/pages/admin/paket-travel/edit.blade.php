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
            <li class="breadcrumb-item active">edit</li>
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
                  <h5 class="card-title">Edit Data Paket Pariwisata</h5>
                  <a href="{{ route('paket-pariwisata.index')}}" class="btn btn-sm btn-warning shadow-sm float-right">
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
                  <form action="{{ route('paket-pariwisata.update',$item->id) }}" method="post" enctype="multipart/form-data">
                     @method('PUT')
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="Judul">Judul*</label>
                              <input type="text" class="form-control form-control-sm" name="judul" placeholder="Judul" value="{{ $item->judul }}">
                           </div>
                           <div class="form-group">
                              <label for="tentang_wisata">Tentang Wisata*</label>
                              <textarea class="textarea" name="tentang_wisata" placeholder="Tentang Wisata"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $item->tentang_wisata }}</textarea>
                           </div>
                           <div class="form-group">
                              <label for="fasilitas">Fasilitas*</label>
                              <textarea class="textarea" name="fasilitas" placeholder="fasilitas"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $item->fasilitas }}</textarea>
                           </div>

                        </div>
                        <div class="col-md-6" >
                           <div id="list-harga-paket">
                              @foreach ($item->price_packages as $harga)
                              <div class="list-harga-paket">
                                 <div class="form-group">
                                    <input type="hidden" name="id[]" value="{{ $harga->id}}">
                                    <label for="price_title">Hari / Tempat / Keterangan*</label>
                                    {{-- <div class="btn btn-success btn-sm btn-tambah float-right mb-1" id="add"><i class="fa fa-plus"></i></div> --}}
                                    <input type="text" name="price_title[]" id="" class="form-control form-control-sm" placeholder="Hari / Tempat / Keterangan" value="{{ $harga->price_title }}">
                                    <small class="text-muted">Contoh : weekday, weekend, pelajar, umum, hotel</small>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="seat_59">Seat 59*</label>
                                          <input type="number" name="seat_59[]" id="" class="form-control form-control-sm" placeholder="Inputkan Harga" value="{{ $harga->seat_59 }}">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="seat_47">Seat 47*</label>
                                          <input type="number" name="seat_47[]" id="" class="form-control form-control-sm" placeholder="Inputkan Harga" value="{{ $harga->seat_47 }}">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="seat_30">Seat 30*</label>
                                          <input type="number" name="seat_30[]" id="" class="form-control form-control-sm" placeholder="Inputkan Harga" value="{{ $harga->seat_30 }}">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                           <div class="form-group">
                              <label for="notes">Notes</label>
                              <input type="text" name="notes" id="" class="form-control form-control-sm" placeholder="Notes" value="{{$item->notes}}">
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm ">Ubah</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection