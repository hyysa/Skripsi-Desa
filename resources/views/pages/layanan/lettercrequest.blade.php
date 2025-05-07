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
            <label>Data Letter C Atas Nama</label>
            <input id="an_letterc" type="text" class="form-control" name="an_letterc" required>
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