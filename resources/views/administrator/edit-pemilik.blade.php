@extends('layouts.super')
@section('title', 'Edit Data Pemilik | Administrator')
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
            <h1 class="h3 mb-0 text-gray-800">Edit Data Pemilik Tanah</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4 h-100">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Pemilik</h6> 
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form method="post" action="{{ route('pemilik.update', $pemilik->id_pemilik) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_pemilik">Nama Pemilik</label>
                            <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" value="{{ $pemilik->nama_pemilik }}" placeholder="Masukkan Nama Pemilik" required>
                        </div>

                        <div class="form-group">
                            <label for="id_pemetaan">No. Persil</label>
                            <select id="id_pemetaan" class="form-control" name="id_pemetaan" required>
                                <option value="" disabled>Pilih No. Persil</option>
                                @foreach($pemetaan as $item)
                                    <option value="{{ $item->id_pemetaan }}" {{ $item->id_pemetaan == $pivot ? 'selected' : '' }}>
                                        {{ $item->persil }} - Blok {{ $item->blok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="luas">Luas</label>
                            <input id="luas" type="number" class="form-control" name="luas" value="{{ $pemilik->luas }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nomor_letterc">No. Letter C</label>
                            <input type="number" name="nomor_letterc" class="form-control" id="nomor_letterc" value="{{ $pemilik->nomor_letterc }}" placeholder="Masukkan Nomor Letter C" required>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ $pemilik->keterangan }}" placeholder="Masukkan Keterangan" required>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
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