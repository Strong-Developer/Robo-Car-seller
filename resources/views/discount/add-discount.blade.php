@extends('layout-old')
@section('content')
    <link rel="stylesheet" href="afterlogin_assets/fileupload/fileinput.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<style type="text/css">
  .panel{margin-bottom:20px;background-color:#fff;border:1px solid transparent;border-radius:4px;-webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);box-shadow:0 1px 1px rgba(0,0,0,.05)}.panel-body{padding:15px}.panel-heading{padding:10px 15px;border-bottom:1px solid transparent;border-top-left-radius:3px;border-top-right-radius:3px}.panel-heading>.dropdown .dropdown-toggle{color:inherit}.panel-title{margin-top:0;margin-bottom:0;font-size:16px;color:inherit}.panel-title>.small,.panel-title>.small>a,.panel-title>a,.panel-title>small,.panel-title>small>a{color:inherit}.panel-footer{padding:10px 15px;background-color:#f5f5f5;border-top:1px solid #ddd;border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.list-group,.panel>.panel-collapse>.list-group{margin-bottom:0}.panel>.list-group .list-group-item,.panel>.panel-collapse>.list-group .list-group-item{border-width:1px 0;border-radius:0}.panel>.list-group:first-child .list-group-item:first-child,.panel>.panel-collapse>.list-group:first-child .list-group-item:first-child{border-top:0;border-top-left-radius:3px;border-top-right-radius:3px}.panel>.list-group:last-child .list-group-item:last-child,.panel>.panel-collapse>.list-group:last-child .list-group-item:last-child{border-bottom:0;border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.panel-heading+.panel-collapse>.list-group .list-group-item:first-child{border-top-left-radius:0;border-top-right-radius:0}.panel-heading+.list-group .list-group-item:first-child{border-top-width:0}.list-group+.panel-footer{border-top-width:0}.panel>.panel-collapse>.table,.panel>.table,.panel>.table-responsive>.table{margin-bottom:0}.panel>.panel-collapse>.table caption,.panel>.table caption,.panel>.table-responsive>.table caption{padding-right:15px;padding-left:15px}.panel>.table-responsive:first-child>.table:first-child,.panel>.table:first-child{border-top-left-radius:3px;border-top-right-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child,.panel>.table:first-child>thead:first-child>tr:first-child{border-top-left-radius:3px;border-top-right-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table:first-child>thead:first-child>tr:first-child th:first-child{border-top-left-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:last-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:last-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:last-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:last-child,.panel>.table:first-child>thead:first-child>tr:first-child td:last-child,.panel>.table:first-child>thead:first-child>tr:first-child th:last-child{border-top-right-radius:3px}.panel>.table-responsive:last-child>.table:last-child,.panel>.table:last-child{border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child{border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:first-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:first-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:first-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:first-child,.panel>.table:last-child>tbody:last-child>tr:last-child td:first-child,.panel>.table:last-child>tbody:last-child>tr:last-child th:first-child,.panel>.table:last-child>tfoot:last-child>tr:last-child td:first-child,.panel>.table:last-child>tfoot:last-child>tr:last-child th:first-child{border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:last-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child td:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child th:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child td:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child th:last-child{border-bottom-right-radius:3px}.panel>.panel-body+.table,.panel>.panel-body+.table-responsive,.panel>.table+.panel-body,.panel>.table-responsive+.panel-body{border-top:1px solid #ddd}.panel>.table>tbody:first-child>tr:first-child td,.panel>.table>tbody:first-child>tr:first-child th{border-top:0}.panel>.table-bordered,.panel>.table-responsive>.table-bordered{border:0}.panel>.table-bordered>tbody>tr>td:first-child,.panel>.table-bordered>tbody>tr>th:first-child,.panel>.table-bordered>tfoot>tr>td:first-child,.panel>.table-bordered>tfoot>tr>th:first-child,.panel>.table-bordered>thead>tr>td:first-child,.panel>.table-bordered>thead>tr>th:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:first-child,.panel>.table-responsive>.table-bordered>thead>tr>td:first-child,.panel>.table-responsive>.table-bordered>thead>tr>th:first-child{border-left:0}.panel>.table-bordered>tbody>tr>td:last-child,.panel>.table-bordered>tbody>tr>th:last-child,.panel>.table-bordered>tfoot>tr>td:last-child,.panel>.table-bordered>tfoot>tr>th:last-child,.panel>.table-bordered>thead>tr>td:last-child,.panel>.table-bordered>thead>tr>th:last-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:last-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:last-child,.panel>.table-responsive>.table-bordered>thead>tr>td:last-child,.panel>.table-responsive>.table-bordered>thead>tr>th:last-child{border-right:0}.panel>.table-bordered>tbody>tr:first-child>td,.panel>.table-bordered>tbody>tr:first-child>th,.panel>.table-bordered>thead>tr:first-child>td,.panel>.table-bordered>thead>tr:first-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>th,.panel>.table-responsive>.table-bordered>thead>tr:first-child>td,.panel>.table-responsive>.table-bordered>thead>tr:first-child>th{border-bottom:0}.panel>.table-bordered>tbody>tr:last-child>td,.panel>.table-bordered>tbody>tr:last-child>th,.panel>.table-bordered>tfoot>tr:last-child>td,.panel>.table-bordered>tfoot>tr:last-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:last-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:last-child>th,.panel>.table-responsive>.table-bordered>tfoot>tr:last-child>td,.panel>.table-responsive>.table-bordered>tfoot>tr:last-child>th{border-bottom:0}.panel>.table-responsive{margin-bottom:0;border:0}.panel-group{margin-bottom:20px}.panel-group .panel{margin-bottom:0;border-radius:4px}.panel-group .panel+.panel{margin-top:5px}.panel-group .panel-heading{border-bottom:0}.panel-group .panel-heading+.panel-collapse>.list-group,.panel-group .panel-heading+.panel-collapse>.panel-body{border-top:1px solid #ddd}.panel-group .panel-footer{border-top:0}.panel-group .panel-footer+.panel-collapse .panel-body{border-bottom:1px solid #ddd}.panel-default{border-color:#ddd}.panel-default>.panel-heading{color:#333;background-color:#f5f5f5;border-color:#ddd}.panel-default>.panel-heading+.panel-collapse>.panel-body{border-top-color:#ddd}.panel-default>.panel-heading .badge{color:#f5f5f5;background-color:#333}.panel-default>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#ddd}.panel-primary{border-color:#337ab7}.panel-primary>.panel-heading{color:#fff;background-color:#337ab7;border-color:#337ab7}.panel-primary>.panel-heading+.panel-collapse>.panel-body{border-top-color:#337ab7}.panel-primary>.panel-heading .badge{color:#337ab7;background-color:#fff}.panel-primary>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#337ab7}.panel-success{border-color:#d6e9c6}.panel-success>.panel-heading{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}.panel-success>.panel-heading+.panel-collapse>.panel-body{border-top-color:#d6e9c6}.panel-success>.panel-heading .badge{color:#dff0d8;background-color:#3c763d}.panel-success>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#d6e9c6}.panel-info{border-color:#bce8f1}.panel-info>.panel-heading{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}.panel-info>.panel-heading+.panel-collapse>.panel-body{border-top-color:#bce8f1}.panel-info>.panel-heading .badge{color:#d9edf7;background-color:#31708f}.panel-info>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#bce8f1}.panel-warning{border-color:#faebcc}.panel-warning>.panel-heading{color:#8a6d3b;background-color:#fcf8e3;border-color:#faebcc}.panel-warning>.panel-heading+.panel-collapse>.panel-body{border-top-color:#faebcc}.panel-warning>.panel-heading .badge{color:#fcf8e3;background-color:#8a6d3b}.panel-warning>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#faebcc}.panel-danger{border-color:#ebccd1}.panel-danger>.panel-heading{color:#a94442;background-color:#f2dede;border-color:#ebccd1}.panel-danger>.panel-heading+.panel-collapse>.panel-body{border-top-color:#ebccd1}.panel-danger>.panel-heading .badge{color:#f2dede;background-color:#a94442}.panel-danger>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#ebccd1}.panel-body:after,.panel-body:before,.row:after,.row:before{display:table;content:" "}.btn-group-vertical>.btn-group:after,.btn-toolbar:after,.clearfix:after,.container-fluid:after,.container:after,.dl-horizontal dd:after,.form-horizontal .form-group:after,.modal-footer:after,.modal-header:after,.nav:after,.navbar-collapse:after,.navbar-header:after,.navbar:after,.pager:after,.panel-body:after,.row:after{clear:both}
</style>

<div class="row">
   <div class="col-md-12 pr-0">
      <div class="card">
         <div class="card-body">
            <section class="dark-grey-text">
                <div class="alert alert-info" role="alert">
                    <p><b>RoboNegotiator</b> Set Discounts/Rebates</p>
                </div>
                @if (Session::has('success'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>{{Session::get('success') }}</strong>
					</div>
				@endif
                @if (Session::has('error'))
					<div class="alert alert-danger alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>{{Session::get('error') }}</strong>
					</div>
				@endif

                <div class="panel panel-primary">
                  <div class="panel-heading">
                  Set Discounts/Rebates
                  </div>
                  <div class="panel-body">
                    <form action="{{ url('add-product-discount') }}" method="post" id="add-form">
                      {{csrf_field()}}
                      <div class="panel panel-info">
                        <div class="panel-heading">Select Product</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <select required name="product" class="custom-select" style="display: block !important;" >
                                        <option value="">Select Product *</option>
                                        @foreach($prodsData as $code=>$prod)
                                        <option value="{{$code}}">{{$prod}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                      </div>
                      @php $yearEnd = date('Y-m-d', strtotime('Dec 31'));  @endphp
                      <div class="panel panel-info">
                        <div class="panel-heading">Discounts/Rebates
                            <button type="button" style="margin-top: -15px;" id="add-bulk-discounts" class="btn btn-success btn-flat btn-lg float-right" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-upload" aria-hidden="true"></i> Import Excel</button>
                            <button type="button" style="margin-top: -15px;margin-right: 5px;" id="add-more-discount" class="btn btn-success btn-flat btn-lg float-right">Add More</button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info" role="alert">
                                        <p><b>
                                        We are aware that you may have some specific rebates, discounts or incentives for your buyers. You can create various discount/ rebate programs here for your products.<br/>
                                        * Some discounts will be applicable to all while others are only applicable to qualified buyers.<br/>
                                        * You can define discounts and rebates in fixed amount or % price of your ideal sell price.<br/>
                                        * You can also specify quantity (number of buyers) who should be offered this discount along with discount/rebate validity date.
                                        </b></p>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2 font-weight-bold ">For all? | Discount/Rebate</div>
                                        <div class="col-md-2 font-weight-bold text-center">Beneficiary</div>
                                        <div class="col-md-2 font-weight-bold text-center">Discount Unit</div>
                                        <div class="col-md-2 font-weight-bold text-center">Discount Value</div>
                                        <div class="col-md-2 font-weight-bold text-center">Quantity</div>
                                        <div class="col-md-2 font-weight-bold text-center">Discount Expiry</div>
                                    </div>
                                    <br>

                                    <div class="row discount_section" id="discount_section_0">
                                        <div class="col-md-2">
                                            <input checked type="checkbox" value="all" name="discount_types[0][applicability]">&nbsp;|&nbsp;
                                            <input required style="margin: -21px 0 0 22px;" class="form-control" placeholder="Discount/Rebate" type="text" name="discount_types[0][title]">
                                        </div>
                                        <div class="col-md-2">
                                            <select  class="custom-select"  name="discount_types[0][type]">
                                                <option value="buyer">Buyer</option>
                                                <option disabled="disabled" value="seller">Seller</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select  class="custom-select"  name="discount_types[0][value_type]">
                                                <option value="fixed">Fixed</option>
                                                <option disabled="disabled" value="percentage">Percentage</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon-0">$</span>
                                                </div>
                                                <input aria-describedby="basic-addon-0" class="form-control" value="" placeholder="Amount" type="number" name="discount_types[0][amount]">
                                            </div>
                                        </div>
                                        <div class="col-md-2"><input class="form-control" placeholder="Unlimited" type="number" name="discount_types[0][qty]"></div>
                                        <div class="col-md-2"><input class="form-control discount_expiry_date" value="{{$yearEnd}}" placeholder="Expiry Date" type="text" name="discount_types[0][expiry_date]"></div>
                                    </div>
                                    <br>
                                    <div id="append-after">
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                         <button type="submit" id="up_button" class="btn btn-lg btn-block" style="background-color: #00aeef; color: #fff;">
                           <i class="fa fa-check"></i>
                            Add Product Discount
                         </button>
                      </div>
                    </form>
                  </div>
                </div>
            </section>
         </div>
      </div>
   </div>
</div>
<div class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload and Set Mass Discounts/Rebates</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="panel panel-info">
                    <div class="panel-heading">Set Multiple Discounts/Rebates<a href="{{url('storage/app/public/discounts_rebates.csv')}}"><button type="button" style="margin-top: -15px;" class="btn btn-success btn-flat btn-lg float-right" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-download" aria-hidden="true"></i> Download discounts_rebates.csv for correct format</button></a></div>
                    <div class="panel-body">
                        <div class="row">
                            <style type="text/css">
                                blockquote:before { display: none !important; }
                            </style>
                            <blockquote class="blockquote">
                                <p class="mb-3">We are allowing you to update and set many Discounts/Rebates together to <b>RoboNegotiator Product/Deal</b> through this feature. Please download our template and prepare file with all of your discounts/rebates, quantity, etc. to upload.</p>
                            </blockquote>
                            <form action="{{route('discounts_rebates_import.csv')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6 col-xs-12 col-sm-12">
                                        <label class="control-label">
                                            Choose a .CSV file or drag it here.
                                        </label>
                                    </div>
                                    <input type="hidden" name="api_key" value="f07862522e9585ffd7ca6a6138ec262480b0d91f">
                                    <div align="left" class="col-md-6 col-xs-12 col-sm-12">
                          <span class="btn btn-default btn-file">
                              <input id="input-2" name="csv_to_import" type="file" accept=".csv" class="file form-control" multiple data-show-upload="true" data-show-caption="true">
                          </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(){
    var yearEnd = '<?php echo $yearEnd ?>';
    $('.discount_expiry_date').datepicker({
      minDate: 0,
      dateFormat: 'yy-mm-dd'
    });
    $('.discount_expiry_date').keydown(function(){
        return false;
    });
    $('#add-more-discount').click(function(){
        var counter = $('.discount_section').length;
        if(counter < 10) {
            var appendHtml = '<div class="row discount_section" id="discount_section_'+counter+'"><div class="col-md-2"><input checked type="checkbox" value="all" name="discount_types['+counter+'][applicability]">&nbsp;|&nbsp;<input required style="margin: -21px 0 0 22px;" class="form-control" placeholder="Discount/Rebate" type="text" name="discount_types['+counter+'][title]"></div><div class="col-md-2"><select  class="custom-select"  name="discount_types['+counter+'][type]"><option value="buyer">Buyer</option><option disabled="disabled" value="seller">Seller</option></select></div><div class="col-md-2"><select  class="custom-select"  name="discount_types['+counter+'][value_type]"><option value="fixed">Fixed</option><option disabled="disabled" value="percentage">Percentage</option></select></div><div class="col-md-2"><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon-0">$</span></div><input aria-describedby="basic-addon-0" class="form-control" value="" placeholder="Amount" type="number" min="1" name="discount_types['+counter+'][amount]"></div></div><div class="col-md-2"><input class="form-control" placeholder="Unlimited" type="number" min="1" name="discount_types['+counter+'][qty]"></div><div class="col-md-2"><div class="input-group mb-3"><input aria-describedby="basic-add'+counter+'" class="form-control discount_expiry_date" value="'+yearEnd+'" placeholder="Expiry Date" type="text" name="discount_types['+counter+'][expiry_date]"><div class="input-group-append delete_discount"  counter="'+counter+'"><span class="input-group-text" id="basic-add'+counter+'"><i class="fa fa-trash" aria-hidden="true"></i></span></div></div></div></div>'
            $('#append-after').append(appendHtml);
            $('.discount_expiry_date').datepicker({
            minDate: 0,
            dateFormat: 'yy-mm-dd'
            });
        }
    });
    $('body').on('click','.delete_discount', function(){
        var delCounter = $(this).attr('counter');
        $('#discount_section_'+delCounter).remove();
    });
});
</script>
<style>
/***************** datepicker *******************/
.form-control{border-color: #00aeef;}

/***************** drag and drop *******************/
 .container {
  padding: 30px 4%;
}

.box {
  position: relative;
  background: #ffffff;
  width: 100%;
}

.box-header {
  color: #444;
  display: block;
  padding: 10px;
  position: relative;
  border-bottom: 1px solid #f4f4f4;
  margin-bottom: 10px;
}

.box-tools {
  position: absolute;
  right: 10px;
  top: 5px;
}

.dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
}

.dropzone-desc {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 50px;
  font-size: 16px;
}

.dropzone,
.dropzone:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}

.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {
  background: #ecf0f5;
}

.preview-zone {
  text-align: center;
}

.preview-zone .box {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}

</style>
<script src="afterlogin_assets/fileupload/fileinput.js"></script>
<script>
    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var htmlPreview =
                    '<img width="200" src="' + e.target.result + '" />' +
                    '<p>' + input.files[0].name + '</p>';
                var wrapperZone = $(input).parent();
                var previewZone = $(input).parent().parent().find('.preview-zone');
                var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

                wrapperZone.removeClass('dragover');
                previewZone.removeClass('hidden');
                boxZone.empty();
                boxZone.append(htmlPreview);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function disable_upload_button() {
        $('#up_button').css('display', 'none');
        $('#up_button').prop('disabled', true);
        setTimeout(function () {
            $('#up_button').css('display', 'block');
        }, 5000)
    }
    $(document).ready(function(){
        $('#add-form').validate();
        $('#up_button').click(function(){
            if($('#add-form').valid()){
                $('#up_button').hide();
            }
            $('#add-form').submit();
        })
    });
</script>


@endsection
