@extends('layouts.super')
@section('title', 'Edit LetterC | Administrator')
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
            <h1 class="h3 mb-0 text-gray-800">Edit Data Letter C</h1>
        </div>

        <div class="row">
            <div class="col-xl-9 col-lg-7">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Letter C</h6>
                    </div>
                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('letterc.update', $letterc->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_pemilik">Nama Pemilik</label>
                                <input id="nama_pemilik" type="text" class="form-control" name="nama_pemilik" value="{{ $pemetaan->nama_pemilik }}" required>
                            </div>
                            <div class="form-group">
                                <label for="dusun">Dusun</label>
                                <input id="dusun" type="text" class="form-control" name="dusun" value="{{ $pemetaan->dusun }}" required>
                            </div>
                            <div class="form-group">
                                <label for="blok">Blok</label>
                                <input id="blok" type="text" class="form-control" name="blok" value="{{ $pemetaan->blok }}" required>
                            </div>
                            <div class="form-group">
                                <label for="luas">Luas</label>
                                <input id="luas" type="text" class="form-control" name="luas" value="{{ $pemetaan->luas }}" required>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select id="kelas" class="form-control" name="kelas" required>
                                    <option value="d" {{ $pemetaan->kelas == 'd' ? 'selected' : '' }}>Daratan</option>
                                    <option value="s" {{ $pemetaan->kelas == 's' ? 'selected' : '' }}>Sawah</option>
                                    <option value="sp" {{ $pemetaan->kelas == 'sp' ? 'selected' : '' }}>Bangunan / Semi-permanen</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="koordinat">Koordinat</label>
                                <textarea class="form-control" id="koordinat" rows="3" name="koordinat" readonly>{{ $pemetaan->koordinat }}</textarea>
                            </div>

                            <div class="form-group">
                                <div id="map" style="width: 100%; height: 400px;"></div>
                            </div>

                            
                        </form> --}}
                        <form method="POST" action="{{ route('letterc.update', $query->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- no data, no persil, nama pemilik, luas, kelas desa, jenis --}}
                            <div class="row"> 
                            <div class="col">
                                <label for="nomor_letterc">Nomor Letter C</label>
                                <input id="nomor_letterc" type="text" class="form-control" name="nomor_letterc" value="{{ $query->nomor_letterc }}" required>
                            </div>
                            <div class="col">
                                <label for="nomor_persil">Nomor Persil</label>
                                <input id="nomor_persil" type="text" class="form-control" name="nomor_persil" value="{{ $query->nomor_persil }}" required>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_pemilik">Nama Pemilik</label>
                                <input id="nama_pemilik" type="text" class="form-control" name="nama_pemilik" value="{{ $query->nama_pemilik }}" required>
                            </div>
                            <div class="row">
                            <div class="col">
                                <label for="luas">Luas</label>
                                <input id="luas" type="text" class="form-control" name="luas" value="{{ $query->luas }}"required>
                            </div>
                            <div class="col">
                                <label for="kelas_desa">Kelas Desa</label>
                                <select id="kelas_desa" class="form-control" name="kelas_desa" required>
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    <option value="d" {{ $query->kelas_desa == 'd' ? 'selected' : '' }}>Daratan</option>
                                    <option value="s" {{ $query->kelas_desa == 's' ? 'selected' : '' }}>Sawah</option>
                                    <option value="sp" {{ $query->kelas_desa == 'sp' ? 'selected' : '' }}>Bangunan / Semi-permanen</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="jenis_tanah">Jenis Tanah</label>
                                <select id="jenis_tanah" class="form-control" name="jenis_tanah" required>
                                    <option value="" disabled selected>Pilih Jenis Tanah</option>
                                    <option value="s" {{ $query->jenis_tanah == 's' ? 'selected' : '' }}>Sawah</option>
                                    <option value="tk" {{ $query->jenis_tanah == 'tk' ? 'selected' : '' }}>Tanah Kering</option>
                                </select>
                            </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
