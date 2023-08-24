@extends('layout.master')
@section('title', 'Ubah Produk')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-8 text-center">
                <h1>Edit Produk</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8 d-flex justify-content-center align-items-center container-fluid">
                <form method="POST" enctype="multipart/form-data" action="{{ route('produk.update', $produk) }}" class="container-fluid">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input required type="text" name="nama" class="form-control" id="nama"
                            aria-describedby="namaHelp" value="{{ old('nama') ?? $produk->nama }}" />
                        @error('nama')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" aria-describedby="deskripsiHelp">{{ old('deskripsi') ?? $produk->deskripsi }}</textarea>
                        @error('deskripsi')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">harga</label>
                        <input required type="number" name="harga" class="form-control" id="harga"
                            aria-describedby="hargaHelp" value="{{ old('harga') ?? $produk->harga }}" />
                        @error('harga')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">stok</label>
                        <input required type="number" name="stok" class="form-control" id="stok"
                            aria-describedby="stokHelp" value="{{ old('stok') ?? $produk->stok }}" />
                        @error('stok')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <img src="{{asset('images/produk/'.$produk->foto)}}" class="img-thumbnail" alt="{{ $produk->foto }}">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">foto</label>
                        <input name="foto" class="form-control" type="file" id="foto">
                        @error('foto')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info">Edit Produk</button>
                </form>
            </div>
        </div>
    </div>
@endsection
