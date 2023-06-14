@extends('dashboard.layout.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@endsection

@section('content')
    <style>
        #man{
            resize: none;
        }
        /* .show{
            display: block;
        }
        .hide{
            display: none !important
        } */
    </style>
    <div class="container-fluid">
        @if ($errors->any())
            <div class="mt-2 alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('store-guru') }}">
            @csrf
            <input type="hidden" name="id_walas" value="">
            {{-- <input type="text" name="id_walas" value="{{ $profile }}"> --}}
            <div class="mt-2">
                <label for="siswa_id">Layanan Konseling</label>
                <select name="id_layanan" id="service" class="form-control" name="id_layanan">
                    <option value="" selected hidden>Jenis Layanan</option>
                        @foreach ($layananBK as $layanan)
                        <option value="{{ $layanan->id }}">{{ $layanan->jenis_layanan }}</option>
                        @endforeach
                </select>
            </div>
                <label for="">Nama siswa</label>
                <select name="siswa[]" id="sosialbro" multiple placeholder="Select a state..." autocomplete="off" data-toggle="select2">
                        <option value="">Select a state...</option>
                        @foreach ($siswa as $siswas)    
                            <option value="{{ $siswas->id }}">{{ $siswas->nama }}</option>
                        @endforeach
                </select>                   
            <div class="mt-2">
                <label for="siswa_id">Tanggal Konseling</label>
                <input class="form-control" type="date" name="tanggal_konseling" id="">
            </div>
            <div class="mt-2">
                <label for="siswa_id">Waktu Konseling</label>
                <input class="form-control" type="time" name="jam_mulai" id="">
            </div>
            <div class="mt-2">
                <label for="siswa_id">Tempat Konseling</label>
                <input class="form-control" type="text" name="tempat" id="">
            </div>
            <div class="mt-2">
                <label for="siswa_id">Topik Pembicaraan</label>
                <input class="form-control" type="text" name="pesan" id="">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>

    </div>

    <script>
        $(document).ready(function() {
            new tomSelect('#selectbro')
            });
            
    </script>
@endsection
