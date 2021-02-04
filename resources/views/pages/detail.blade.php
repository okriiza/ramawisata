@extends('layouts.app')
@section('title')
Detail Pariwisata
@endsection
@section('content')
<main>
   <section class="section-details-header"></section>
      <section class="section-details-content">
         <div class="container">
            <div class="row">
               <div class="col p-0">
                  <nav>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item">Paket Pariwisata</li>
                     <li class="breadcrumb-item active">Detail</li>
                  </ol>
                  </nav>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-8 pl-lg-0">
                  <div class="card card-details">
                  <h1>{{ $items->judul}}</h1>
                  <p>Tour Indonesia</p>
                  @if ($items->gallery_packages->count())
                  <div class="gallery">
                     <div class="xzoom-container">
                        <img src="{{ Storage::url($items->gallery_packages->first()->image) }}" class="xzoom" id="xzoom-default"
                        xoriginal="{{ Storage::url($items->gallery_packages->first()->image) }}" />
                     </div>
                     <div class="xzoom-thumbs">
                        @foreach ($items->gallery_packages as $gallery)
                           <a href="{{ Storage::url($gallery->image) }}">
                              <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery" width="128"
                                 xpreview="{{ Storage::url($gallery->image) }}" />
                           </a>
                        @endforeach
                     </div>
                  </div>
                  @endif
                  <h2>Tentang Wisata</h2>
                  <p>
                     {!! $items->tentang_wisata !!}
                  </p>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card card-details card-right ">
                     <h1 class="mb-2 judul-informasi">Informasi {{ $items->judul}}</h1>
                     <hr />
                     @foreach ($items->price_packages as $price)
                     <h2 class="subjudul-infomasi">{{ $price->price_title}}</h2>
                     <table class="trip-informations">
                        <tr>
                           <th width="50%">Seat 59</th>
                           <td width="50%" class="text-right">Rp. {{ number_format($price->seat_59, 0, ".", ".")}}</td>
                        </tr>
                        <tr>
                           <th width="50%">Seat 47</th>
                           <td width="50%" class="text-right">Rp. {{ number_format($price->seat_47, 0, ".", ".")}}</td>
                        </tr>
                        <tr>
                           <th width="50%">Seat 30</th>
                           <td width="50%" class="text-right">Rp. {{ number_format($price->seat_30, 0, ".", ".")}}</td>
                        </tr>
                     </table>
                     <hr />
                     @endforeach

                     <h2 class="subjudul-infomasi">Fasilitas</h2>
                     <div class="trip-informations">
                        {!! $items->fasilitas !!}
                     </div>
                     
                     <p class="nb text-justify mt-3">NB: {{$items->notes}}</p>
                  </div>
                  <div class="btn-informasi-join">
                     <a href="https://wa.me/081222223403" class="btn btn-block btn-whatsapp mt-3"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                     <a href="tel:+6281222223403" class="btn btn-block btn-telpon mt-3"><i class="fas fa-phone-alt"></i> Telepon</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/assets/plugin/xzoom/xzoom.css') }}" />
@endpush


@push('addon-script')
<script src="{{ url('frontend/assets/plugin/xzoom/xzoom.min.js') }}"></script>
   <script>
      $(document).ready(function () {
         $(".xzoom, .xzoom-gallery").xzoom({
               zoomWidth: 500,
               title: false,
               tint: "#333",
               Xoffset: 15
         });
      });

   </script>    
@endpush