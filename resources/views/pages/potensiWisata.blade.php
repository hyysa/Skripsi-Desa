@extends('layouts.second')

@section('title')
    {{-- Start Title Heading --}}
    <h2 class="fw-bold">Potensi Wisata</h2>
    {{-- End Title Heading --}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('img/jaka-tarub.jpeg') }}" class="img-fluid" style="width: 100%;" alt="Placeholder image">
        </div>
        <div class="col-md-6">
            <img src="{{ asset('img/embung-sentul.png') }}" class="img-fluid" style="width: 100%;" alt="Placeholder image">
            <br>
            <img src="{{ asset('img/embung-sentul2.png') }}" class="img-fluid" style="width: 100%;" alt="Placeholder image">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <p>Tempat Wisata Air Embung Sentul Ranu Dumbolo dan Situs Jaka Tarub</p>
        </div>
    </div>
@endsection
