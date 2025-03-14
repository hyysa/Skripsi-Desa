@extends('layouts.second')
@section('title', 'Search : '. $query)
@section('content')
@foreach ($beritaResults as $berita)
    
<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
        <img src="{{ asset('storage/'.$berita->dokumentasi) }}" style="height: 100%; object-fit: cover" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
          <div class="card-body">
              <h5 class="card-title">{{ $berita->judul}}</h5>
              <p class="card-text">{{ Str::limit($berita->isi_berita, 100) }}</p>
          <a class="btn btn-primary" href="{{ route('detail.berita', $berita->id) }}">Read more →</a>
          <p class="card-text"><small class="text-body-secondary">{{ $berita->created_at->format('F d, Y') }}</small></p>

        </div>
    </div>
</div>
</div>
@endforeach

@endsection
