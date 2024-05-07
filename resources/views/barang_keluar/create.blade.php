@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('barang') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama barang</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_barang"
                            class="form-control @error('nama_barang')
                            is-invalid
                        @enderror"
                            id="inputEmail3" placeholder="Nama barang" value="{{ old('nama_barang') }}">
                        @error('nama_barang')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" name="harga"
                            class="form-control @error('harga')
                        is-invalid
                    @enderror"
                            id="inputPassword3" placeholder="Harga" value="{{ old('harga') }}">
                        @error('harga')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                        <input type="text" name="stok"
                            class="form-control @error('stok')
                        is-invalid
                    @enderror"
                            id="inputPassword3" placeholder="Stok" value="{{ old('stok') }}">
                        @error('stok')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Kategori</label>
                    <div class="col-11">
                        <select class="form-control" id="kategori_id" name="kategori_id" required>
                            <option value="">- Pilih Kategori -</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                            @endforeach
                        </select>
                        @error('level_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div> --}}

                <div class="form-group row">
                    <label class="col-sm-2 control-label col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('barang') }}">Kembali</a>
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
