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
        <form action="/admin/dashboard/guru/store" method="POST" enctype="multipart/form-data" class="needs-validation"
            novalidate>
            @csrf
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <img src="" class="img-preview img-fluid mb-3 col-sm-2" alt="">
                <input id="image" autocomplete="off" type="file" name="profile_photo_path" {{oLd('image')}} class="form-control" onchange="previewImage()">
            </div>

            <div class="mb-3">
                <label class="form-label" for="validationCustom01">Nipd</label>
                <input type="text" name="nipd" class="form-control" id="validationCustom01" placeholder="First name"
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="validationCustom02">Nama</label>
                <input type="text" name="nama" class="form-control" id="validationCustom02" placeholder="Last name"
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="mb-3">
                <label for="example-select" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jenis_kelamin">
                    <option value="Pria">Pria</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="validationCustom02">Email</label>
                <input type="text" name="email" class="form-control" id="validationCustom02" placeholder="Email"
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Enter your password" required>
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>


    </div>
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
@endsection
