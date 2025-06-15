@extends('layouts.second')

@section('content')
<div class="container">
    <h1>Permohonan Data Letter C</h1>
    <p>Note: Harap isi formulir dengan data asli!, Admin akan memverivikasi identitas melalui 
        nomor yang anda inputkan, Setelah proses verifikasi selesai data letter c akan dikirim melalui WhastApp.
    </p>
    <form action="{{ route('lettercrequest.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Pemohon</label>
            <input id="nama_pemohon" type="text" class="form-control" name="nama_pemohon" required>
        </div>
        <div class="mb-3">
            <label>Nomor Hp</label>
            <input id="nohp" type="text" class="form-control" name="nohp" required>
        </div>
        <div class="mb-3">
            <label>Masukkan NIK</label>
            <input id="nik" type="text" class="form-control" name="nik" required placeholder="Masukkan NIK Anda">
        </div>
        <div class="mb-3">
            <label>Masukkan No. Persil yang Dicari</label>
            <input id="persil" type="text" class="form-control" name="persil" required>
        </div>
        <div class="mb-3">
            <label>Data Letter C Atas Nama</label>
            <input id="an_letterc" type="text" class="form-control" name="an_letterc" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" rows="3" name="keterangan" required placeholder="Masukkan apa tujuan anda mencari data tersebut..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Buat Permohonan</button>
    </form>
</div>
@endsection
@push('message')
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        });
    </script>
@endif
@endpush