@extends('dashboard.layout.master')

@section('content')
    <style>
        #man{
            resize: none;
        }
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
        <form method="POST" action="/guru/kerawanan/store">
            @csrf

            <div class="mt-2">
                <label for="siswa_id">Wali Kelas</label>
                <select class="select2 form-control" name="wali_kelas_id" data-toggle="select2">
                        <option value="{{ $wakel->id }}">{{ $wakel->nama }}</option>
                </select>
            </div>
            
            <div class="mt-2">
                <label for="siswa_id">Siswa</label>
                <select class="select2 form-control" name="siswa_id" data-toggle="select2">
                    @foreach ($siswa as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mt-2">
                <label for="">Jenis Kerawanan</label>
            </div>
            <select class="select2 form-control select2-multiple" name="jenis_kerawanan[]" data-toggle="select2" multiple="multiple" required data-placeholder="Choose ...">
                @foreach ($jenisKerawanan as $jenis)
                <option value="{{$jenis}}">{{$jenis}}</option>
                @endforeach
            </select>

            <div class="mt-2">
                <label class="form-label" for="validationCustom02">Kesimpulan</label>  
                <textarea name="kesimpulan" required  class="form-control" id="man" rows="5"></textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Tambah</button>
    
            </div>
        </form>

    </div>

@endsection
