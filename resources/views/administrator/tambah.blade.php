@extends('layouts.super')
@section('title', 'Tambah Berita | Administrator')
@section('content')
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    <img class="img-profile rounded-circle"
                        src="{{asset('template/img/undraw_profile.svg')}}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Berita</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4 h-100">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Berita</h6> 
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form method="post" action="{{ route('berita.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="nama_author">Nama Author</label>
                              <input type="text" name="nama_author" class="form-control" id="nama_author" aria-describedby="nama_author" placeholder="author" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="form-group">
                              <label for="judul">Judul</label>
                              <input type="text" name="judul" class="form-control" id="judul" aria-describedby="judul" placeholder="Masukkan Judul">
                            </div>
                            <div class="form-floating">
                                <label for="floatingTextarea2">Isi Berita</label>
                                <textarea class="form-control" placeholder="Masukkan Isi Berita..." name="isi_berita" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="kategori">Kategori</label>
                              <input type="text" name="kategori" class="form-control" id="kategori" aria-describedby="kategori" placeholder="Masukkan Judul">
                            </div>
                            <div class="form-group">
                                <label for="formFile" class="form-label">Dokumentasi</label>
                                <input class="form-control" type="file" name="dokumentasi" id="formFile">
                            </div>
                            
                            <br><br>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
@endsection
@push('notifikasi')
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Ada data yang belum diisi atau salah, cek kembali ya!',
                    showConfirmButton: true
                });
            });
        </script>
    @endif
@endpush
