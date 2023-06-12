@extends('dashboard.layout.master')

@section('content')
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
        <form method="POST" action="/walas/kerawanan/store">
            @csrf

            <input type="hidden" name="wali_kelas_id" value="{{ $walas->id }}">
            
            <div class="mt-2">
                <label for="siswa_id">Siswa</label>
                <select class="select2 form-control" name="siswa_id" data-toggle="select2">
                    @foreach ($siswa as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            

            {{-- <div class="form-group">
                <label>Jenis Kerawanan</label>
                @foreach ($jenisKerawanan as $jk)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="jenis_kerawanan[]" value="{{ $jk }}">
                        <label class="form-check-label">
                            {{ $jk }}
                        </label>
                    </div>
                @endforeach
            </div> --}}
            <div class="mt-2">
                <label for="">Jenis Kerawanan</label>
            </div>
            <select class="select2 form-control select2-multiple" name="jenis_kerawanan[]" data-toggle="select2" multiple="multiple" required data-placeholder="Choose ...">
                @foreach ($jenisKerawanan as $jenis)
                <option value="{{$jenis}}">{{$jenis}}</option>
                @endforeach
            </select>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Add</button>
    
                </div>
        </form>

    </div>

@endsection
