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
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ $message }}
    </div>
    @endif
    <div class="mb-3">
    <a href="/guru/kerawanan/index" type="button" class="btn btn-primary">Add New</a>

    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Kerawanan</h5>
            <div class="table-responsive">
                <table id="scroll-vertical-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Kelas</th>
                        <th>Kerawanan</th>
                        <th>Wali Kelas</th>
                        <th>Kesimpulan</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($petaKerawanan as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->siswa->nama}}</td>
                            <td>{{$item->siswa->kelas->nama}}</td>
                            <td>{{$item->jenis_kerawanan}}</td>
                            <td>{{$item->siswa->kelas->wali_kelas->nama}}</td>
                            <td>{{$item->kesimpulan}}</td>
                            <td>
                                <a href="/guru/kerawanan/edit/{{$item->id}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:void(0);" class="action-icon" onclick="showDeleteModal({{ $item->id }})"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
                                                    
  </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <form id="deleteForm" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDeleteModal(guruId) {
            var deleteForm = document.getElementById('deleteForm');
            deleteForm.action = '/guru/kerawanan/delete/' + guruId;
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }
    </script>
@endsection

  
