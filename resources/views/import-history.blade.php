@extends('layout-old')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<div class="row">
    <legend style="margin-left:14px;"><span>CSV Import History</span></legend>

        <div class="col-12">
        @if(session()->has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Alert !</strong><span> {{ session()->get('error') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success !</strong><span> {{ session()->get('success') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="table-responsive">
            <div class="data-tables datatable-primary">
                <table class="table text-center table-bordered" id="dataTable2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>File Name</th>
                            <th>Import Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($sellerImportHistoryData as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$data->actual_name}}</td>
                            <td>{{$data->created_at}}</td>
                            <td>
                                <a href="{{ route('view-status', ['id' => $data->id])}}">
                                <i style="color: #01AEEF;" class="fa fa-pencil"></i>
                                </a>
                                <a href="{{ route('delete-history', ['id' => $data->id])}}" onclick="return  confirm('Are you sure?')">
                                <i style="color: #FF5658;" class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
@endsection
