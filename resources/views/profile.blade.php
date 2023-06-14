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
    a{
        color: aliceblue
    }
    /* .select-teman{
        background-color: yellow !important;
        color: #bb2020 !important;
    }
    .select-teman option{
        background-color: aqua !important;
        color: #24d311 !important;
    } */
    .ts-control{
        background-color: white;
        outline-offset: 5px;
        outline: 2px solid var(--yellow);
        border-radius: 25px;
        color: #000000;
        transition: all .4s;
        font-family: 'Quicksand';
        font-weight: 700;
    }
    .ts-dropdown-content{
        background-color: var(--white) !important;
    }
    #sosialbro-opt-{}.option{
        color: #000000 !important
    }
    /* .select2-container--default .select2-selection--multiple{
            display: none
        } */

</style>
@section('content')
<div class="container-layanan">
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
                <form action="{{ route('layanan-store') }}" method="post">
                    @csrf
                    <div>
                        <input type="hidden" name="id_bk" value="{{ $profile->kelas->guru->id }}">
                        <input type="hidden" name="id_walas" value="{{ $profile->kelas->wali_kelas->id }}">
                        <p>Layanan Konseling:</p>
                        <select name="id_layanan" id="service">
                            @foreach ($layananBK as $layanan)
                            <option value="" selected hidden>Jenis Layanan</option>                       
                            <option style="color:#000000" value="{{ $layanan->id }}">{{ $layanan->jenis_layanan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="apakek hide">
                        <p>Nama Teman:</p>
                            <select style="color: aqua" class="select-teman" name="teman[]" id="sosialbro" multiple placeholder="Select a state..." autocomplete="off">
                                    <option value="">Select a state...</option>
                                    @foreach ($siswa as $siswas)    
                                        @if(auth()->user()->siswa->id == $siswas->id )
                                        @else
                                        <option style="color:#000000" value="{{ $siswas->id }}">{{ $siswas->nama }}</option>
                                        @endif                        
                                    @endforeach
                            </select>                   
                    </div>
                    <div>
                        <p>Tanggal Konseling:</p>
                        <input type="date" name="tanggal_konseling">
                    </div>
                    <div>
                        <p>Waktu Konseling:</p>
                        <input type="time" name="jam_mulai">
                    </div>
                    <div>
                        <p>Tempat Konseling:</p>
                        <input type="text" name="tempat">
                    </div>
                    <div>
                        <p>Topik Pembicaraan:</p>
                        <input type="text" name="pesan">
                    </div>
                    <div>
                        <button type="submit">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    
        <div class="history-container">
            <div class="textcont">
                <h4>Daftar Konseling</h4>
            </div>
            <div class="boxwrap">
                @foreach ($konselingBK as $item)    
                <div class="box">
                    <div class="centered">
                        <p>Keterangan</p>
                    </div>
                    <div class="wrapper">
                        <div class="element1">
                            <div>{{ $hari }}</div>
                            <div>{{ $bulan }}</div>
                            <div>{{ $tahun }}</div>
                        </div>
                        <div class="element2">
    
                            <div>
                                <p>{{ $item->layanan->jenis_layanan }}</p>
                            </div>
                            <div>{{ $item->status }}</div>
    
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="quote">
            <div class="title-quote">
                <h1>Quotes Of The Day</h1>
            </div>
            <div class="text-quote">
                @foreach ($quotes as $item)
                <h1>"{{ $item->quotes }}"</h1>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
            $('#service').change(function() {
                var selectedService = $(this).val();
                if (selectedService == 4) {
                    $('.apakek').toggleClass('hide show')
                    new tomSelect('#sosialbro')
                    // $('#sosialbro').select2()
                } else{
                    if ($('.apakek').hasClass('show')) {
                        $('.apakek').toggleClass('show hide')
                    }
                }    
            });

        });
        
</script>
@endsection
