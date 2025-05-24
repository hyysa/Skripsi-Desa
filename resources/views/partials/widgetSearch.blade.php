<!-- Search widget-->
<div class="card mb-4">
    <form action="{{ route('search') }}" method="GET" id="search-form">
        <div class="card-header">Pencarian Berita</div>
        <div class="card-body">
            <div class="input-group">
                <input name="query" class="form-control" type="text" placeholder="Ketik Disini..." aria-label="Ketik Disini..."
                    aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="submit">
                    Cari
                </button>
            </div>
        </div>
    </form>
</div>
