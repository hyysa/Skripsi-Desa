@extends('layouts.super')
@section('title', 'Dashboard | Administrator')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Berita</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$berita->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Pemilik</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pemilik->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Video</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$video->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-video fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Total Letter C</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$letterc->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Jumlah Jenis Tanah</h6>
                    </div>
                    <div class="card-body">
                        <div class="pb-2 d-flex flex-column">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                 </div>
            </div>

            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Distribusi Luas Tanah</h6>
                    </div>
                    <div class="card-body">
                        <div class="pb-2 d-flex flex-column">
                            <canvas id="histogramChart"></canvas>
                        </div>
                    </div>
                 </div>
            </div>
    
            {{-- <div class="col-xl-4 col-lg-7">
                <div class="card shadow mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Proporsi Luas (Kelas Desa)</h6>
                    </div>
                    <div class="card-body">
                        <div class="pb-2 d-flex flex-column">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                 </div>
            </div> --}}
        </div>        
     <script>
     // Bar Chart
     new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! json_encode($data) !!},
                backgroundColor: '#4CAF50'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
     });

     // Pie Chart
    //  new Chart(document.getElementById('pieChart'), {
    //     type: 'pie',
    //     data: {
    //         labels: {!! json_encode($kelasLabels) !!},
    //         datasets: [{
    //             data: {!! json_encode($kelasData) !!},
    //             backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#9C27B0']
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         plugins: {
    //             legend: { position: 'bottom' }
    //         }
    //     }
    //  });

            // Histogram
            const luasData = {!! json_encode($luasTanah) !!};
            const binSize = 100;
            const maxLuas = Math.max(...luasData);
            const bins = Array.from({length: Math.ceil(maxLuas / binSize)}, (_, i) => ({
                range: `${i * binSize}-${(i + 1) * binSize - 1}`,
                count: 0
            }));
            luasData.forEach(value => {
                const index = Math.floor(value / binSize);
                if (bins[index]) bins[index].count++;
            });
            new Chart(document.getElementById('histogramChart'), {
                type: 'bar',
                data: {
                    labels: bins.map(b => b.range),
                    datasets: [{
                        label: 'Jumlah',
                        data: bins.map(b => b.count),
                        backgroundColor: '#FF9800'
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: { title: { display: true, text: 'Luas (da²)' } },
                        y: { beginAtZero: true, title: { display: true, text: 'Jumlah' } }
                    }
                }
            });
            </script>


            <!-- Content Row -->
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Berita</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @foreach ($berita as $item)
                                        <tr>
                                            <td>{{$item->created_at}}</td>
                                            <td>{{$item->judul}}</td>
                                            <td>{{$item->kategori}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Jadwal Pelayanan</h6>
                    </div>
                    <div class="card-body">
                        <div class="pb-2 d-flex flex-column">
                            
                            <span class="mb-2">
                                <i class="fas fa-circle text-primary"></i> Senin - Kamis :
                                <span>08.00 WIB - 14.00 WIB</span>
                            </span>
                            <span class="mb-2">
                                <i class="fas fa-circle text-success"></i> Jum'at :
                                <span>08.00 WIB - 11.00 WIB</span>
                            </span>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>

    <!-- /.container-fluid -->
</div>
@endsection