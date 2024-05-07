@extends('layouts.template')

@section('content')
    <div class="container-fluid">

        <h4 class="">{{ $page->title }}</h4>
        @empty($level)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>Data yang Anda cari tidak ditemukan.
            </div>
        @else
            <table class="table border-dark table-hover shadow table-md" style="border: 2px solid black">
                <tr>
                    <th>ID</th>
                    <td>{{ $level->id_level }}</td>
                </tr>
                <tr>
                    <th>Level Kode</th>
                    <td>{{ $level->level_kode }}</td>
                </tr>
                <tr>
                    <th>Level Nama</th>
                    <td>{{ $level->level_nama }}</td>
                </tr>

            </table>
        @endempty
        <a href="{{ url('level') }}" class="btn btn-sm btn-default mt-2">Kembali</a>

    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
