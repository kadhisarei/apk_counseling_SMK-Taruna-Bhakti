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

        <form action="/walas/kerawanan/edit/{{$petaKerawanan->id}}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="wali_kelas_id" value="{{ $walas->id }}">

            <div class="mt-2">
                <label for="siswa_id" class="form-label">Siswa</label>
                <select class="select2 form-control" data-toggle="select2" name="siswa_id" id="siswa_id">
                    @foreach ($siswa as $item)
                    <option value="{{ $item->id }}" @if($item->id == $petaKerawanan->siswa_id) selected @endif>{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="form-group">
                <label for="jenis_kerawanan">Jenis Kerawanan</label>
                <div class="checkbox-list">
                    @foreach ($jenisKerawanan as $jenis)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="jenis_kerawanan[]" value="{{ $jenis }}" {{ in_array($jenis, explode(',', $petaKerawanan->jenis_kerawanan)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="jenis_kerawanan">{{ $jenis }}</label>
                        </div>
                    @endforeach
                </div>
            </div> --}}
            <div class="form-group">
                <label for="jenis_kerawanan">Jenis Kerawanan</label>
                <select class="select2 form-control select2-multiple" name="jenis_kerawanan[]" {{ in_array($jenisKerawanan, explode(',', $petaKerawanan->jenis_kerawanan)) ? 'selected' : '' }} data-toggle="select2" multiple>
                    @foreach ($jenisKerawanan as $jenis)
                        <option value="{{ $jenis }}" {{ in_array($jenis, explode(',', $petaKerawanan->jenis_kerawanan)) ? 'selected' : '' }}>
                            {{ $jenis }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update</button>

            </div>
        </form>

    </div>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

@endsection
