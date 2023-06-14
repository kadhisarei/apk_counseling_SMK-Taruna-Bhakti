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
        <form method="POST" action="{{ route('quote-store') }}">
            @csrf
            <div class="mt-2">
                <label for="siswa_id">Quote Of The Day</label>
                <input class="form-control" type="text" name="quote" id="">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
@endsection
