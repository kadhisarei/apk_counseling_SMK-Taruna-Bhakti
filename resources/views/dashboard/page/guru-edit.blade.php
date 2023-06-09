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
        <form action="/admin/dashboard/guru/edit/{{$guru->id}}'" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="hidden" name="oldImage" value="{{$guru->profile_photo_path}}">
                @if($guru->profile_photo_path)
                <img src="{{asset('/storage/'.$guru->profile_photo_path)}}" class="img-preview img-fluid mb-3 col-sm-3 d-block" req alt="">
                @else
                <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                @endif
                <input id="image" autocomplete="off" type="file" name="profile_photo_path" class="form-control" onchange="previewImage()">
            </div>

            <div class="mb-3">
                <label class="form-label" for="validationCustom01">Nipd</label>
                <input type="text" name="nipd" value="{{$guru->nipd}}" class="form-control" id="validationCustom01" placeholder="First name"
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="validationCustom02">Nama</label>
                <input type="text" name="nama" value="{{$guru->nama}}" class="form-control" id="validationCustom02" placeholder="Last name"
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="Pria" @if($guru->jenis_kelamin === 'Pria') selected @endif>Pria</option>
                    <option value="perempuan" @if($guru->jenis_kelamin === 'perempuan') selected @endif>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="validationCustom02">Email</label>
                <input type="text" name="email" value="{{ $guru->user->email }}" class="form-control" id="validationCustom02" placeholder="Email" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">SAVE</button>
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
