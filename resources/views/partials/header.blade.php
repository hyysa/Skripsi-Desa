<div class="main-container">

    {{-- Start Time-Widget --}}
    <nav class="navbar navbar-expand-lg bg-blue-900">
        <div class="container-fluid">
            <span id="dateTime" class="navbar-text text-white"></span>
            <button type="button" class="btn btn-outline-light" id="realTime"></button>
        </div>
    </nav>
    {{-- End Time-Widget --}}

    {{-- Start Header Hero --}}
    <div class="container-fluid overlapping-image p-0">
        <div class="masterhead d-flex justify-content-center align-items-center pt-5"
            style="background-image: url('{{ asset('img/desa.jpg') }}');">
            <div class="color-overlay d-flex flex-column justify-content-center align-items-center gap-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/Lambang_Kabupaten_Blitar.webp/905px-Lambang_Kabupaten_Blitar.webp.png"
                    alt="" width="120vh" height="120vh">
                <h1>Kantor Desa Pandanarum</h1>
            </div>
        </div>
    </div>
    {{-- End Header Hero --}}


    {{-- Start Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-blue-900 py-0">
        <div class="container-fluid">
            <a class="navbar-brand bg-change px-3 py-3 me-auto {{ $title === 'home' ? 'active' : '' }}"
                href="/"><i class="fa-solid fa-house"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown ">
                        <a class="nav-link  dropdown-toggle bg-change" href="#" data-bs-toggle="dropdown">
                            PROFIL</a>
                        <ul class="dropdown-menu bg-black-900 fs">
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'sejarah' ? 'header-active' : '' }}"
                                    href="/sejarah"> SEJARAH</a></li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'visiMisi' ? 'header-active' : '' }}"
                                    href="/visi-misi"> VISI & MISI </a>
                            </li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'struktur' ? 'header-active' : '' }}"
                                    href="/struktur"> STRUKTUR ORGANISASI
                                </a>
                            </li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'demografi' ? 'header-active' : '' }}"
                                    href="/demografi"> DEMOGRAFI </a></li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'peta' ? 'header-active' : '' }}"
                                    href="/peta"> PETA </a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle bg-change" href="#" data-bs-toggle="dropdown">
                            LAYANAN</a>
                        <ul class="dropdown-menu bg-black-900">
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'surat-keterangan-umum' ? 'header-active' : '' }}"
                                    href="/surat-keterangan-umum"> SURAT KETERANGAN
                                    UMUM</a>
                            </li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'surat-kelahiran' ? 'header-active' : '' }}"
                                    href="/surat-kelahiran"> SURAT KELAHIRAN </a>
                            </li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'surat-nikah' ? 'header-active' : '' }}"
                                    href="/surat-nikah"> SURAT NIKAH </a></li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'surat-ijin-luar-negri' ? 'header-active' : '' }}"
                                    href="/surat-ijin-luar-negri"> SURAT IJIN LUAR NEGRI
                                </a>
                            </li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'surat-pindah-tempat' ? 'header-active' : '' }}"
                                    href="/surat-pindah-tempat"> SURAT PINDAH TEMPAT
                                </a>
                            </li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'surat-kematian' ? 'header-active' : '' }}"
                                    href="/surat-kematian"> SURAT KEMATIAN </a>
                            </li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'layanan-letterc' ? 'header-active' : '' }}"
                                href="/layanan-letterc"> LETTER C </a></li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'boro-nikah' ? 'header-active' : '' }}"
                                    href="/boro-nikah"> BORO NIKAH </a></li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'ijin-usaha' ? 'header-active' : '' }}"
                                    href="/ijin-usaha"> IJIN USAHA </a></li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'skck' ? 'header-active' : '' }}"
                                    href="/skck"> SKCK </a></li>
                            <li><a class="dropdown-item clr-white-900 bg-change {{ $title === 'bri' ? 'header-active' : '' }}"
                                    href="/bri"> BRI </a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link bg-change border-0 {{ $title === 'potensi-wisata' ? 'header-active' : '' }}"
                            href="/potensi-wisata"> POTENSI WISATA </a></li>
                    <li class="nav-item"><a
                            class="nav-link bg-change border-0 {{ $title === 'kontak' ? 'header-active' : '' }}"
                            href="/kontak"> KONTAK </a></li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- End Navbar --}}

</div>
