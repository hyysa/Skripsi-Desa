@extends('layouts.second')

@section('content')
    <!-- Post content-->
    <article>
        <!-- Post header-->
        <header class="mb-4">
            <!-- Post title-->
            <h1 class="fw-bolder mb-1">{{ $berita->judul}}</h1>
            <!-- Post meta content-->
            <div class="text-muted fst-italic mb-2">Posted on {{ $berita->created_at}} by {{ $berita->nama_author}}</div>
            <!-- Post categories-->
            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $berita->kategori}}</a>
        </header>
        <!-- Preview image figure-->
        <figure class="mb-4 text-center"><img class="img-fluid rounded preview-image" src="{{ asset('storage/'.$berita->dokumentasi) }}" alt="..." />
        </figure>
        <!-- Post content-->
        <section class="mb-5">
            <p class="fs-5 mb-4">{{ $berita->isi_berita}}</p>
        </section>
    </article>
@endsection
