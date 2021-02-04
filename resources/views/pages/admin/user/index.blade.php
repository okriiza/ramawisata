@extends('layouts.admin')

@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark">User</h1>
      </div>
      <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User</li>
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
                  <h5 class="card-title">Data User </h5>
                  <a href="{{ url('/register')}}" class="btn btn-sm btn-primary shadow-sm float-right">
                     <i class="fas fa-plus fa-sm text-white-50"></i> Tambah User 
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Aksi</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php $no = 1; ?>
                     @forelse ($items as $item)
                        <tr>
                           <td>{{ $no }}</td>
                           <td>{{ $item->name}}</td>
                           <td>{{ $item->email}}</td>
                           <td style="width: 5%"><span class="badge bg-success">{{ $item->roles}}</span></td>
                           <td style="width: 10%">
                              {{-- <a href="{{ route('paket-pariwisata.show', $item->id)}}" class="btn btn-success btn-sm"><i class="fas fa-eye "></i></a> --}}
                              {{-- <a href="{{ route('paket-gallery.edit', $item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a> --}}
                              <form action="{{ route('user.destroy', $item->id)}}" method="post" class="d-inline">  
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
                           <td colspan="5" class="text-center">
                              Data Kosong
                           </td>
                        </tr>
                     @endforelse
                     </table>
                     <span class="text-bold text-sm">Notes : Untuk Mengganti Password Silahkan Untuk Logout terlebih dahulu, <br> dan kembali ke halaman login, lalu klik <span class="text-danger">forgot your password</span>, masukkan <span class="text-danger">email</span> yang akan di ganti passwordnya, <br> Setelah terkirim, cek inbox pada email akan ada email masuk untuk verifikasi email.</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

