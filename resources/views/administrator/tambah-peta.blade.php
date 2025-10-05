@extends('layouts.super')
@section('title', 'Tambah Pemetaan | Administrator')
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
            <h1 class="h3 mb-0 text-gray-800">Tambah Peta</h1>
        </div>

        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Peta</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pemetaan.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="blok">Blok</label>
                                <input id="blok" type="text" class="form-control" name="blok" placeholder="Masukkan Blok" required>
                            </div>
                            <div class="form-group">
                                <label for="persil">No. Persil</label>
                                <input id="persil" type="text" class="form-control" name="persil" placeholder="Masukkan No. Persil" required>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select id="kelas" class="form-control" name="kelas" required>
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    <option value="d">Daratan</option>
                                    <option value="s">Sawah</option>
                                    <option value="sp">Bangunan / Semi-permanen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div id="map" style="width: 100%; height: 400px;"></div>
                            </div>
                            <div class="form-group">
                                <label for="koordinat">Koordinat</label>
                                <textarea class="form-control" id="koordinat" rows="3" name="koordinat" readonly></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- blok yang sudah ada --}}
            <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Blok dan Persil</h6>
                        </div>
                        <div class="card-body">
                            <div class="pb-2 d-flex flex-column">
                                
                                <span class="mb-2">
                                    <i class="fas fa-circle text-primary"></i> Data blok dan persil yang sudah ada
                                </span>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Blok</th>
                                                <th>Persil</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($pemetaan as $item)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{ $item->blok }}</td>
                                                <td>{{ $item->persil }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>


        @push('script')
        <script>
             const existingPolygons = {!! $existingPolygons !!};
            document.addEventListener('DOMContentLoaded', function () {
                var map = L.map('map').setView([-8.183608213057614, 112.19258084611654], 16);
                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: '© <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
                    maxZoom: 23,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: '#'
                }).addTo(map);

                var drawnItems = new L.FeatureGroup();
                map.addLayer(drawnItems);

                // Tampilkan data poligon lama
                L.geoJSON(existingPolygons, {
                    style: function (feature) {
                        // Fungsi generate warna hex acak
                        function getRandomColor() {
                            const letters = '0123456789ABCDEF';
                            let color = '#';
                            for (let i = 0; i < 6; i++) {
                                color += letters[Math.floor(Math.random() * 16)];
                            }
                            return color;
                        }

                        return {
                            color: '#333',                     // Warna garis pinggir
                            fillColor: getRandomColor(),       // Warna isi acak
                            fillOpacity: 0.5,
                            weight: 1
                        };
                    },
                    onEachFeature: function (feature, layer) {
                        layer.bindPopup(
                            `<strong>Blok:</strong> ${feature.properties.blok}<br>
                            <strong>Persil:</strong> ${feature.properties.persil}<br>
                            <strong>Kelas:</strong> ${feature.properties.kelas}`
                        );
                        layer.pm.disable(); // disable editing
                    }
}).addTo(map);

                // Konfigurasi drawing polygon baru
                map.pm.addControls({
                    position: 'topleft',
                    drawMarker: false,
                    drawCircle: false,
                    drawRectangle: false,
                    drawPolyline: false,
                    drawCircleMarker: false,
                    drawPolygon: true,
                    editMode: true,
                    removalMode: true
                });

                function updateCoordinates(layer) {
                    var geoJson = layer.toGeoJSON();
                    document.getElementById('koordinat').value = JSON.stringify(geoJson.geometry);
                }

                map.on('pm:create', function (e) {
                    drawnItems.clearLayers();
                    drawnItems.addLayer(e.layer);
                    updateCoordinates(e.layer);
                });

                map.on('pm:edit', function (e) {
                    e.layers.eachLayer(function (layer) {
                        updateCoordinates(layer);
                    });
                });

                map.on('pm:remove', function (e) {
                    document.getElementById('koordinat').value = '';
                });
            });

        </script>
        @endpush
    </div>
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

@push('style')
<style>
    /* Agar kolom search tidak terlalu panjang */
    div.dataTables_filter {
        float: right;
        text-align: right;
    }

    div.dataTables_filter input {
        width: auto !important;
        max-width: 120px; /* kamu bisa sesuaikan, misal 100px - 160px */
        display: inline-block;
    }

    /* Opsional: Perbaiki label agar rata tengah vertikal */
    div.dataTables_filter label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
</style>
@endpush
