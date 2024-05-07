@extends('layouts.template')

@section('content')
    <div class="container-fluid">

        <h4 class="">{{ $page->title }}</h4>
        @empty($barang)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>Data yang Anda cari tidak ditemukan.
            </div>
        @else
            <table class="table border-dark table-hover shadow table-md" style="border: 2px solid black">
                <tr>
                    <th>ID</th>
                    <td>{{ $barang->id_barang }}</td>
                </tr>
                <tr>
                    <th>Barang Nama</th>
                    <td>{{ $barang->nama_barang }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>{{ $barang->harga }}</td>
                </tr>
                <tr>
                <tr>
                    <th>Stok</th>
                    <td>{{ $barang->stok }}</td>
                </tr>
            </table>
        @endempty
        <a href="{{ url('barang') }}" class="btn btn-sm btn-default mt-2">Kembali</a>

    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
