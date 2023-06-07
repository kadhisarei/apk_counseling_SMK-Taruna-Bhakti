@extends('app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">   
@endsection

@section('content')
<div class="content">
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
                        <option value="" selected hidden>Jenis Layanan</option>
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
</div>
@endsection