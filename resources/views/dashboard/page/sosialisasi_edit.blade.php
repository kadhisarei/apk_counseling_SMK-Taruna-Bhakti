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
        <form action="/guru/sosialisasi/update/{{ $Sosialisasi->id }}" enctype="multipart/form-data" method="POST"
            class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="hidden" name="oldImage" value="{{ $Sosialisasi->photo }}">
                @if ($Sosialisasi->photo)
                    <img src="{{ asset('/storage/' . $Sosialisasi->photo) }}"
                        class="img-preview img-fluid mb-3 col-sm-3 d-block" req alt="">
                @else
                    <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                @endif
                <input id="image" autocomplete="off" type="file" name="photo" class="form-control"
                    onchange="previewImage()">
            </div>

            <div class="mt-2">
                <label class="form-label" for="validationCustom02">Judul</label>
                <input type="text" value="{{ $Sosialisasi->judul }}" name="judul" class="form-control"
                    id="validationCustom02" placeholder="Judul" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="mt-2">
                <label for="example-date" for="validationCustom02" class="form-label">Tanggal</label>
                <input value="{{ $Sosialisasi->tanggal }}" class="form-control" id="validationCustom01" id="example-date"
                    type="date" name="tanggal" required>
            </div>

            <div class="mt-2">
                <label class="form-label" for="validationCustom02">Tempat</label>
                <input value="{{ $Sosialisasi->tempat }}" type="text" name="tempat" class="form-control"
                    id="validationCustom02" placeholder="Tempat" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="mt-3">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>

        <script>
            function previewImage() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview')
                imgPreview.style.display = 'block'

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>

    </div>
@endsection
