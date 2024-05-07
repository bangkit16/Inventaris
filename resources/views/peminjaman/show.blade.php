@extends('layouts.template')

@section('content')
    <div class="container-fluid">

        <h4 class="">{{ $page->title }}</h4>
        @empty($peminjaman)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>Data yang Anda cari tidak ditemukan.
            </div>
        @else
            <table class="table border-dark table-hover shadow table-md" style="border: 2px solid black">
                <tr>
                    <th>ID</th>
                    <td>{{ $peminjaman->id_peminjaman }}</td>
                </tr>
                <tr>
                    <th>Nama Barang </th>
                    <td>{{ $peminjaman->barang->id_barang }}</td>
                </tr>
                <tr>
                    <th>Nama Mahasiswa </th>
                    <td>{{ $peminjaman->mahasiswa->nama }}</td>
                </tr>
            </table>
        @endempty
        <a href="{{ url('peminjaman') }}" class="btn btn-sm btn-default mt-2">Kembali</a>

    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
