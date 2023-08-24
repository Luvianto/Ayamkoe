@extends('layout.master')
@section('title', 'Ubah Pesanan')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-8 text-center">
                <h1>Edit Pesanan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8 d-flex justify-content-center align-items-center container-fluid">
                <form method="POST" enctype="multipart/form-data" action="{{ route('pesanan.update', $pesanan) }}"
                    class="container-fluid">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="idProduk" class="form-label">Produk</label>
                            <select class="form-control" id="idProduk" name="idProduk">
                                @foreach ($produk as $item)
                                <option
                                @if ($pesanan->idProduk == $item->id)
                                    selected
                                @endif
                                value="{{ $item['id'] }}">
                                    {{ $item['nama'] }}
                                </option>
                                @endforeach
                            </select>
                        @error('idProduk')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input required type="text" name="jumlah" class="form-control" id="jumlah"
                            aria-describedby="namaHelp" value="{{ old('jumlah') ?? $pesanan->jumlah }}" />
                        @error('jumlah')
                            <span class="text-danger mt-3">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info">Edit Pesanan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
