@extends('layout.master')
@section('title', 'Produk')

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
                    @can('isAdmin')
                        <a href="{{ route('produk.create') }}" class="btn btn-success mb-3"><i class="bi bi-plus-square me-2"></i>Tambah Produk</a>
                    @endcan
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Foto Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    @can('isAdmin')
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $item)
                                    <tr>
                                        <td class="text-center"><img src="{{ asset('images/produk/' . $item->foto) }}"
                                                alt="{{ $item->nama }}" width="100" height="90"></td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->stok }}</td>
                                        @can('isAdmin')
                                            <td>
                                                <a href="{{ route('produk.edit', $item) }}" class="btn btn-warning">Update</a>
                                                <form action="{{ route('produk.destroy', $item) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Yakin Menghapus Produk ')"
                                                        class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
@endsection
