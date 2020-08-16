@extends('layout-old')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<link rel='stylesheet' href='http://sandbox.robonegotiator.com/js/plugins/assets/css/style.css' />
<div class="row">
    <legend style="margin-left:14px;">Manage Transcription</legend>
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
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        @foreach($seller_all_transcriptions as $one)
                            <div class="card">
                                <div class="card-body">
                                    {!! $one->chat_details !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('select').on('change', function() {
        location.replace('{!! route('getTranscription', ['upc_product_code' => '']) !!}' + this.value);
    });
</script>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
@endsection
