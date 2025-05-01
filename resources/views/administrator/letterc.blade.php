@extends('layouts.super')
@section('title', 'Letter C | Administrator')
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
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h2>Data Letter C</h2>
                        <a class="btn btn-success" href="{{ route('letterc.tambah') }}" role="button">
                            <i class="fa-solid fa-file-circle-plus"></i>Tambah Data</a>
                    </div>
            <div class="card-body">
                {{-- <form method="GET" action="{{ route('letterc.index') }}" class="row mb-4 g-2">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Cari Nomor Letterc / Persil / Pemilik" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="kelas_desa" class="form-select">
                            <option value="">Pilih Kelas Desa</option>
                            <option value="Daratan" {{ request('kelas_desa') == 'Daratan' ? 'selected' : '' }}>Daratan</option>
                            <option value="Sawah" {{ request('kelas_desa') == 'Sawah' ? 'selected' : '' }}>Sawah</option>
                            <option value="Bangunan" {{ request('kelas_desa') == 'Bangunan' ? 'selected' : '' }}>Bangunan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="jenis_tanah" class="form-select">
                            <option value="">Pilih Jenis Tanah</option>
                            <option value="Sawah" {{ request('jenis_tanah') == 'Sawah' ? 'selected' : '' }}>Sawah</option>
                            <option value="Tanah Kering" {{ request('jenis_tanah') == 'Tanah Kering' ? 'selected' : '' }}>Tanah Kering</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </form> --}}
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nomor Letter C</th>
                                <th>Nomor Persil</th>
                                <th>Nama Pemilik</th>
                                <th>Luas</th>
                                <th>Kelas Desa</th>
                                <th>Jenis Tanah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($letterc as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $item->nomor_letterc }}</td>
                                    <td>{{ $item->nomor_persil }}</td>
                                    <td>{{ $item->nama_pemilik }}</td>
                                    <td>{{ $item->luas }}</td>
                                    <td>{{ $item->kelas_desa }}</td>
                                    <td>{{ $item->jenis_tanah }}</td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('letterc.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                        <form method="post" action="{{ route('letterc.delete', $item->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
@endsection