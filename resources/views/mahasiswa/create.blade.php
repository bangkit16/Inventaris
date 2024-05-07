@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('mahasiswa') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama"
                            class="form-control @error('nama')
                            is-invalid
                        @enderror"
                            id="nama" placeholder="Nama Mahasiswa" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label class="col-sm-2 control-label col-form-label">Level</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="id_level" name="id_level" required>
                            <option value="">- Pilih Level -</option>
                            @foreach ($level as $item)
                                <option value="{{ $item->id_level }}">{{ $item->level_nama }}</option>
                            @endforeach
                        </select>
                        @error('id_level')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" name="NIM"
                            class="form-control @error('NIM')
                        is-invalid
                    @enderror"
                            id="NIM" placeholder="NIM" value="{{ old('NIM') }}">
                        @error('NIM')
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
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('mahasiswa') }}">Kembali</a>
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
