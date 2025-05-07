<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Daftar Pemilik Tanah</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 40px;
        }
        h2, h4 {
            text-align: center;
        }
        .kop {
            text-align: center;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .ttd {
            margin-top: 40px;
            width: 100%;
            text-align: right;
        }
    </style>
</head>
<body onload="window.print()">

    <div class="kop">
        <table style="width: 100%; border: none;">
            <tr>
                <td style="width: 100px; border: none;">
                    <img src="{{ asset('img/logo-blitar.png') }}" width="100" alt="Logo">
                </td>
                <td style="text-align: center; border: none;">
                    <p style="margin: 0; font-size: 14px;">PEMERINTAH KABUPATEN BLITAR</p>
                    <p style="margin: 0; font-size: 14px;">KECAMATAN SUTOJAYAN</p>
                    <p style="margin: 0; font-size: 16px; font-weight: bold;">KANTOR KEPALA DESA PANDANARUM</p>
                    <p style="margin: 0; font-size: 13px;">
                        JL. UNTORO TENGAH NO. 62 TELEPON (0342) 692130
                    </p>
                    <p style="margin: 0; font-size: 13px;">
                        Email : <a href="mailto:desapandanarum62@gmail.com">desapandanarum62@gmail.com</a>
                    </p>
                    <p style="margin: 0; font-size: 14px;"><strong><u>P A N D A N A R U M</u></strong></p>
                </td>
            </tr>
        </table>
        
        <hr style="border: 2px solid black; margin-bottom: 1px;">
        <hr style="border: 1px solid black; margin-top: 1px;">
        
    </div>

    <h3 style="text-align: center; text-transform: uppercase; font-weight: bold; margin-top: 20px; margin-bottom: 5px;">
        Rekap Data Kepemilikan Tanah Desa Pandanarum
    </h3>
    <h4 style="text-align: center; text-transform: uppercase; margin: 0;">
        Kecamatan Sutojayan
    </h4>
    <br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemilik</th>
                <th>Persil</th>
                <th>Luas</th>
                <th>No. Letter-C</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemilik as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_pemilik }}</td>
                <td>{{ $item->persil }}</td>
                <td>{{ $item->luas }}</td>
                <td>{{ $item->nomor_letterc }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ttd">
        <p>Pandanarum, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p><strong>Kepala Desa Pandanarum</strong></p>
        <br><br><br>
        <p style="text-decoration: underline; margin-right: 50px;"><strong><u>MAS'UDIN</u></strong></p>
    </div>

</body>
</html>
