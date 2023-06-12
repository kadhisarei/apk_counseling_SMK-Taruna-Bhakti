@extends('app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection

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
                <p>Bimbingan Konseling SMK Taruna Bhakti online atau yang bisa disebut dengan <span
                        class="logo-desc">C<span class="o">o</span>unseling</span> ini digunakan untuk para murid yang
                    ingin berkonsultasi masalah dengan para ahlinya.</p>
                {{-- <p>Bimbingan Konseling SMK Taruna Bhakti online atau yang bisa disebut dengan Counseling ini digunakan untuk para murid yang ingin berkonsultasi masalah dengan para ahlinya.</p> --}}
            </div>
        </div>
        <div class="right-header">
            <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_fetkcs3q.json" background="transparent"
                speed="1" loop autoplay></lottie-player>
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
<div class="content-about">
    <div class="about">
        <div class="left-about">
            <lottie-player class="image" src="{{ asset('lottie/aboutUs.json') }}" background="transparent" speed="1"
                style="width: 75%;" loop autoplay></lottie-player>
        </div>
        <div class="right-about">
            <h1>TENTANG KAMI</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum earum laboriosam commodi atque incidunt
                provident animi voluptate nam nesciunt reprehenderit. Lorem ipsum, dolor sit amet consectetur
                adipisicing elit. Voluptatem fugit est officia! Asperiores dolores optio sint quia aperiam id sapiente?
            </p>
        </div>
    </div>
</div>

<div class="alur-consult">
    <div class="alur">
        <div class="title-alur">
            <div class="circle-alur">
                <i class="fa-solid fa-wave-square"></i>
            </div>
            <h1>Alur Konsultasi</h1>
        </div>
        <div class="card-alur">
            <div class="card">
                <div class="illustration">
                    <img src="{{ asset('img/login.svg') }}" alt="">
                </div>
                <h1>1. Login</h1>
                <p>Login dengan accountmu yang sudah diberikan sekolah</p>
            </div>
            <div class="card">
                <div class="illustration">
                    <img src="{{ asset('img/date.svg') }}" alt="">
                </div>
                <h1>2. Jadwalkan sesi</h1>
                <p>Pilih layanan dan jadwalmu sendiri melalui form Counseling</p>
            </div>
            <div class="card">
                <div class="illustration">
                    <img src="{{ asset('img/consult.svg') }}" alt="">
                </div>
                <h1>2. Mulai Konsultasi</h1>
                <p>Mulai konsultasimu sesuai yang sudah ditentukan</p>
            </div>
        </div>
    </div>
</div>

<div class="container-guru">
    <div class="content-guru">
        <div class="left-guru">
            <div class="bar"></div>
            <div class="text">
                <h1>Para ahli yang akan menemani konselingmu</h1>
                <p>Counseling mempunyai 12 para guru yang mana ahli dalam menangani masalah siswa/siswi dengan baik dan
                    akan bersedia menjadi teman ceritamu atau mentormu</p>
            </div>
        </div>
        {{-- <div class="cards-guru">
                <div class="card-guru">
                    <img src="{{ asset('img/guru1.jpg') }}" alt="">
                    <div class="body-card">
                        <h1>Ricky Sudrajat</h1>
                        <div class="line"></div>
                        <p>“There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The
                            third way is to be kind.”</p>
                    </div>
                </div>
                <div class="card-guru">
                    <img src="{{ asset('img/guru1.jpg') }}" alt="">
                    <div class="body-card">
                        <h1>Ricky Sudrajat</h1>
                        <div class="line"></div>
                        <p>“There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The
                            third way is to be kind.”</p>
                    </div>
                </div>
                <div class="card-guru">
                    <img src="{{ asset('img/guru1.jpg') }}" alt="">
                    <div class="body-card">
                        <h1>Ricky Sudrajat</h1>
                        <div class="line"></div>
                        <p>“There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The
                            third way is to be kind.”</p>
                    </div>
                </div>
        </div>   --}}
        <div class="wrapper">
            <div class="carousell">
                <div class="card-guru" draggable="false">
                    <img src="{{ asset('img/guru1.jpg') }}" alt="" draggable="false">
                    <div class="body-card">
                        <h1>Ricky Sudrajat</h1>
                        <div class="line"></div>
                        <p>“There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The
                            third way is to be kind.”</p>
                    </div>
                </div>
                <div class="card-guru" draggable="false">
                    <img src="{{ asset('img/guru1.jpg') }}" alt="" draggable="false">
                    <div class="body-card">
                        <h1>Ricky Sudrajat</h1>
                        <div class="line"></div>
                        <p>“There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The
                            third way is to be kind.”</p>
                    </div>
                </div>
                <div class="card-guru" draggable="false">
                    <img src="{{ asset('img/guru1.jpg') }}" alt="" draggable="false">
                    <div class="body-card">
                        <h1>Ricky Sudrajat</h1>
                        <div class="line"></div>
                        <p>“There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The
                            third way is to be kind.”</p>
                    </div>
                </div>
                <div class="card-guru" draggable="false">
                    <img src="{{ asset('img/guru1.jpg') }}" alt="" draggable="false">
                    <div class="body-card">
                        <h1>Ricky Sudrajat</h1>
                        <div class="line"></div>
                        <p>“There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The
                            third way is to be kind.”</p>
                    </div>
                </div>
                <div class="card-guru" draggable="false">
                    <img src="{{ asset('img/guru1.jpg') }}" alt="" draggable="false">
                    <div class="body-card">
                        <h1>Ricky Sudrajat</h1>
                        <div class="line"></div>
                        <p>“There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The
                            third way is to be kind.”</p>
                    </div>
                </div>
                
            </div>
        </div>
</div>
</div>
<div class="container-review">
    <div class="review">
        <h1 class="title-review">Apa Kata Mereka?</h1>
        <div class="cards-review">
            <div class="card-review">
                <div class="avatar-review"><img src="{{ asset('img/avatar-women.svg') }}" alt=""></div>
                <h1>Khalisha Putri</h1>
                <h2>(Bimbingan Pribadi)</h2>
                <p>“Menyenangkan dan insightful. Bisa berdiskusi tanpa harus takut di judge. Senang bisa dibantu untuk
                    memetakan masalah dan diberi saran untuk menangani masalah yang ada. Bukan hanya diberi solusi, tapi
                    mentor juga mengajak kita berpikir dan menyadari mengenai kondisi saat ini.”</p>
            </div>
            <div class="card-review">
                <div class="avatar-review"><img src="{{ asset('img/avatar-men.svg') }}" alt=""></div>
                <h1>Ibrahim Khalish</h1>
                <h2>(Bimbingan Sosial)</h2>
                <p>“Menyenangkan dan insightful. Bisa berdiskusi tanpa harus takut di judge. Senang bisa dibantu untuk
                    memetakan masalah dan diberi saran untuk menangani masalah yang ada. Bukan hanya diberi solusi, tapi
                    mentor juga mengajak kita berpikir dan menyadari mengenai kondisi saat ini.”</p>
            </div>
            <div class="card-review">
                <div class="avatar-review"><img src="{{ asset('img/avatar-women2.svg') }}" alt=""></div>
                <h1>Anya Erica</h1>
                <h2>(Bimbingan Belajar)</h2>
                <p>“Menyenangkan dan insightful. Bisa berdiskusi tanpa harus takut di judge. Senang bisa dibantu untuk
                    memetakan masalah dan diberi saran untuk menangani masalah yang ada. Bukan hanya diberi solusi, tapi
                    mentor juga mengajak kita berpikir dan menyadari mengenai kondisi saat ini.”</p>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/carousell.js') }}"></script>
{{-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> --}}
</body>

</html>
