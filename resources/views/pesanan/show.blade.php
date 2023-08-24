@extends('layout.master')
@section('title', 'Detil Pesanan')
{{-- createPembayaran --}}
@section('content')
    <section class="py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    @if (Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                    @if (Session::has('failed'))
                        <p class="alert alert-danger">{{ Session::get('failed') }}</p>
                    @endif
                    <a href="{{ route('pesanan.createPesanan', $pembayaran) }}" class="btn btn-success mb-3"><i class="bi bi-plus-square me-2"></i>Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Produk</th>
                                    <th>jumlah</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $item)
                                    @if($item->idPembayaran == $pembayaran->id)
                                    <tr>
                                        <td class="text-center"><img src="{{ asset('images/produk/' . $item->produk->foto) }}"
                                                alt="{{ $item->produk->nama }}" width="100" height="90"></td>
                                        <td>{{ $item->produk->nama }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->jumlah * $item->produk->harga }}</td>
                                        <td>
                                            <a href="{{ route('pesanan.edit', $item) }}" class="btn btn-warning">Update</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('pesanan.destroy', $item) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Yakin Menghapus Pesanan')"
                                                    class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <form action="{{ route('pembayaran.setMetode', $pembayaran) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="lg-6 mb-3 justify-content-start">
                                @can('isKaryawan')
                                <label for="idPelanggan" class="form-label">Nama Pelanggan</label>
                                <div class="col-sm-3 mb-3">
                                    <select class="form-control" id="idPelanggan" name="idPelanggan">
                                        @foreach ($pelanggan as $pelanggans)
                                            <option value={{ $pelanggans->id }}>
                                                {{ $pelanggans->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endcan
                                <label for="metodePembayaran" class="form-label">Metode Pembayaran</label>
                                <div class="col-sm-3 mb-5">
                                    <select class="form-control" id="metodePembayaran" name="metodePembayaran">
                                        <option value="Transfer">Transfer</option>
                                        <option value="COD">COD</option>
                                    </select>
                                </div>
                                <button onclick="return confirm('Konfirmasi Pesanan')"
                                        class="btn btn-success">Simpan</button>
                                @error('metodePembayaran')
                                    <span class="text-danger mt-3">{{$message}}</span>
                                @enderror
                            </div>
                        </form>
                        <form action="{{ route('pembayaran.destroy', $pembayaran) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin Membatalkan Pesanan?')"
                                class="btn btn-danger">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection
