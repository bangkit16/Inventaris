@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($barang_keluar)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('barang_keluar') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/barang_keluar/' . $barang_keluar->id_transaksi) }}" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!}
                    <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                    {{-- <div class="form-group row">
                        <label class="col-sm-2 control-label col-form-label">Barang</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="barang" name="id_barang" required>
                                <option value="">- Pilih Barang -</option>
                                @foreach ($barang as $item)
                                    <option value="{{ $item->id_barang }}" @if ($item->id_barang == $barang_keluar->id_barang) selected @endif>
                                        {{ $item->nama_barang }}</option>
                                @endforeach
                            </select>
                            @error('barang')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}
                    <input type="hidden" value="{{ $barang_keluar->id_barang }}" name="id_barang">
                    <div class="form-group row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Jumlah Masuk</label>
                        <div class="col-sm-10">
                            <input type="text" name="barang_keluar"
                                class="form-control @error('barang_keluar')
                              is-invalid
                          @enderror"
                                id="barang_keluar" placeholder="Jumlah Masuk"
                                value="{{ old('barang_keluar', $barang_keluar->barang_keluar) }}">
                            @error('barang_keluar')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_transaksi" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-10">
                            <input type="date" name="tgl_transaksi"
                                class="form-control @error('tgl_transaksi')
                          is-invalid
                      @enderror"
                                id="tgl_transaksi" placeholder="Tanggal Transalksi"
                                value="{{ old('tgl_transaksi', date('Y-m-d', strtotime($barang_keluar->tgl_transaksi))) }}">
                            @error('tgl_transaksi')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status"
                                class="form-control @error('status')
                          is-invalid
                      @enderror"
                                id="status" placeholder="Stok" value="{{ old('status', $barang_keluar->status) }}">
                            @error('status')
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
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('barang_keluar') }}">Kembali</a>
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
