@extends('app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<header>
    <div class="top-header">
        <div class="left-header">
            <div class="small-text">
                <h1>SMK TARUNA BHAKTI</h1>
            </div>
            <div class="title-header">
                {{-- <h1>Bimbingan Konseling</h1> --}}
                <h1>Percayakan Cerita Personal</h1>
                <h1>Pada Yang Profesional</h1>
            </div>
            <div class="description-header">
                <p>Bimbingan Konseling SMK Taruna Bhakti online atau yang bisa disebut dengan <span class="logo-desc">C<span class="o">o</span>unseling</span> ini digunakan untuk para murid yang ingin berkonsultasi masalah dengan para ahlinya.</p>
                {{-- <p>Bimbingan Konseling SMK Taruna Bhakti online atau yang bisa disebut dengan Counseling ini digunakan untuk para murid yang ingin berkonsultasi masalah dengan para ahlinya.</p> --}}
            </div>
        </div>
        <div class="right-header">
            <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_fetkcs3q.json"  background="transparent"  speed="1"   loop autoplay></lottie-player>
        </div>
    </div>
</header>
<div class="button-header">
    <div class="button">
        <div class="circle-logo"><i class="fa-solid fa-user"></i></div>
        <p>Guru</p>
    </div>
    <div class="button">
        <div class="circle-logo"><i class="fa-solid fa-star"></i></div>
        <p>Testimoni</p>
    </div>
</div>
@endsection