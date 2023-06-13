@extends('app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
    .show {
        display: block;
    }

    .hide {
        display: none !important
    }

    /* .select2-container--default .select2-selection--multiple{
            display: none
        } */

</style>
@section('content')
<div class="bods">
    <div class="profil-container">
        <div class="textcont">
            <h4>Profil Siswa</h4>
        </div>
        <div class="infotab">
            <div class="imageavatar">
                <img class="avatar"
                    src="https://png.pngtree.com/png-clipart/20220719/original/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_8385663.png"
                    alt="">
            </div>

            <div class="infolist">
                <div>
                    <p class="banner">Nama :</p>
                    <p>Ibrahim Khalis</p>
                </div>
                <div>
                    <p class="banner">Jenis Kelamin :</p>
                    <p>Laki - Laki</p>
                </div>
                <div>
                    <p class="banner">Nisn :</p>
                    <p>090998</p>
                </div>
                <div>
                    <p class="banner">Kelas :</p>
                    <p>XI PPLG II</p>
                </div>
                <div>
                    <p class="banner">Email :</p>
                    <p>XI PPLG II</p>
                </div>
                <div>
                    <p class="banner">Tanggal Lahir :</p>
                    <p>XI PPLG II</p>
                </div>
            </div>

        </div>
    </div>

    <div class="servicetype">
        <div class="textcont">
            <h4>Layanan Konseling</h4>
        </div>
        <div class="typelist">
            <div>
                <p>Layanan Konseling</p>
                <select name="" id="">
                    <option value=""></option>
                </select>
            </div>
            <div>
                <p>Tanggal Konseling</p>
                <input type="date">
            </div>
            <div>
                <p>Waktu Konseling</p>
                <input type="time">
            </div>
            <div>
                <p>Tempat Konseling</p>
                <input type="text">
            </div>
            <div>
                <p>Topik Pembicaraan</p>
                <input type="text">
            </div>
            <div>
                <button>Ajukan</button>
            </div>

        </div>
    </div>

    <div class="history-container">
        <div class="textcont">
            <h4>Daftar Konseling</h4>
        </div>

        <div class="boxwrap">

            <div class="box">
                <div class="centered">
                    <p>Keterangan</p>
                </div>
                <div class="wrapper">
                    <div class="element1">

                        <div>21</div>
                        <div>Nov</div>
                        <div>2021</div>

                    </div>
                    <div class="element2">

                        <div>
                            <p>Bimbingan Pribadi</p>
                        </div>
                        <div>Approved</div>

                    </div>
                </div>
            </div>
            <div class="box">
                <div class="centered">
                    <p>Keterangan</p>
                </div>
                <div class="wrapper">
                    <div class="element1">

                        <div>21</div>
                        <div>Nov</div>
                        <div>2021</div>

                    </div>
                    <div class="element2">

                        <div>
                            <p>Bimbingan Pribadi</p>
                        </div>
                        <div>Approved</div>

                    </div>
                </div>
            </div>
            <div class="box">
                <div class="centered">
                    <p>Keterangan</p>
                </div>
                <div class="wrapper">
                    <div class="element1">

                        <div>21</div>
                        <div>Nov</div>
                        <div>2021</div>

                    </div>
                    <div class="element2">

                        <div>
                            <p>Bimbingan Pribadi</p>
                        </div>
                        <div>Approved</div>

                    </div>
                </div>
            </div>
            <div class="box">
                <div class="centered">
                    <p>Keterangan</p>
                </div>
                <div class="wrapper">
                    <div class="element1">

                        <div>21</div>
                        <div>Nov</div>
                        <div>2021</div>

                    </div>
                    <div class="element2">

                        <div>
                            <p>Bimbingan Pribadi</p>
                        </div>
                        <div>Approved</div>

                    </div>
                </div>
            </div>
            
            

        </div>



    </div>

</div>

@endsection
