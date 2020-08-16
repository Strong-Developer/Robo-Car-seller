@extends('layout-old')
@section('content')
    <link rel="stylesheet" href="afterlogin_assets/fileupload/fileinput.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="afterlogin_assets/css/custome.css">
    <legend style="width:75%; margin-top: -66px;margin-left: 0;z-index: 10;position: relative;"><span>Add Finance Parameters</span></legend>
<div class="row" style="margin-top:20px">
   <div class="col-md-12 pr-0">
      <div class="card">
         <div class="card-body" style="background-color: aliceblue;">
            <section class="dark-grey-text">
                <div class="alert alert-info" role="alert" style="background: linear-gradient(to right, #4459af 0%, #00aeef 100%);">
                    <p style="font-size:18px; color:#fff"><b>RoboNegotiator</b> Add Finance Parameters</p>
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
                  Add Finance Parameters
                  </div>
                  <div class="panel-body">
                    <form action="{{ url('add-finance-parameters') }}" method="post" id="add-form">
                      {{csrf_field()}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">Select Product</div>
                                    <div class="panel-body" >
                                        <div class="row">
                                            <div class="col-md-10">
                                                <select name="product" class="custom-select" style="display: block !important;" required>
                                                    <option value="">Select Product *</option>
                                                    @foreach($prodsData as $code=>$prod)
                                                    <option value="{{$code}}">{{$prod}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">Other Info</div>
                                    <div class="panel-body" style="margin-bottom: -22px;">
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="API Key" name="api_key" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <input class="form-control" maxlength="4" value="" required  placeholder="Quantity For Financing" type="number" name="quantity_for_financing">
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading">Finance Term
                                
                                <button type="button" style="margin-top:-5px; margin-right: 5px; height:100%" id="add-more-finance" class="btn btn-success btn-xs float-right" >Add More</button>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-info" role="alert" style="padding: 12px 16px;">
                                            <p><b>Instructions</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4 font-weight-bold text-center">Interest_rate</div>
                                            <div class="col-md-4 font-weight-bold text-center">Duration_in_month</div>
                                            <div class="col-md-4 font-weight-bold text-center">Credit_score</div>
                                        </div>
                                        <br>

                                        <div class="row finance_section" id="finance_section_0">
                                            <div class="col-md-4">
                                                <input class="form-control" type="number" step="any" name="finance_sub_parameter[0][interest_rate]" required/>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control custom-residual-value" type="text" name="finance_sub_parameter[0][duration_in_month]" required/>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control custom-residual-value" type="text" name="finance_sub_parameter[0][credit_score]" required/>
                                            </div>
                                        </div>
                                        <br>
                                        <div id="append-after">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="margin:auto">
                            <button type="submit" id="up_button" class="btn btn-lg btn-block" style="background-color: #00aeef; color: #fff; font-size:17px">
                            <i class="fa fa-check"></i>
                                Add Finance Parameters
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
        // $("#add-form").validate({
		// 	rules: {
		// 		product: "required",
		// 		state_tax_rate: "required",
		// 		money_factor: "required",
		// 		quantity_for_leasing: "required"
		// 	},
		// 	messages: {
		// 		product: "Please select product.",
		// 		state_tax_rate: "Please enter state tax rate.",
		// 		money_factor: "Please enter money factor.",
		// 		quantity_for_leasing: "Please enter quantity."
		// 	}
		// });
        // $('#add-form').validate();
        // $('#up_button').mouseover(function(){
        //     var requiredmsrp = 0;
        //     $('.custom-residual-value').each(function(){
        //         var resiDualValue = $(this).val();
        //         if(resiDualValue.includes('%')) {
        //             requiredmsrp = 1;
        //         }
        //     });
        //     if(requiredmsrp == 1) {
        //         $('#msrp_data').rules("add",
        //         {
        //             required: true
        //         });
        //     } else {
        //         $('#msrp_data').rules("remove");
        //     }
        // })
        // $('#up_button').click(function(){
        //     //$('#add-form').submit();
        //     // if($('#add-form').valid()){
        //     //     $('#up_button').hide();
        //     //     $('#add-form').submit();
        //     // }else{
        //     //   $('#add-form').submit();
        //     // }
        // });
        $('#add-more-finance').click(function(){
            var counter = $('.finance_section').length;
            if(counter < 10) {
                var appendHtml = '<div class="row finance_section" id="finance_section_'+counter+'"><div class="col-md-4"><input class="form-control" type="number" step="any" name="finance_sub_parameter['+counter+'][interest_rate]" required/></div><div class="col-md-4"><input class="form-control" type="number" name="finance_sub_parameter['+counter+'][duration_in_month]" required/></div><div class="col-md-4"><div class="input-group mb-3"><input class="custom-residual-value form-control" type="text" name="finance_sub_parameter['+counter+'][credit_score]" required/><div class="input-group-append delete_finance"  counter="'+counter+'"><span class="input-group-text" id="basic-add'+counter+'"><i class="fa fa-trash" aria-hidden="true"></i></span></div></div></div></div>'
                $('#append-after').append(appendHtml);
            }
        });
        $('body').on('click','.delete_finance', function(){
            var delCounter = $(this).attr('counter');
            $('#finance_section_'+delCounter).remove();
        });
    });
</script>


@endsection
