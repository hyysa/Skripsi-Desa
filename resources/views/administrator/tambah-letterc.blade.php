@extends('layouts.super')
@section('title', 'Tambah Letter C | Administrator')
@section('content')
<div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    <img class="img-profile rounded-circle" src="{{ asset('template/img/undraw_profile.svg') }}">
                </a>
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

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Letter C</h1>
        </div>

        <div class="row">
            <div class="col-xl-9 col-lg-7">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('letterc.store') }}">
                            @csrf
                            {{-- no data, no persil, nama pemilik, luas, kelas desa, jenis --}}
                            <div class="row"> 
                            <div class="col">
                                <label for="nomor_letterc">Nomor Letter C</label>
                                <input id="nomor_letterc" type="text" class="form-control" name="nomor_letterc" required>
                            </div>
                            <div class="col">
                                <label for="nomor_persil">Nomor Persil</label>
                                <input id="nomor_persil" type="text" class="form-control" name="nomor_persil" required>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_pemilik">Nama Pemilik</label>
                                <input id="nama_pemilik" type="text" class="form-control" name="nama_pemilik" required>
                            </div>
                            <div class="row">
                            <div class="col">
                                <label for="luas">Luas</label>
                                <input id="luas" type="text" class="form-control" name="luas" required>
                            </div>
                            <div class="col">
                                <label for="kelas_desa">Kelas Desa</label>
                                <select id="kelas_desa" class="form-control" name="kelas_desa" required>
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    <option value="d">Daratan</option>
                                    <option value="s">Sawah</option>
                                    <option value="sp">Bangunan / Semi-permanen</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="jenis_tanah">Jenis Tanah</label>
                                <select id="jenis_tanah" class="form-control" name="jenis_tanah" required>
                                    <option value="" disabled selected>Pilih Jenis Tanah</option>
                                    <option value="s">Sawah</option>
                                    <option value="tk">Tanah Kering</option>
                                </select>
                            </div>
                            </div>
                            <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mt-5">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
