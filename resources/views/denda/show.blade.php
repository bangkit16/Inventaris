@extends('layouts.template')

@section('content')
    <div class="container-fluid">

        <h4 class="">{{ $page->title }}</h4>
        @empty($denda)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>Data yang Anda cari tidak ditemukan.
            </div>
        @else
            <table class="table border-dark table-hover shadow table-md" style="border: 2px solid black">
                <tr>
                    <th>ID</th>
                    <td>{{ $denda->id_denda }}</td>
                </tr>
                <tr>
                    <th>Nama Barang </th>
                    <td>{{ $denda->pengembalian->peminjaman->barang->nama_barang }}</td>
                </tr>
                <tr>
                    <th>Nama Peminjam </th>
                    <td>{{ $denda->pengembalian->peminjaman->mahasiswa->nama }}</td>
                </tr>
                <tr>
                    <th>Nama User </th>
                    <td>{{ $denda->pengembalian->peminjaman->user->nama }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pinjam </th>
                    <td>{{ $denda->pengembalian->peminjaman->tgl_pinjam }}</td>
                </tr>
                <tr>
                    <th>Tanggal Tenggat </th>
                    <td>{{ $denda->pengembalian->peminjaman->tgl_tenggat }}</td>
                </tr>
                <tr>
                    <th>Tanggal Kembali </th>
                    <td>{{ $denda->pengembalian->tgl_kembali }}</td>
                </tr>
                <tr>
                    <th>Keterangan </th>
                    <td>{{ $denda->keterangan }}</td>
                </tr>
            </table>
        @endempty
        <a href="{{ url('denda') }}" class="btn btn-sm btn-default mt-2">Kembali</a>

    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
