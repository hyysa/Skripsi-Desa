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
                        <span>Pemetaan Blok dan Persil Desa Pandanarum</span>
                        <a href="{{ route('list.pemilik')}}" class="btn btn-outline-primary btn-sm">Detail Pemilik</a>
                    </div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    @push('script1')
    <script>
         mapboxgl.accessToken = 'pk.eyJ1IjoiaGlsZ2FzYXRyaWEiLCJhIjoiY203dzdvNDJxMDJuaDJxcHRnbGV1emUzYyJ9.LJBgThSO_DyKtLl2SizjxA';

        // Inisialisasi Peta Mapbox dalam Leaflet
        var map = L.map('map').setView([-8.183608213057614, 112.19258084611654], 15);

        L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/streets-v12/tiles/{z}/{x}/{y}?access_token=' + mapboxgl.accessToken, {
            attribution: '&copy; <a href="https://www.mapbox.com/">Mapbox</a>',
            tileSize: 512,
            zoomOffset: -1,
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

        // Data dari Laravel (pastikan dikirim dari controller)
        var peta = @json($peta);

        // Loop untuk menampilkan semua poligon
        peta.forEach(function(item) {
            var cords = typeof item.koordinat === 'string' ? JSON.parse(item.koordinat) : item.koordinat; // Pastikan koordinat adalah string JSON yang valid

            if (cords.type === "Polygon") {
                var coordinates = cords.coordinates[0]; // Ambil koordinat pertama dari array

                // Ubah format koordinat agar sesuai dengan Leaflet
                var polygonCoords = coordinates.map(coord => [coord[1], coord[0]]);

                // Tambahkan poligon ke peta
                var polygon = L.polygon(polygonCoords, {
                    color: getRandomColor(),
                    fillColor: getRandomColor(),
                    fillOpacity: 0.6
                }).addTo(map);

                // **Menghitung titik tengah (center) menggunakan Turf.js**
                if (center && center.geometry && center.geometry.coordinates) {
                var center = turf.center(cords);
                var centerCoords = center.geometry.coordinates;
                L.marker([centerCoords[1], centerCoords[0]], {
                    icon: L.divIcon({
                        className: 'custom-marker',
                        iconSize: [10, 10],
                        html: '<div style="background-color:' + getRandomColor() + '; width:12px; height:12px; border-radius:50%;"></div>'
                    })
                }).addTo(map);
                } else {
                    console.log("Center point tidak valid untuk:", item);
                }
                // var center = turf.center(cords);
                // var centerCoords = center.geometry.coordinates;
                // var markerCenter = L.marker([centerCoords[1], centerCoords[0]], {
                //     icon: L.divIcon({
                //         className: 'custom-marker',
                //         iconSize: [10, 10],
                //         html: '<div style="background-color:' + getRandomColor() + '; width:12px; height:12px; border-radius:50%;"></div>'
                //     })
                // }).addTo(map);

                // Tambahkan Popup atribut
                polygon.bindPopup(`
                    <b>Blok:</b> ${item.blok}<br>
                    <b>Kelas:</b> ${item.kelas}<br>
                    <b>Persil:</b> ${item.persil}<br>
                    <b>Nama Pemilik:</b> ${item.nama_pemilik}
                `);
            }
        });
    </script>
    @endpush
    </div>
@endsection

