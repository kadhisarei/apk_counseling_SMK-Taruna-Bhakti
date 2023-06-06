<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Info</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    @include('components.nav')

    <div class="bods">
        <div class="base">
            <div class="whitebox">
                <h2>Profil Siswa</h2>
                <div class="profile-container">
                        <img class="avatar" src="https://png.pngtree.com/png-clipart/20220719/original/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_8385663.png" alt="">
                    <div class="form">
                        <div>Nama</div>
                        <div>Kelas</div>
                        <div>TTL</div>
                        <div>Jenis Kelamin</div>
                        <div>NIPD</div>
                    </div>
                </div>
            </div>
            <br> <br>
            <div class="whitebox2">
                <h2>Pilihan Layanan</h2>
                <form action="">
                    <select name="" id="" class="service">
                        <option value="">Jenis Layanan</option>
                        <option value="">op2</option>
                        <option value="">op3</option>
                        <option value="">op4</option>
                    </select>
                    <input type="date" placeholder="Tanggal" class="service">
                    <button>Ajukan</button>
                </form>
            </div>
            <br> <br>
            <div class="whitebox2">
                <div>
                    <div class="box">
                        <div class="datebox">
                            <div class="minidatebox">
                                <input type="number">
                                <input type="number">
                                <input type="number">
                            </div>
                        </div>
                        <div class="descbox">
                            <div class="status">
                                <p>Keterangan</p>
                            </div>
                            <div class="field">
                                <p>Bimbingan Sosial</p>
                                <div>DITERIMA</div>
                            </div>
                        </div>
                    </div>  
                    <div class="box">
                        <div class="datebox">
                            <div class="minidatebox">
                                <input type="number">
                                <input type="number">
                                <input type="number">
                            </div>
                        </div>
                        <div class="descbox">
                            <div class="status">
                                <p>Keterangan</p>
                            </div>
                            <div class="field">
                                <p>Bimbingan Sosial</p>
                                <div>DITERIMA</div>
                            </div>
                        </div>
                    </div>   
                    <div class="box">
                        <div class="datebox">
                            <div class="minidatebox">
                                <input type="number">
                                <input type="number">
                                <input type="number">
                            </div>
                        </div>
                        <div class="descbox">
                            <div class="status">
                                <p>Keterangan</p>
                            </div>
                            <div class="field">
                                <p>Bimbingan Sosial</p>
                                <div>DITERIMA</div>
                            </div>
                        </div>
                    </div>   
                    <div class="box">
                        <div class="datebox">
                            <div class="minidatebox">
                                <input type="number">
                                <input type="number">
                                <input type="number">
                            </div>
                        </div>
                        <div class="descbox">
                            <div class="status">
                                <p>Keterangan</p>
                            </div>
                            <div class="field">
                                <p>Bimbingan Sosial</p>
                                <div>DITERIMA</div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>
</html>