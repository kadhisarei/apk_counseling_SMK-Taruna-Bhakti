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
                <h4 class="page-title">Data Hasil Konseling</h4>
            </div>
        </div>
    </div>     
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ $message }}
    </div>
    @endif
    <!-- end page title --> 


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="scroll-vertical-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Siswa</th>
                            <th>Layanan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Hasil Konseling</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konselingFinished as $item)
                        @foreach ($item->siswa as $siswa)                            
                        <tr style="height: 70px;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $item->layanan->jenis_layanan }}</td>
                            <td>{{ $item->tanggal_konseling }}</td>
                            <td>{{ $item->hasil_konseling }}</td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>                              
  </div>

@endsection