@extends('layout-old')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<div class="row">
    <legend style="margin-left:14px;">Manage Product & Deal</legend>
    <div class="col-12">

        <a type="button" class="btn btn-primary" href="{{ url('upload-a-deal') }}" style="margin-bottom:10px;">
        Upload Product & Deal
        </a>

        <div class="table-responsive">
            <div class="data-tables datatable-primary">
                <table class="table text-center table-bordered" id="dataTable2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Product Title</th>
                            <th>Product Code</th>
                            <th>Listing Price</th>
                            <th>Quantity</th>
                            <th>Expiry Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($products as $count=>$product)
                        <tr>
                            <td>{{ $count+1 }}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->product_title}} </td>
                            <td>{{$product->upc_product_code}}</td>
                            <th>${{$product->price}}</th>
                            <th>{{$product->seller_original_quantity}}</th>
                            <td>{{$product->deal_expiry_date}}</td>
                            <td>
                                <a href="{{ url('edit-product-deal'.$product->id) }}">
                                <i style="color: #01AEEF;" class="fa fa-pencil"></i>
                                </a>
                                <a href="{{ url('delete-product-deal'.$product->id) }}" onclick="return  confirm('Are you sure?')">
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
