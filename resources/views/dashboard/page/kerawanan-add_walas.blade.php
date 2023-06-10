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
            
            <div class="mb-3">
                <label for="siswa_id">Siswa</label>
                <select id="siswa_id" name="siswa_id" class="form-select">
                    @foreach ($siswa as $s)
                        <option value="{{ $s->id }}">{{ $s->nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="form-group">
                <label for="jenis_kerawanan">Jenis Kerawanan</label>
                <select name="jenis_kerawanan[]" id="jenis_kerawanan" class="tom-select" multiple>
                    <option value="Bully">Bullying</option>
                    <option value="Kekerasan">Kekerasan</option>
                    <option value="Narkoba">Narkoba</option>
                    <!-- Tambahkan pilihan jenis kerawanan lainnya di sini -->
                </select>
            </div> --}}

            <div class="form-group">
                <label>Jenis Kerawanan</label>
                @foreach ($jenisKerawanan as $jk)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="jenis_kerawanan[]" value="{{ $jk }}">
                        <label class="form-check-label">
                            {{ $jk }}
                        </label>
                    </div>
                @endforeach
                
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>

@endsection
