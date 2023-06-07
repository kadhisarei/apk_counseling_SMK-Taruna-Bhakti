@extends('dashboard.layout.master')

@section('content')
    <div class="container-fluid">
        @if($errors->any())
                <div class="mt-2 alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="/admin/dashboard/kelas/store" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label class="form-label" for="validationCustom01">Kelas</label>
                <input type="text" name="nama" class="form-control" id="validationCustom01" placeholder="Nama Kelas"
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="mb-3">
                <label for="example-select" class="form-label">WaliKelas</label>
                <select name="wali_kelas_id" class="form-select" id="example-select">
                    @foreach ($walas as $item)
                        <option class="form-select" value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="example-select" class="form-label">Guru Bk</label>
                <select name="guru_id" class="form-select" id="example-select">
                    @foreach ($guru as $item)
                        <option class="form-select" value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
