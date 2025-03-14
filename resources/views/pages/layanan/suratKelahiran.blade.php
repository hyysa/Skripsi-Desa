@extends('layouts.second')

@section('title')
    {{-- Start Title Heading --}}
    <h2 class="fw-bold">Surat Kelahiran</h2>
    {{-- End Title Heading --}}
@endsection

@section('content')
    <div class="mb-2"> Syarat :</div>

    <ol class="lh-lg">
        <li>Surat pengantar RT setempat</li>
        <li>Foto copy KK dan KK asli</li>
        <li>Foto copy E-KTP ayah, ibu, dan saksi 2 orang</li>
        <li>Foto copy surat lahir dari bidan atau rumah sakit</li>
        <li>Foto copy surat nikah 1 lembar</li>
    </ol>
@endsection
