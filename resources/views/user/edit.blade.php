@extends('layout.master')
@section('title', 'Ubah Akun')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-8 text-center">
                <h1>Edit Akun</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8 d-flex justify-content-center align-items-center container-fluid">
                <form method="POST" enctype="multipart/form-data" action="{{ route('user.update', $user) }}" class="container-fluid">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input required type="text" name="name" class="form-control" id="name"
                            aria-describedby="namaHelp" value="{{ old('name') ?? $user->name }}" />
                        @error('name')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" aria-describedby="alamatHelp">{{ old('alamat') ?? $user->alamat }}</textarea>
                        @error('alamat')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="noTelp" class="form-label">Nomor Telpon</label>
                        <input required type="text" name="noTelp" class="form-control" id="noTelp"
                            aria-describedby="noTelpHelp" value="{{ old('noTelp') ?? $user->noTelp }}" />
                        @error('noTelp')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email"
                            aria-describedby="emailHelp" placeholder="Email baru" />
                        @error('email')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control" id="password"
                            aria-describedby="passwordHelp" placeholder="Password baru" />
                        @error('password')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">role</label>
                        <select class="form-control" id="role" name="role">
                            <option value='karyawan'>Karyawan</option>
                            <option value='user'>Pelanggan</option>
                            <option value='admin'>Admin</option>
                        </select>
                        @error('role')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info">Edit Akun</button>
                </form>
            </div>
        </div>
    </div>
@endsection
