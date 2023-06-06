<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    @include('components.nav')

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
<<<<<<< HEAD
    {{-- <form action="/logout" method="post">
        @csrf
        <button href="#" type="submit" class="dropdown-item notify-item">
            <i class="mdi mdi-logout me-1"></i>
            <span>Logout</span>
        </button>
    </form> --}}
=======
    
>>>>>>> 64d5457e7d9b07621d93c113ceb845525c965ab9

    @include('components.footer')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>