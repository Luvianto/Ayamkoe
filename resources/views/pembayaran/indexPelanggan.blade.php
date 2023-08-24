@extends('layout.master')
@section('title', 'Pembayaran')
{{-- pesananku --}}
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
                    <a href="{{ route('pembayaran.create') }}" class="btn btn-success mb-3"><i class="bi bi-plus-square me-2"></i>Tambah Pesanan</a>
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Ringkasan Pesanan</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembayaran as $item)
                                    @if ($item->idUser == $pelanggan)
                                    <tr>
                                        <td>
                                            @foreach ($pesanan as $pesanans)
                                                @if($pesanans->idPembayaran == $item->id)
                                                    {{ $pesanans->nama }}
                                                    {{ $pesanans->jumlah }}
                                                    <br>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $item->metodePembayaran }}</td>
                                        <td>
                                            @foreach ($totalHarga as $totalHargas)
                                                @if($totalHargas->idPembayaran == $item->id)
                                                    {{ $totalHargas->totalHarga }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $item->status }}</td>

                                        @if($item->status == 'Pending')
                                            <td>
                                                <a href="{{ route('pesanan.show', $item) }}" class="btn btn-warning">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('pembayaran.destroy', $item) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Yakin Menghapus Pesanan')"
                                                        class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{ route('pesanan.showNonEditable', $item) }}" class="btn btn-warning">Detil Pesanan</a>
                                            </td>
                                            <td></td>
                                        @endif
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
