@extends('dashboard.layout.master')

@section('content')

<div class="container-fluid">
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
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
    <!-- end page title --> 


    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-centered mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Layanan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Jam Pengajuan</th>
                        <th>Tempat Pengajuan</th>
                        <th>Pesan</th>
                        <th style="width: 250px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($konseling as $item)
                    @foreach ($item->siswa as $siswa)                            
                    <tr style="height: 85px;">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $item->layanan->jenis_layanan }}</td>
                        <td>{{ $item->tanggal_konseling }}</td>
                        <td>{{ $item->jam_mulai }}</td>
                        <td>{{ $item->tempat }}</td>
                        <td>{{ $item->pesan }}</td>
                        <td style="display:flex;gap:10px;justify-content-center:center;allign-items:center;">
                            <form action="{{ route('approve', $item->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">
                                    <i class="mdi mdi-check">Approve</i>
                                </button>
                            </form>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#signup-modal"><i class="mdi mdi-calendar">Reschedule</i></button>
                                <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                        <span><img src="{{ asset('img/logo-consule.png') }}" alt="" width="150px"></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Tanggal Konseling</label>
                                                        <input class="form-control" value="{{ $item->tanggal_konseling }}" type="date" required="" name="tanggal_konseling" placeholder="Input tanggal konseling">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Jam Konseling</label>
                                                        <input class="form-control" value="{{ $item->jam_mulai }}" type="time" required="" name="jam_konseling">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Tempat Konseling</label>
                                                        <input class="form-control" value="{{ $item->tempat }}" type="text" required="" name="tempat_konseling" placeholder="Input tempat konseling">
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



@endsection