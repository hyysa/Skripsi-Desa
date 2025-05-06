@extends('layouts.second')


@section('title')
    {{-- Start Title Heading --}}
    <h2 class="fw-bold">Daftar Pemilik Tanah</h2>
    {{-- End Title Heading --}}
@endsection

@section('content')
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemilik</th>
                <th>Persil</th>
                <th>Luas</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemilik as $item)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $item->nama_pemilik }}</td>
                <td>{{ $item->persil }}</td>
                <td>{{ $item->luas }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('table')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endpush
