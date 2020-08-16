@extends('layout-old')
@section('content')
    <link rel="stylesheet" href="afterlogin_assets/fileupload/fileinput.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="afterlogin_assets/css/custome.css">


<div class="row">
   <div class="col-md-12 pr-0">
      <div class="card">
         <div class="card-body">
            <section class="dark-grey-text">
                <div class="alert alert-info" role="alert">
                    <p><b>RoboNegotiator</b> Add Lease Parameters</p>
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
                  Add Lease Parameters
                  </div>
                  <div class="panel-body">
                    <form action="{{ url('add-lease-parameters') }}" method="post" id="add-form">
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
                      <div class="panel panel-info">
                        <div class="panel-heading">Other Info</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="API Key" name="api_key" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input aria-describedby="basic-add1" required class="form-control" maxlength="5" value="" placeholder="Your State Tax Rate" type="number" name="state_tax_rate">
                                            <div class="input-group-append delete_discount" counter="1">
                                                <span class="input-group-text" id="basic-add1">
                                                    %
                                                </span>
                                            </div>
                                        </div>
                                        <label id="state_tax_rate-error" style="display:none;" class="error" for="state_tax_rate">This field is required.</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" maxlength="8" value="" required placeholder="Money Factor" type="number" name="money_factor">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" maxlength="4" value="" required  placeholder="Quantity For Leasing" type="number" name="quantity_for_leasing">
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="panel panel-info">
                        <div class="panel-heading">Lease Term
                            <!-- <button type="button" style="margin-top: -15px;" id="add-bulk-discounts" class="btn btn-success btn-flat btn-lg float-right" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-upload" aria-hidden="true"></i> Import Excel</button> -->
                            <button type="button" style="margin-top: -15px;margin-right: 5px;" id="add-more-lease" class="btn btn-success btn-flat btn-lg float-right">Add More</button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info" role="alert">
                                        <p><b>Instructions</b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4 font-weight-bold text-center">Lease Term</div>
                                        <div class="col-md-4 font-weight-bold text-center">Annual Milage</div>
                                        <div class="col-md-4 font-weight-bold text-center">Residual Value</div>
                                    </div>
                                    <br>

                                    <div class="row lease_section" id="lease_section_0">
                                        <div class="col-md-4">
                                            <input class="form-control" type="number" name="lease_sub_parameter[0][duration_in_month]" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" type="number" name="lease_sub_parameter[0][miles_allowed_per_year]" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control custom-residual-value" type="text" name="lease_sub_parameter[0][residual_value]" required/>
                                        </div>
                                    </div>
                                    <br>
                                    <div id="append-after">
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="panel panel-info">
                        <div class="panel-heading">MSRP</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="msrp_data" type="number" class="form-control" placeholder="MSRP" name="msrp" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                         <button type="button" id="up_button" class="btn btn-lg btn-block" style="background-color: #00aeef; color: #fff;">
                           <i class="fa fa-check"></i>
                            Add Lease Parameters
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

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="afterlogin_assets/fileupload/fileinput.js"></script>
<script>
    $(document).ready(function(){
        $("#add-form").validate({
			rules: {
				product: "required",
				state_tax_rate: "required",
				money_factor: "required",
				quantity_for_leasing: "required"
			},
			messages: {
				product: "Please select product.",
				state_tax_rate: "Please enter state tax rate.",
				money_factor: "Please enter money factor.",
				quantity_for_leasing: "Please enter quantity."
			}
		});
        $('#add-form').validate();
        $('#up_button').mouseover(function(){
            var requiredmsrp = 0;
            $('.custom-residual-value').each(function(){
                var resiDualValue = $(this).val();
                if(resiDualValue.includes('%')) {
                    requiredmsrp = 1;
                }
            });
            if(requiredmsrp == 1) {
                $('#msrp_data').rules("add",
                {
                    required: true
                });
            } else {
                $('#msrp_data').rules("remove");
            }
        })
        $('#up_button').click(function(){

            if($('#add-form').valid()){
                $('#up_button').hide();
                $('#add-form').submit();
            }else{
              $('#add-form').submit();
            }
        });
        $('#add-more-lease').click(function(){
            var counter = $('.lease_section').length;
            if(counter < 10) {
                var appendHtml = '<div class="row lease_section" id="lease_section_'+counter+'"><div class="col-md-4"><input class="form-control" type="number" name="lease_sub_parameter['+counter+'][duration_in_month]" required/></div><div class="col-md-4"><input class="form-control" type="number" name="lease_sub_parameter['+counter+'][miles_allowed_per_year]" required/></div><div class="col-md-4"><div class="input-group mb-3"><input class="custom-residual-value form-control" type="text" name="lease_sub_parameter['+counter+'][residual_value]" required/><div class="input-group-append delete_lease"  counter="'+counter+'"><span class="input-group-text" id="basic-add'+counter+'"><i class="fa fa-trash" aria-hidden="true"></i></span></div></div><label id="lease_sub_parameter['+counter+'][residual_value]-error" style="display:none;" class="error" for="lease_sub_parameter['+counter+'][residual_value]">This field is required.</label></div></div>'
                $('#append-after').append(appendHtml);
            }
        });
        $('body').on('click','.delete_lease', function(){
            var delCounter = $(this).attr('counter');
            $('#lease_section_'+delCounter).remove();
        });
    });
</script>


@endsection
