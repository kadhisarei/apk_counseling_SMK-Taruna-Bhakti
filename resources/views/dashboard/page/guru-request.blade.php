@extends('dashboard.layout.master')

@section('content')
<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Siswa</li>
                    </ol>
                </div>
                <h4 class="page-title">Data Kerawanan</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
    <div class="mb-3">
    <a href="/guru/kerawanan/index" type="button" class="btn btn-primary">Add New</a>

    </div>

    <div class="card">
        @foreach ($konseling as $item)
            <p>{{ $item->id_bk }}</p>
        @endforeach
        <div class="card-body">
            <table class="table table-hover table-centered mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Layanan</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($konseling as $item)
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item }}</td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>                                  
  </div>
@endsection