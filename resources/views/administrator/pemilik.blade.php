@extends('layouts.super')
@section('title', 'Daftar Pemilik | Administrator')
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
        <h1 class="h3 mb-2 text-gray-800">Daftar Pemilik</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pemilik</h6>
                <hr>
                <a class="btn btn-success" href="{{ route('pemilik.tambah') }}" role="button"><i class="fas fa-file"></i> Tambah Pemilik</a>
                <a class="btn btn-secondary" href="{{ route('pemilik.cetak') }}" role="button"><i class="fas fa-print"></i> Cetak Rekap Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemilik</th>
                                <th>Persil</th>
                                <th>Luas</th>
                                <th>Nomor Letter C</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemilik as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $item->nama_pemilik }}</td>
                                <td>
                                    @foreach ($item->pemetaan as $p)
                                        {{ $p->persil }}{{ $p->kelas }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $item->luas }}</td>
                                <td>{{ $item->nomor_letterc }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('pemilik.edit', $item->id_pemilik) }}" role="button">Edit</a>
                                    <form id="form-hapus-{{ $item->id_pemilik }}" method="post" action="{{ route('pemilik.delete', $item->id_pemilik) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger" onclick="konfirmasiHapus({{ $item->id_pemilik }})">Hapus</button>
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
@push('message')
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        });
    </script>
@endif
@endpush