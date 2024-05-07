@extends('layouts.template')

@section('content')
    <div class="container-fluid">

        <h4 class="">{{ $page->title }}</h4>
        @empty($user)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>Data yang Anda cari tidak ditemukan.
            </div>
        @else
            <table class="table border-dark table-hover shadow table-md" style="border: 2px solid black">
                <tr>
                    <th>ID</th>
                    <td>{{ $user->id_user }}</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <th>Level</th>
                    <td>{{ $user->level->level_nama }}</td>
                </tr>
                <tr>
                    <th>Nama user</th>
                    <td>{{ $user->nama }}</td>
                </tr>
                <tr>
                    <th>NIP</th>
                    <td>{{ $user->nip }}</td>
                </tr>
            </table>
        @endempty
        <a href="{{ url('user') }}" class="btn btn-sm btn-default mt-2">Kembali</a>

    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
