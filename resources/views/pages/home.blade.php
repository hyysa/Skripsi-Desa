@extends('layouts.main')

@section('title')
    {{-- Start Title Marque --}}
    <div class="row align-items-center">
        <div class="heading-berita col-md-auto bg-primary d-none d-md-flex align-items-center py-2">
            <h5 class="m-0 fw-bold">Berita</h5>
        </div>
        <div class="col col d-flex align-items-center px-0 py-2">
            <marquee>
                @foreach($berita->take(4) as $item)
                    <a href="{{ route('detail.berita', $item->id) }}" class="text-decoration-none text-black">{{ $item->judul }}&nbsp;|&nbsp;</a>
                @endforeach
            </marquee>
        </div>
    </div>
    {{-- End Title Marque --}}
@endsection

@section('content')
 
    {{-- Start Carousel --}}
    <div class="card mb-4">
        <div id="carouselExampleCaptions" class="carousel slide carousel-sm" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($carousel_berita->take(3) as $key => $item)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="3000">
                        <img src="{{ asset('storage/' . $item->dokumentasi) }}" class="d-block w-100" alt="{{ $item->judul }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="text-shadow: 3px 3px 5px rgba(0,0,0,0.7); font-weight: bold">{{ Str::limit($item->judul, 100) }}</h5>
                            <hr style="height: 10px">
                            <p style="text-shadow: 3px 3px 5px rgba(0,0,0,0.7);">{{ Str::limit($item->isi_berita, 100) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    {{-- End Carousel --}}

    {{-- Start News --}}
    <div class="row">
        @foreach($berita->take(4) as $post)
            <div class="col-lg-6">
                {{-- Start Blog Post --}}
                <div class="card mb-4">
                    <a href="{{ route('detail.berita', $post->id) }}"><img class="card-img-top" src="{{ asset('storage/'.$post->dokumentasi) }}" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ $post->created_at->format('F d, Y') }}</div>
                        <h2 class="card-title h4">{{ Str::limit($post->judul, 50) }}</h2>
                        <p class="card-text">{{ Str::limit($post->isi_berita, 100) }}</p>
                        <a class="btn btn-primary" href="{{ route('detail.berita', $post->id) }}">Read more →</a>
                    </div>
                </div>
                {{-- End Blog Post --}}
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <nav aria-label="Page navigation" class="d-flex justify-content-center mt-4">
        <ul class="pagination">
        @if ($berita->currentPage() > 1)
            <li class="page-item"><a class="page-link" href="{{ $berita->previousPageUrl() }}" rel="prev">Previous</a></li>
        @endif
        
        @for($i = $berita->currentPage() - 2; $i <= $berita->currentPage() + 2; $i++)
            @if ($i > 0 && $i <= $berita->lastPage())
            <li class="page-item @if ($i == $berita->currentPage()) active @endif"><a class="page-link" href="{{ $berita->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor
        
        @if ($berita->currentPage() < $berita->lastPage())
            <li class="page-item"><a class="page-link" href="{{ $berita->nextPageUrl() }}" rel="next">Next</a></li>
        @endif
        </ul>
    </nav>
  {{-- End Pagination --}}
@endsection
