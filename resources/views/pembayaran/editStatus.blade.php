@extends('layout.master')
@section('title', 'Ubah Akun')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-8 text-center">
                <h1>Edit Status</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8 d-flex justify-content-center align-items-center container-fluid">
                <form method="POST" enctype="multipart/form-data" action="{{ route('pembayaran.update', $pembayaran) }}"
                    class="container-fluid">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="status" name="status">
                                <option value="Pesanan diterima">Pesanan diterima</option>
                                <option value="Pesanan dikirim">Pesanan dikirim</option>
                            </select>
                          </div>
                        @error('status')
                            <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info">Edit Status</button>
                </form>
            </div>
        </div>
    </div>
@endsection
