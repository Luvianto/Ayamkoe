@extends('layout.master')
@section('title','Halaman utama')

@section('content')
<section class="hero" id="home">
    <main class="content">
        <h1>Ayamkoe <span>Bukan Ayamoe</span></h1>
        <p>
            Ayamkoe merupakan tempat dimana cita rasa segar bertemu dengan kualitas terbaik.<br>
            Nikmati kelezatan ayam pilihan kami yang telah dirawat dengan cinta.
        </p>
        <a href="{{ route('pembayaran.create') }}" class="cta">Pesan Sekarang</a>
    </main>
</section>
@endsection
