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
                      <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
              </div>
              <h4 class="page-title">Dashboard</h4>
          </div>
      </div>
  </div>     
  <!-- end page title --> 

  <div class="row">
      <div class="col-12">
          <div class="card widget-inline">
              <div class="card-body p-0">
                  <div class="row g-0">
                      <div class="col-sm-6 col-xl-3">
                          <div class="card shadow-none m-0">
                              <div class="card-body text-center">
                                  <i class="dripicons-user" style="font-size: 24px;"></i>
                                  <h3><span>{{$guru->count()}}</span></h3>
                                  <p class="text-muted font-15 mb-0">Total Guru Bk</p>
                              </div>
                          </div>
                      </div>

                      <div class="col-sm-6 col-xl-3">
                          <div class="card shadow-none m-0 border-start">
                              <div class="card-body text-center">
                                  <i class="dripicons-user" style="font-size: 24px;"></i>
                                  <h3><span>{{$walas->count()}}</span></h3>
                                  <p class="text-muted font-15 mb-0">Total Wali Kelas</p>
                              </div>
                          </div>
                      </div>

                      <div class="col-sm-6 col-xl-3">
                          <div class="card shadow-none m-0 border-start">
                              <div class="card-body text-center">
                                  <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                  <h3><span>{{$siswa->count()}}</span></h3>
                                  <p class="text-muted font-15 mb-0">Total Siswa</p>
                              </div>
                          </div>
                      </div>

                      <div class="col-sm-6 col-xl-3">
                          <div class="card shadow-none m-0 border-start">
                              <div class="card-body text-center">
                                  <i class="dripicons-graph-line text-muted" style="font-size: 24px;"></i>
                                  <h3><span>{{$kelas->count()}}</span> <i class="mdi mdi-arrow-up text-success"></i></h3>
                                  <p class="text-muted font-15 mb-0">Productivity</p>
                              </div>
                          </div>
                      </div>

                  </div> <!-- end row -->
              </div>
          </div> <!-- end card-box-->
      </div> <!-- end col-->
  </div>
  {{-- <div class="card"> --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Activity</h5>
            <div class="table-responsive">
                <table id="scroll-vertical-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activity as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->Activity}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
          
</div>

@endsection