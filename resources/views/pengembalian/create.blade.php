@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('peminjaman') }}" class="form-horizontal">
                @csrf
                {{-- <div class="form-group row">
                    <label for="level_kode" class="col-sm-2 col-form-label">Level Kode</label>
                    <div class="col-sm-10">
                        <input type="text" name="level_kode"
                            class="form-control @error('level_kode')
                            is-invalid
                        @enderror"
                            id="level_kode" placeholder="Level Kode" value="{{ old('level_kode') }}">
                        @error('level_kode')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label class="col-sm-2 control-label col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="id_barang" name="id_barang" required>
                            <option value="">- Pilih Barang -</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->id_barang }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                        @error('id_barang')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label col-form-label">Mahasiswa</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="id_mahasiswa" name="id_mahasiswa" required>
                            <option value="">- Pilih Mahasiswa -</option>
                            @foreach ($mahasiswa as $itemm)
                                <option value="{{ $itemm->id_mahasiswa }}">{{ $itemm->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_mahasiswa')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label class="col-sm-2 control-label col-form-label"></label>
                    <div class="col-sm-10">
                        <select class="form-control" id="id_user" name="id_user" required>
                            <option value="">- Pilih Level -</option>
                            @foreach ($mahasiswa as $itemmm)
                                <option value="{{ $itemmm->id_user }}">{{ $itemmm->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_barang')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label for="tgl_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_pinjam"
                            class="form-control @error('tgl_pinjam')
                        is-invalid
                    @enderror"
                            id="tgl_pinjam" placeholder="Tanggal Pinjam" value="{{ old('tgl_pinjam') }}">
                        @error('tgl_pinjam')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_tenggat" class="col-sm-2 col-form-label">Tanggal Tenggat</label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_tenggat"
                            class="form-control @error('tgl_tenggat')
                        is-invalid
                    @enderror"
                            id="tgl_tenggat" placeholder="Tanggal Tenggat" value="{{ old('tgl_tenggat') }}">
                        @error('tgl_tenggat')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_tenggat" class="col-sm-2 col-form-label">Tanggal Tenggat</label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_tenggat"
                            class="form-control @error('tgl_tenggat')
                        is-invalid
                    @enderror"
                            id="tgl_tenggat" placeholder="Tanggal Tenggat" value="{{ old('tgl_tenggat') }}">
                        @error('tgl_tenggat')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="text" name="jumlah"
                            class="form-control @error('jumlah')
                        is-invalid
                    @enderror"
                            id="jumlah" placeholder="jumlah" value="{{ old('jumlah') }}">
                        @error('jumlah')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 control-label col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('peminjaman') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
