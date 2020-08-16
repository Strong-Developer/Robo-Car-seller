
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="afterlogin_assets/fileupload/fileinput.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="afterlogin_assets/css/custome.css">
	<legend style="width:75%; margin-top: -66px;margin-left: 0;z-index: 10;position: relative;"><span>Edit Finance Parameters</span></legend>
<div class="row" style="margin-top:20px">
   <div class="col-md-12 pr-0">
      <div class="card">
         <div class="card-body" style="background-color: aliceblue;">
            <section class="dark-grey-text">
                <div class="alert alert-info" role="alert" style="background: linear-gradient(to right, #4459af 0%, #00aeef 100%);">
                    <p style="font-size:18px; color:#fff"><b>RoboNegotiator</b> Edit Finance Parameters</p>
                </div>
                <?php if(Session::has('success')): ?>
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong><?php echo e(Session::get('success')); ?></strong>
					</div>
				<?php endif; ?>
                <?php if(Session::has('error')): ?>
					<div class="alert alert-danger alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong><?php echo e(Session::get('error')); ?></strong>
					</div>
				<?php endif; ?>

                <div class="panel panel-primary">
                  <div class="panel-heading">
                  Edit Finance Parameters
                  </div>
                  <div class="panel-body">
                    <form action="<?php echo e(route('edit-finance-parameters',['prodcode' => $productFinanceData->upc_product_code])); ?>" method="post" id="edit-form">
                      <?php echo e(csrf_field()); ?>


                      <div class="panel panel-info">
                        <div class="panel-heading">Quantity</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" maxlength="4" value="<?php echo e($sellerDeal->seller_orignal_quantity); ?>" required  placeholder="Quantity For Leasing" type="number" name="quantity_for_leasing">
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="panel panel-info">
                        <div class="panel-heading">Finance Term
                            <!-- <button type="button" style="margin-top: -15px;" id="add-bulk-discounts" class="btn btn-success btn-flat btn-lg float-right" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-upload" aria-hidden="true"></i> Import Excel</button> -->
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
                                        <div class="col-md-4 font-weight-bold text-center">Interest rate</div>
                                        <div class="col-md-4 font-weight-bold text-center">Duration in month</div>
                                        <div class="col-md-4 font-weight-bold text-center">Credit score</div>
                                    </div>
                                    <br>

                                    <div class="row finance_section existed" id="finance_section_0">
                                        <div class="col-md-4">
                                            <input type="hidden" class="existing_one" value="update" name="finance_sub_parameter[0][action]"/>
                                            <input type="hidden" value="<?php echo e(isset($productFinanceData->seller_finance_sub_parameters[0]->id)?$productFinanceData->seller_finance_sub_parameters[0]->id:''); ?>" name="finance_sub_parameter[0][id]"/>
                                            <input class="form-control" type="number" step="any" value="<?php echo e(isset($productFinanceData->seller_finance_sub_parameters[0]->interest_rate)?$productFinanceData->seller_finance_sub_parameters[0]->interest_rate:''); ?>" name="finance_sub_parameter[0][interest_rate]" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" value="<?php echo e(isset($productFinanceData->seller_finance_sub_parameters[0]->duration_in_month)?$productFinanceData->seller_finance_sub_parameters[0]->duration_in_month:''); ?>" type="number" name="finance_sub_parameter[0][duration_in_month]" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <input value="<?php echo e(isset($productFinanceData->seller_finance_sub_parameters[0]->credit_score)?$productFinanceData->seller_finance_sub_parameters[0]->credit_score:''); ?>" class="form-control custom-residual-value" type="text" name="finance_sub_parameter[0][credit_score]" required/>
                                        </div>
                                    </div>
                                    <br>
                                    <?php
                                    if(isset($productFinanceData->seller_finance_sub_parameters[0])){
                                    unset($productFinanceData->seller_finance_sub_parameters[0]);
                                    }
                                    ?>
                                    <div id="append-after">
                                    <?php
                                    $counter = 1;
                                    ?>
                                    <?php $__currentLoopData = $productFinanceData->seller_finance_sub_parameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parameters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row finance_section existed" id="finance_section_<?php echo e($counter); ?>">
                                        <div class="col-md-4">
                                            <input type="hidden" class="existing_one" value="update" name="finance_sub_parameter[<?php echo e($counter); ?>][action]"/>
                                            <input type="hidden" value="<?php echo e(isset($productFinanceData->seller_finance_sub_parameters[$counter]->id)?$productFinanceData->seller_finance_sub_parameters[$counter]->id:''); ?>" name="finance_sub_parameter[<?php echo e($counter); ?>][id]"/>
                                            <input value="<?php echo e(isset($productFinanceData->seller_finance_sub_parameters[$counter]->interest_rate)?$productFinanceData->seller_finance_sub_parameters[$counter]->interest_rate:''); ?>" class="form-control" type="number" step="any" name="finance_sub_parameter[<?php echo e($counter); ?>][interest_rate]" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <input value="<?php echo e(isset($productFinanceData->seller_finance_sub_parameters[$counter]->duration_in_month)?$productFinanceData->seller_finance_sub_parameters[$counter]->duration_in_month:''); ?>" class="form-control" type="number" name="finance_sub_parameter[<?php echo e($counter); ?>][duration_in_month]" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input value="<?php echo e(isset($productFinanceData->seller_finance_sub_parameters[$counter]->credit_score)?$productFinanceData->seller_finance_sub_parameters[$counter]->credit_score:''); ?>" class="custom-residual-value form-control" type="text" name="finance_sub_parameter[<?php echo e($counter); ?>][credit_score]" required/>
                                                <div class="input-group-append delete_finance"  counter="<?php echo e($counter); ?>">
                                                    <span class="input-group-text" id="basic-add<?php echo e($counter); ?>">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <?php
                                    $counter++;
                                    ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>                      

                      <div class="col-md-4" style="margin:auto">
                         <button type="submit" id="up_button" class="btn btn-lg btn-block" style="background-color: #00aeef; color: #fff; font-size:17px">
                            <i class="fa fa-check"></i>
                                Update Finance Parameters
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
  //       $("#edit-form").validate({
		// 	rules: {
		// 		state_tax_rate: "required",
		// 		money_factor: "required",
		// 		quantity_for_leasing: "required"
		// 	},
		// 	messages: {
		// 		state_tax_rate: "Please enter state tax rate.",
		// 		money_factor: "Please enter money factor.",
		// 		quantity_for_leasing: "Please enter quantity."
		// 	}
		// });
  //       $('#edit-form').validate();
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

        //     if($('#edit-form').valid()){
        //         $('#up_button').hide();
        //         $('#edit-form').submit();
        //     }else{
        //       $('#edit-form').submit();
        //     }
        // });
        $('#add-more-finance').click(function(){
            var counter = $('.finance_section').length;
            if(counter < 10) {
                var appendHtml = '<div class="row finance_section" id="finance_section_'+counter+'"><div class="col-md-4"><input type="hidden" value="add" name="finance_sub_parameter['+counter+'][action]"/><input type="hidden" value="" name="finance_sub_parameter['+counter+'][id]"/><input class="form-control" type="number" step="any" name="finance_sub_parameter['+counter+'][interest_rate]" required/></div><div class="col-md-4"><input class="form-control" type="number" name="finance_sub_parameter['+counter+'][duration_in_month]" required/></div><div class="col-md-4"><div class="input-group mb-3"><input class="custom-residual-value form-control" type="text" name="finance_sub_parameter['+counter+'][credit_score]" required/><div class="input-group-append delete_finance"  counter="'+counter+'"><span class="input-group-text" id="basic-add'+counter+'"><i class="fa fa-trash" aria-hidden="true"></i></span></div></div></div></div>'
                $('#append-after').append(appendHtml);
            }
        });
        $('body').on('click','.delete_finance', function(){
            var delCounter = $(this).attr('counter');
            if($('#finance_section_'+delCounter).hasClass('existed')){
                $('#finance_section_'+delCounter).css('display','none');
                $('#finance_section_'+delCounter).find('.existing_one').val('delete');
            }else{
                $('#finance_section_'+delCounter).remove();
            }
        });
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout-old', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>