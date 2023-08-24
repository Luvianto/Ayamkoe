@extends('layout.master')
@section('title', 'Akun')

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
                    <a href="{{ route('user.create') }}" class="btn btn-success mb-3"><i class="bi bi-plus-square me-2"></i>Tambah Akun</a>
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th>Email</th>
                                    @can('isAdmin')
                                        <th>Role</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->noTelp }}</td>
                                        <td>{{ $item->email }}</td>
                                        @can('isAdmin')
                                            <td>{{ $item->role }}</td>
                                            <td>
                                                <a href="{{ route('user.edit', $item) }}" class="btn btn-warning">Update</a>
                                            </td>
                                        <td>
                                            <form action="{{ route('user.destroy', $item) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Yakin Menghapus Akun?')"
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
