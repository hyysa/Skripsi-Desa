@extends('layouts.second')

@section('title')
    {{-- Start Title Heading --}}
    <h2 class="fw-bold">Peta</h2>
    {{-- End Title Heading --}}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card map-container">
                    <div class="card-header">Peta Desa Pandanarum Kec.Sutojayan Kab.Blitar</div>
                    <div class="card-body">
                        <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31593.159837645224!2d112.16638535987788!3d-8.18814692796416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78ea7ee532adfd%3A0x534d4d0db2dda5f9!2sPandanarum%2C%20Kec.%20Sutojayan%2C%20Kabupaten%20Blitar%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1708577022881!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card map-container">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Pemetaan Blok dan Persil Desa Pandanarum </span>&nbsp;
                        <a href="{{ route('list.pemilik')}}" class="btn btn-outline-primary btn-sm">Detail Pemilik</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <input type="text" id="search-nama" class="form-control" placeholder="Cari nama pemilik tanah...">
                        </div>
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        @push('script1')
        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiaGlsZ2FzYXRyaWEiLCJhIjoiY203dzdvNDJxMDJuaDJxcHRnbGV1emUzYyJ9.LJBgThSO_DyKtLl2SizjxA';
        
            var map = L.map('map').setView([-8.1836, 112.1925], 15);
        
            L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/streets-v12/tiles/256/{z}/{x}/{y}@2x?access_token=' + mapboxgl.accessToken, {
                attribution: '&copy; <a href="https://www.mapbox.com/">Mapbox</a>',
                tileSize: 256,
            }).addTo(map);
        
            // Icon default dan highlight
            var defaultIcon = L.icon({
                iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
                shadowSize: [41, 41]
            });
        
            var highlightIcon = L.icon({
                iconUrl: 'https://maps.gstatic.com/mapfiles/ms2/micons/blue-dot.png',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -28]
            });
        
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
        
            var peta = @json($peta);
            var layerGroup = L.layerGroup().addTo(map);
            var searchData = [];
        
            peta.forEach(function (item) {
                var cords = typeof item.koordinat === 'string' ? JSON.parse(item.koordinat) : item.koordinat;
        
                if (cords.type === "Polygon") {
                    var coordinates = cords.coordinates[0];
                    var polygonCoords = coordinates.map(coord => [coord[1], coord[0]]);
        
                    var color = getRandomColor();
                    var polygon = L.polygon(polygonCoords, {
                        color: color,
                        fillColor: color,
                        fillOpacity: 0.5
                    }).addTo(layerGroup);
        
                    var popupContent = `
                        <b>Blok:</b> ${item.blok || 'N/A'}<br>
                        <b>Kelas:</b> ${item.kelas || 'N/A'}<br>
                        <b>Persil:</b> ${item.persil || 'N/A'}<br>
                        <b>Nama Pemilik:</b> ${item.nama_pemilik || 'Tidak Diketahui'}
                    `;
        
                    polygon.bindPopup(popupContent);
        
                    var center = turf.center(cords);
                    if (center && center.geometry && center.geometry.coordinates) {
                        var centerCoords = center.geometry.coordinates;
        
                        var marker = L.marker([centerCoords[1], centerCoords[0]], {
                            icon: defaultIcon,
                            title: item.nama_pemilik
                        }).bindPopup(popupContent);
        
                        marker.defaultIcon = defaultIcon;
        
                        layerGroup.addLayer(marker);
                        searchData.push(marker);
                    }
                }
            });
        
            const inputSearch = document.getElementById('search-nama');
        
            inputSearch.addEventListener('input', function () {
                const keyword = inputSearch.value.toLowerCase();
        
                layerGroup.clearLayers(); // Hapus semua marker dan polygon
        
                // Tambah ulang polygon (tidak ikut pencarian, hanya ditampilkan tetap)
                peta.forEach(function (item) {
                    var cords = typeof item.koordinat === 'string' ? JSON.parse(item.koordinat) : item.koordinat;
        
                    if (cords.type === "Polygon") {
                        var coordinates = cords.coordinates[0];
                        var polygonCoords = coordinates.map(coord => [coord[1], coord[0]]);
                        var color = getRandomColor();
        
                        var polygon = L.polygon(polygonCoords, {
                            color: color,
                            fillColor: color,
                            fillOpacity: 0.5
                        });
                        layerGroup.addLayer(polygon);
                    }
                });
        
                if (keyword === "") {
                    // Jika kosong, tampilkan semua marker tanpa popup
                    searchData.forEach(function (marker) {
                        marker.setIcon(marker.defaultIcon);
                        marker.closePopup();
                        layerGroup.addLayer(marker);
                    });
                    map.setView([-8.1836, 112.1925], 15);
                    return;
                }
        
                let found = false;
        
                searchData.forEach(function (marker) {
                    const title = marker.options.title.toLowerCase();
        
                    if (title.includes(keyword)) {
                        marker.setIcon(highlightIcon);
                        layerGroup.addLayer(marker); // Tambahkan dulu marker-nya
                        map.setView(marker.getLatLng(), 17);
                        setTimeout(() => marker.openPopup(), 100); // Buka popup setelah ditambahkan
                        found = true;
                    }
                });
            });
        </script>
        
        @endpush
    </div>
@endsection

