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
                        <li class="breadcrumb-item active">Activity</li>
                    </ol>
                </div>
                <h4 class="page-title">Activity</h4>
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

@endsection
