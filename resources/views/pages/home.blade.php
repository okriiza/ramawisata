@extends('layouts.app')
@section('title')
Rama Wisata - Tour and Travel
@endsection

@section('content')
<header class="text-center">
   <h1>Explore the Beauty of Indonesia <br>
   With <span class="text-red">Rama Wisata</span> Tour</h1>
   <p class="mt-3">
      Enjoy your trip with <br>
      the beauty of Indonesia
   </p>
   <a href="#paket-pariwisata" class="btn btn-getstarted px-4 mt-4">
      Get Started
    </a>
</header>


<main>
   <div class="container">
      <section id="paket-pariwisata" class="section-paket-pariwisata row">
         <div class="col text-center mt-5">
            <h1 class="text-red">Paket Pariwisata</h1>
            <p class="font-weight-light">Pilih liburan wisatamu sesuai dengan yang kamu mau</p>
         </div>
      </section>

      <section id="list-paket" class="section-paket-content">
         <div class="container">
            <div class="section-paket-list row justify-content-center slider center">
               @foreach ($items as $item)
                  <div class="px-3">
                     <div class="card-pariwisata"
                        style="background-image: url('{{ $item->gallery_packages->count() ? Storage::url($item->gallery_packages->first()->image) : '' }}');">
                        <div class="card-pariwisata-overlay text-center d-flex flex-column">
                           <div class="pariwisata-country mb-2">Tour Indonesia</div>
                           <div class="pariwisata-location">{{ $item->judul}}</div>
                           <div class="pariwisata-button mt-auto">
                              <a href="{{ route('detail', $item->slug )}}" class="btn btn-pariwisata-details px-4">
                                 View Details
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </section>
   </div>
   <section id="pelayanan-kami" class="section-pelayanan-content">
         <div class="container">
            <div class="section-list-pelayanan text-center">
               <div class="section-title-pelayanan">
                  <h1 >Pelayanan Kami</h1>
                  <p>Nikmati Perjalanan Wisatamu Dengan <br> Pelayanan Terbaik kami</p>
               </div>
               <div class="section-card-pelayanan row">
                  <div class="col-md-3 text-center">
                     <div class="icon-pelayanan">
                        <i class="far fa-thumbs-up"></i>
                     </div>
                     <h4 class="pelayanan-title">Pelayanan Terbaik</h4>
                     <p class="pelayanan-des">Kami Mengutamakan Pelayanan terbaik bagi konsumen</p>
                  </div>
                  <div class="col-md-3 text-center">
                     <div class="icon-pelayanan">
                        <i class="fas fa-credit-card"></i>
                     </div>
                     <h4 class="pelayanan-title">Harga Terjangkau</h4>
                     <p class="pelayanan-des">Kami Siap Memberikan Harga  terbaik bagi konsumen</p>
                  </div>
                  <div class="col-md-3 text-center">
                     <div class="icon-pelayanan">
                        <i class="fas fa-eye"></i>
                     </div>
                     <h4 class="pelayanan-title">Pengalaman Baru</h4>
                     <p class="pelayanan-des">Kami Akan Memberikan Experience Baru Kepada Konsumen </p>
                  </div>
                  <div class="col-md-3 text-center">
                     <div class="icon-pelayanan">
                        <i class="fas fa-users"></i>
                     </div>
                     <h4 class="pelayanan-title">Kenyamanan Di Utamakan</h4>
                     <p class="pelayanan-des">Kami Mengutamakan Kenyamanan, Kepuasan Dan Keselamatan  konsumen</p>
                  </div>
               </div>
            </div>
         </div>
   </section>
   <section id="galeri" class="section-galeri">
      <div class="container">
         <div class="section-judul-galeri text-center">
            <h1 class="text-red">Foto Dokumentasi</h1>
            <p>Dokumentasi kegiatan pariwisata  Rama Wisata</p>
         </div>
         <div id="my_nanogallery2" data-nanogallery2>
            @foreach ($gallerys as $gallery)
               <a href="{{ Storage::url($gallery->image)}}" data-ngthumb="{{ Storage::url($gallery->image)}}"></a>
            @endforeach
         </div>
      </div>
   </section>
   <section id="galeri" class="section-galeri">
      <div class="container">
         <div class="section-judul-galeri text-center">
            <h1 class="text-red">Video Dokumentasi</h1>
            <p>Dokumentasi kegiatan pariwisata  Rama Wisata</p>
            <div id="nanogallery" data-nanogallery2>
               @foreach ($videos as $video)
                  <a href="{{ $video->url}}">{{ $video->title}}</a>
               @endforeach
               

            </div>
         </div>
      </div>  
   </section> 
</main>
@endsection