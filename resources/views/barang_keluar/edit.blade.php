@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($barang)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('barang') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/barang/' . $barang->id_barang) }}" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!} 
                    <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                    <div class="form-group row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama barang</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_barang"
                                class="form-control @error('nama_barang')
                              is-invalid
                          @enderror"
                                id="nama_barang" placeholder="Nama barang"
                                value="{{ old('nama_barang', $barang->nama_barang) }}">
                            @error('nama_barang')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" name="harga"
                                class="form-control @error('harga')
                          is-invalid
                      @enderror"
                                id="harga" placeholder="Harga" value="{{ old('harga', $barang->harga) }}">
                            @error('harga')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="text" name="stok"
                                class="form-control @error('stok')
                          is-invalid
                      @enderror"
                                id="stok" placeholder="Stok" value="{{ old('stok', $barang->stok) }}">
                            @error('stok')
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
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('barang') }}">Kembali</a>
                        </div>
                    </div>
                </form>
            @endempty
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')
@endpush
