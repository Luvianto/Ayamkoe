@extends('layout.master')
@section('title', 'Halaman Tambah Pesanan')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-8 text-center">
                <h1>Tambah Pesanan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8 d-flex justify-content-center align-items-center container-fluid">
                <form method="POST" enctype="multipart/form-data" action="{{ route('pesanan.storePesanan', $pembayaran) }}" class="container-fluid">
                    @csrf
                    <div class="mb-3">
                        <label for="idProduk" class="form-label">Produk</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="idProduk" name="idProduk" placeholder="Pilih Nama Produk">
                                @foreach ($produk as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama }}
                                </option>
                                @endforeach
                            </select>
                          </div>
                        @error('idProduk')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">jumlah</label>
                        <input required type="number" name="jumlah" class="form-control" id="jumlah"
                            aria-describedby="jumlahHelp" value="{{ old('jumlah') }}" />
                        @error('jumlah')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Pesanan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
