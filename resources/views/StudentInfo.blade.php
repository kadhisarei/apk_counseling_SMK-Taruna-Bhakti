@extends('app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                {{-- <div class="jenis-layanan">
                    <div class="layanan">
                        <div class="blur"></div>
                        <h1>Bimbingan Pribadi</h1>
                    </div>
                </div> --}}
                <form action="{{ route('layanan-store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_bk" value="{{ $profile->kelas->guru->id }}">
                    <input type="hidden" name="id_walas" value="{{ $profile->kelas->wali_kelas->id }}">
                    <select id="service" class="service" name="id_layanan">
                        <option value="" selected hidden>Jenis Layanan</option>
                        @foreach ($layananBK as $layanan)
                        <option value="{{ $layanan->id }}">{{ $layanan->jenis_layanan }}</option>
                        @endforeach
                    </select>

                    {{-- <select name="teman[]" id="sosialField" multiple placeholder="Select a state..." autocomplete="off">
                            <option value="">Select a state...</option>
                            @foreach ($siswa as $siswas)    
                                @if(auth()->user()->siswa->id == $siswas->id )
                                @else
                                <option value="{{ $siswas->id }}">{{ $siswas->nama }}</option>
                                @endif                        
                            @endforeach
                    </select>                    --}}

                    <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                        <option value="AL">Alabama</option>
                          ...
                        <option value="WY">Wyoming</option>
                      </select>
                    <input type="date" placeholder="Tanggal" class="service" name="tanggal_konseling">
                    <button type="submit">Ajukan</button>
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

<script>
    // $(document).ready(function() {
    //         $('#service').change(function() {
    //             var selectedService = $(this).val();
    //             if (selectedService == 4) {     
    //                 $('#sosialField').show();
    //             } else {
    //                 $('#sosialField').hide();
    //             }
    //         });
    //     });
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});


        new TomSelect("#sosialField",{
            maxItems: 3
        });
        
</script>
@endsection
