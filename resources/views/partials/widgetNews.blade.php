{{-- Start Widget News --}}
<div class="mb-4">

    {{-- Start News Navigation --}}
    <ul class="nav nav-tabs justify-content-center bg-light" id="myTab" role="tablist">
        <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link active text-center" id="latest-tab" data-bs-toggle="tab" data-bs-target="#latest"
                type="button" role="tab" aria-controls="latest" aria-selected="true">latest</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link text-center" id="popular-tab" data-bs-toggle="tab" data-bs-target="#popular"
                type="button" role="tab" aria-controls="popular" aria-selected="false">Popular</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link text-center" id="trending-tab" data-bs-toggle="tab" data-bs-target="#trending"
                type="button" role="tab" aria-controls="trending" aria-selected="false">Trending</button>
        </li>
    </ul>
    {{-- End News Navigation --}}

    {{-- Start News Content --}}
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="latest-tab">
            <div class="card mb-3 custom-card">
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-12 col-md-auto pr-md-0 mb-3 mb-md-0">
                            <div class="custom-card-img-wrapper text-center h-100">
                                <img src="gambar.jpg"
                                    class="custom-card-img img-fluid h-100 w-100 min-img-width img-side-cover max-width-lg max-width-sm"
                                    alt="Placeholder image">
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-md-flex flex-column justify-content-between h-100">
                                <div class="d-flex flex-wrap gap-2">
                                    <div class="col-auto category">Kategori 1</div>
                                    <div class="col-auto category">Kategori 2</div>
                                    <div class="col-auto category">Kategori 3</div>
                                </div>
                                <div>
                                    <h5 class="card-title mt-2 mb-0">Berita 1</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 custom-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-auto pr-md-0 mb-3 mb-md-0">
                            <div class="custom-card-img-wrapper text-center h-100">
                                <img src="gambar.jpg"
                                    class="custom-card-img img-fluid h-100 w-100 min-img-width img-side-cover max-width-lg max-width-sm"
                                    alt="Placeholder image">
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-md-flex flex-column justify-content-between h-100">
                                <div class="d-flex flex-wrap gap-2">
                                    <div class="col-auto category">Kategori 1</div>
                                    <div class="col-auto category">Kategori 2</div>
                                    <div class="col-auto category">Kategori 3</div>
                                </div>
                                <div>
                                    <h5 class="card-title mt-2 mb-0">Berita 1</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 custom-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-auto pr-md-0 mb-3 mb-md-0">
                            <div class="custom-card-img-wrapper text-center h-100">
                                <img src="gambar.jpg"
                                    class="custom-card-img img-fluid h-100 w-100 min-img-width img-side-cover max-width-lg max-width-sm"
                                    alt="Placeholder image">
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-md-flex flex-column justify-content-between h-100">
                                <div class="d-flex flex-wrap gap-2">
                                    <div class="col-auto category">Kategori 1</div>
                                    <div class="col-auto category">Kategori 2</div>
                                    <div class="col-auto category">Kategori 3</div>
                                </div>
                                <div>
                                    <h5 class="card-title mt-2 mb-0">Berita 1</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 custom-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-auto pr-md-0 mb-3 mb-md-0">
                            <div class="custom-card-img-wrapper text-center h-100">
                                <img src="gambar.jpg"
                                    class="custom-card-img img-fluid h-100 w-100 min-img-width img-side-cover max-width-lg max-width-sm"
                                    alt="Placeholder image">
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-md-flex flex-column justify-content-between h-100">
                                <div class="d-flex flex-wrap gap-2">
                                    <div class="col-auto category">Kategori 1</div>
                                    <div class="col-auto category">Kategori 2</div>
                                    <div class="col-auto category">Kategori 3</div>
                                </div>
                                <div>
                                    <h5 class="card-title mt-2 mb-0">Berita 1</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="profile-tab">
            {{-- isi disini --}}
        </div>
        <div class="tab-pane fade" id="trending" role="tabpanel" aria-labelledby="contact-tab">
            {{-- isi disini --}}
        </div>
    </div>
    {{-- End News Content --}}

</div>
{{-- End Widget News --}}
