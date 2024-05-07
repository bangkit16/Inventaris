@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('level') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
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
                    <label for="level_nama" class="col-sm-2 col-form-label">Level Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="level_nama"
                            class="form-control @error('level_nama')
                        is-invalid
                    @enderror"
                            id="level_nama" placeholder="Level Nama" value="{{ old('level_nama') }}">
                        @error('level_nama')
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
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('level') }}">Kembali</a>
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
