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
                <h4 class="page-title">Data Konfirmasi Konseling</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
    

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('create-input') }}" type="button" class="btn btn-primary">Add New</a>
            </div>
            <table class="table table-hover table-centered mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Layanan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Jam Konseling</th>
                        <th>Tempat Konseling</th>
                        <th>Hasil Konseling</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($konselingConfirm as $item)
                    @foreach ($item->siswa as $siswa)                            
                    <tr style="height: 70px;">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $item->layanan->jenis_layanan }}</td>
                        <td>{{ $item->tanggal_konseling }}</td>
                        <td>{{ $item->jam_mulai }}</td>
                        <td>{{ $item->tempat }}</td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signup-modal"><i class="mdi mdi-clipboard-text">Input Hasil konseling</i></button>
                            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="text-center mt-2 mb-4">
                                                    <a href="#" class="text-success">
                                                        <span><img src="{{ asset('img/logo-consule.png') }}" alt="" width="120px"></span>
                                                    </a>
                                                </div>
                                                <form class="ps-3 pe-3" action="{{ route('confirm', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Hasil Konseling</label>
                                                        <textarea class="form-control" name="hasil_konseling" id="" cols="30" rows="10" placeholder="Input hasil konselingmu"></textarea>
                                                    </div>
                                                    <div class="mb-3 text-center">
                                                        <button class="btn btn-primary" type="submit">Reschedule</button>
                                                    </div>
                                                </form>
                                
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                            </div>
                            <!-- Standard modal -->
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