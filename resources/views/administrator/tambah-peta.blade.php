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
            <div class="col-xl-9 col-lg-7">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Peta</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pemetaan.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="blok">Blok</label>
                                <input id="blok" type="text" class="form-control" name="blok" required>
                            </div>
                            <div class="form-group">
                                <label for="persil">No. Persil</label>
                                <input id="persil" type="text" class="form-control" name="persil" required>
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
                    accessToken: 'pk.eyJ1IjoiaGlsZ2FzYXRyaWEiLCJhIjoiY203dzdvNDJxMDJuaDJxcHRnbGV1emUzYyJ9.LJBgThSO_DyKtLl2SizjxA'
                }).addTo(map);

                var drawnItems = new L.FeatureGroup();
                map.addLayer(drawnItems);

                // Tampilkan data poligon lama
                L.geoJSON(existingPolygons, {
                    style: {
                        color: 'gray',
                        fillColor: '#cccccc',
                        fillOpacity: 0.5,
                        weight: 1
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