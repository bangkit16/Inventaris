@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($user)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('user') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/user/' . $user->id_user) }}" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!} 
                    <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username"
                                class="form-control @error('username')
                              is-invalid
                          @enderror"
                                id="username" placeholder="Username"
                                value="{{ old('username', $user->username) }}">
                            @error('username')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label col-form-label">Level</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_level" name="id_level" required>
                                <option value="">- Pilih Level -</option>
                                @foreach ($level as $item)
                                    <option value="{{ $item->id_level }}" @if ($item->id_level == $user->id_level) selected @endif>
                                        {{ $item->level_nama }}</option>
                                @endforeach
                            </select>
                            @error('id_level')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama"
                                class="form-control @error('nama')
                          is-invalid
                      @enderror"
                                id="nama" placeholder="nama" value="{{ old('nama', $user->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" name="nip"
                                class="form-control @error('nip')
                          is-invalid
                      @enderror"
                                id="nip" placeholder="nip" value="{{ old('nip', $user->nip) }}">
                            @error('nip')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password"
                                class="form-control @error('password')
                          is-invalid
                      @enderror"
                                id="password" placeholder="password" value="{{ old('password', $user->password) }}">
                            @error('password')
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
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('user') }}">Kembali</a>
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
