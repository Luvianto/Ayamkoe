@extends('layout.master')
@section('title', 'Detil Pesanan')

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
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
@endsection
