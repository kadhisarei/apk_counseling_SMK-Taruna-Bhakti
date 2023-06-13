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
                <h4 class="page-title">Data Permintaan Konseling</h4>
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
                            <th>Jam Pengajuan</th>
                            <th>Tempat Pengajuan</th>
                            <th>Pesan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konseling as $item)
                    @foreach ($item->siswa as $siswa)                            
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $item->layanan->jenis_layanan }}</td>
                        <td>{{ $item->tanggal_konseling }}</td>
                        <td>{{ $item->jam_mulai }}</td>
                        <td>{{ $item->tempat }}</td>
                        <td>{{ $item->pesan }}</td>
                        <td style="display: flex">
                            <form class="mb-2" action="{{ route('approve', $item->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button style="width: 119px" type="submit" class="btn btn-success">
                                    <i class="mdi mdi-check">Approve</i>
                                </button>
                            </form>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#signup-modal{{$item->id}}"><i class="mdi mdi-calendar">Reschedule</i></button>
                                <div id="signup-modal{{$item->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="text-center mt-2 mb-4">
                                                    <a href="index.html" class="text-success">
                                                        <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                                                    </a>
                                                </div>
                                                <form class="ps-3 pe-3" action="{{ route('reschedule', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="text-center mb-4">
                                                        <span><img src="{{ asset('img/logo-consule.png') }}" alt="" width="120px"></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Tanggal Konseling</label>
                                                        <input class="form-control" type="date" required="" name="tanggal_konseling" placeholder="Input tanggal konseling">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Jam Konseling</label>
                                                        <input class="form-control" type="time" required="" name="jam_konseling">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Tempat Konseling</label>
                                                        <input class="form-control" type="text" required="" name="tempat_konseling" placeholder="Input tempat konseling">
                                                    </div>
                                                    <div class="mb-3 text-center">
                                                        <button class="btn btn-primary" type="submit">Reschedule</button>
                                                    </div>
                                                </form>
                                
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                        </td>
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