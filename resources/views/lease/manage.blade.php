@extends('layout-old')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<div class="row">
    <legend style="margin-left:14px;"><span>Manage Lease Parameters</span><a href="{{url('add-lease-parameters')}}" aria-expanded="true"><i style="margin-left: 30px;" class="fa fa-upload" aria-hidden="true"></i><span>Add Lease Parameters</span></a></legend>

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
        <div class="panel-body">
            <div class="row">
                <div class="col-md-10">
                    <select required name="product" class="custom-select" style="display: block !important;" >
                        <option value="">Select Product *</option>
                        @foreach($all_seller_products as $one)
                            <option value="{{$one->upc_product_code}}" @if($product_title == $one->product_title) selected @endif >{{$one->product_title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
{{--        <a type="button" class="btn btn-primary" href="{{ url('add-product-discount') }}" style="margin-bottom:10px;">--}}
{{--        Add Discount--}}
{{--        </a>--}}
        <div class="table-responsive">
            <div class="data-tables datatable-primary">
                <table class="table text-center table-bordered" id="dataTable2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Code</th>
                            <th>Money Factor</th>
                            <th>Tax Rate</th>
                            <th>Creation Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1;
                        if(isset($productLeaseData->upc_product_code)){
                        ?>
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{$productLeaseData->upc_product_code}}</td>

                            <td>{{$productLeaseData->money_factor}}</td>
                            <td>{{$productLeaseData->tax_rate}}</td>
                            <td>{{$productLeaseData->created_at}}</td>
                            <td>
                                <a href="{{ route('edit-lease-parameters', ['prodcode' => $productLeaseData->upc_product_code])}}">
                                <i style="color: #01AEEF;" class="fa fa-pencil"></i>
                                </a>
                                <a href="{{ route('delete-lease-parameters', ['prodcode' => $productLeaseData->upc_product_code])}}" onclick="return  confirm('Are you sure?')">
                                <i style="color: #FF5658;" class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $('select').on('change', function() {
        location.replace('{!! route('admin.manage.lease', ['upc_product_code' => '']) !!}' + this.value);
    });
</script>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

@endsection
