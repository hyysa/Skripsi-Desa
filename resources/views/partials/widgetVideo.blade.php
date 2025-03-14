{{-- Start Widget Video --}}
<div class="mt-4 mb-4">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 g-4">
        <div class="col">
            @foreach ($video as $item) 
            <div class="card embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ $item->link_ytb }}" allowfullscreen></iframe>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- End Widget Video --}}
