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
                    <div class="card-header">Pemetaan Blok</div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    @push('javascript')
    <script>
    var map = L.map('map').setView([-8.183608213057614, 112.19258084611654], 16);var map = L.map('map').setView([-8.183608213057614, 112.19258084611654], 16);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/">2022</a>',
    maxZoom: 23,
    id: 'mapbox/satellite-streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiaGlsZ2FzYXRyaWEiLCJhIjoiY203dzdvNDJxMDJuaDJxcHRnbGV1emUzYyJ9.LJBgThSO_DyKtLl2SizjxA'
}).addTo(map);

// Fungsi untuk warna acak
function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

// Ambil data dari Laravel
var peta = {!! json_encode($peta->toArray()) !!};

peta.forEach(function(item) {
    try {
        if (!item['koordinat']) {
            console.warn("Data koordinat kosong untuk ID:", item['id']);
            return;
        }

        var cords = JSON.parse(item['koordinat']);

        // Pastikan data adalah Polygon
        if (cords.type !== "Polygon") {
            console.warn("Data bukan Polygon untuk ID:", item['id']);
            return;
        }

        var coordinates = cords.coordinates[0];

        // Pastikan koordinat berbentuk array
        if (!Array.isArray(coordinates)) {
            console.error("Data koordinat tidak berbentuk array!", coordinates);
            return;
        }

        // Balik koordinat dari [lng, lat] ke [lat, lng]
        var latLngCoordinates = coordinates.map(coord => [coord[1], coord[0]]);

        // Buat polygon di Leaflet
        var polygon = L.polygon(latLngCoordinates, {
            color: getRandomColor(),
            fillColor: getRandomColor(),
            fillOpacity: 0.8
        }).addTo(map);

        polygon.bindPopup(
            '<b>ID</b>: ' + item['id'] + '<br>' +
            "<b>Dusun: </b>" + item['dusun'] + "<br>" +
            "<b>Pemilik: </b>" + item['nama_pemilik'] + "<br>" +
            "<b>Blok: </b>" + item['blok'] + "<br>" +
            "<b>Kelas: </b>" + item['kelas'] + "<br>" +
            "<b>Luas: </b>" + item['luas'] + "m<sup>2</sup><br>"
        );

    } catch (error) {
        console.error("Error parsing koordinat: ", error);
    }
});

    </script>
@endpush
    </div>
@endsection

