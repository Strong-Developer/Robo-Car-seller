@extends('layout-old')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<legend style="margin-top: -66px;margin-left: 0;z-index: 10;position: relative;"><span>Manage Finance Parameters</span></legend>
<div class="row">
    <a href="{{url('add-finance-parameters')}}" aria-expanded="true" style="font-size: 17px; margin-top:25px"><i style="margin-left: 30px;" class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;<span>Add Finance Parameters</span></a>

        <div class="col-12" style="margin-top:15px">
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
                    <select required name="product" class="custom-select" style="width: 35%;display: block !important;margin-left: 30px;">
                        <option value="">Select Product *</option>
                        @foreach($all_seller_products as $one)
                            <option value="{{$one->upc_product_code}}" @if($product_title == $one->product_title) selected @endif >{{$one->product_title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row" style="margin:auto; margin-top:25px; max-width:99%; ">
            <div class="table-responsive">
                <div class="data-tables datatable-primary">
                     
                    <table class="table text-center table-bordered" id="dataTable2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Code</th>
                                <th>Interest_rate</th>
                                <th>Duration_in_month</th>
                                <th>Credit_score</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1;
                            if(isset($productFinanceData->upc_product_code)){                                
                            ?>
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{$productFinanceData->upc_product_code}}</td>
                                <td>{{$productFinanceData->interest_rate}}</td>
                                <td>{{$productFinanceData->duration_in_month}}</td>
                                <td>{{$productFinanceData->credit_score}}</td>
                                <td>
                                    <a href="{{ route('edit-finance-parameters', ['prodcode' => $productFinanceData->upc_product_code])}}">
                                    <i style="color: #01AEEF;" class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ route('delete-finance-parameters', ['prodcode' => $productFinanceData->upc_product_code])}}" onclick="return  confirm('Are you sure?')">
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
</div>
<script>
    $('select').on('change', function() {
        location.replace('{!! route('admin.manage.finance', ['upc_product_code' => '']) !!}' + this.value);
    });
</script>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

@endsection
