@extends('layouts.super')
@section('title', 'Ubah Pemetaan | Administrator')
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
            <h1 class="h3 mb-0 text-gray-800">Ubah Data Peta</h1>
        </div>

        <div class="row">
            <div class="col-xl-9 col-lg-7">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Ubah Data</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pemetaan.update', $pemetaan->id_pemetaan) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="blok">Blok</label>
                                <input id="blok" type="text" class="form-control" name="blok" value="{{ $pemetaan->blok }}" required>
                            </div>
                            <div class="form-group">
                                <label for="persil">No. Persil</label>
                                <input id="persil" type="text" class="form-control" name="persil" value="{{ $pemetaan->persil }}" required>
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

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var map = L.map('map').setView([-8.183608213057614, 112.19258084611654], 16);

                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: '© <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
                    maxZoom: 23,
                    id: 'mapbox/satellite-streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'pk.eyJ1IjoiaGlsZ2FzYXRyaWEiLCJhIjoiY203dzdvNDJxMDJuaDJxcHRnbGV1emUzYyJ9.LJBgThSO_DyKtLl2SizjxA'
                }).addTo(map);

                var drawnItems = new L.FeatureGroup();
                map.addLayer(drawnItems);
                
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

                var koordinatInput = document.getElementById('koordinat');
                var drawnPolygon = null;

                var koordinat = {!! json_encode($pemetaan->koordinat ?? '') !!};

                if (koordinat) {
                    try {
                        var coords = JSON.parse(koordinat);
                        var coordinates = coords.coordinates[0];

                        coordinates.forEach(coord => coord.reverse());

                        drawnPolygon = L.polygon(coordinates, { color: 'blue' }).addTo(drawnItems);
                        map.fitBounds(drawnPolygon.getBounds());

                        drawnPolygon.on('pm:edit', function (e) {
                            updateCoordinates(e.layer);
                        });
                    } catch (e) {
                        console.error("Error parsing koordinat:", e);
                    }
                }

                function updateCoordinates(layer) {
                    var geoJson = layer.toGeoJSON();
                    koordinatInput.value = JSON.stringify(geoJson.geometry);
                }

                map.on('pm:create', function (e) {
                    if (drawnPolygon) {
                        map.removeLayer(drawnPolygon);
                    }
                    drawnPolygon = e.layer;
                    drawnItems.clearLayers();
                    drawnItems.addLayer(drawnPolygon);
                    updateCoordinates(drawnPolygon);
                });

                map.on('pm:edit', function (e) {
                    e.layers.eachLayer(function (layer) {
                        updateCoordinates(layer);
                    });
                });

                map.on('pm:remove', function (e) {
                    koordinatInput.value = '';
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