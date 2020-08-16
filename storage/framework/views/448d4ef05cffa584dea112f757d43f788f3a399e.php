<?php $__env->startSection('content'); ?>
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
                    <p><b>RoboNegotiator</b> Add Lease Parameters</p>
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
                  Add Lease Parameters
                  </div>
                  <div class="panel-body">
                    <form action="<?php echo e(route('edit-lease-parameters',['prodcode' => $productLeaseData->upc_product_code])); ?>" method="post" id="edit-form">
                      <?php echo e(csrf_field()); ?>


                      <div class="panel panel-info">
                        <div class="panel-heading">Other Info</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input value="<?php echo e($productLeaseData->tax_rate); ?>" aria-describedby="basic-add1" required class="form-control" maxlength="5" value="" placeholder="Your State Tax Rate" type="number" name="state_tax_rate">
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
                                        <input value="<?php echo e($productLeaseData->money_factor); ?>" class="form-control" maxlength="8" value="" required placeholder="Money Factor" type="number" name="money_factor">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input value="<?php echo e($sellerDeal->seller_orignal_quantity); ?>" class="form-control" maxlength="4" value="" required  placeholder="Quantity For Leasing" type="number" name="quantity_for_leasing">
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

                                    <div class="row lease_section existed" id="lease_section_0">
                                        <div class="col-md-4">
                                            <input type="hidden" class="existing_one" value="update" name="lease_sub_parameter[0][action]"/>
                                            <input type="hidden" value="<?php echo e(isset($productLeaseData->seller_lease_sub_parameters[0]->id)?$productLeaseData->seller_lease_sub_parameters[0]->id:''); ?>" name="lease_sub_parameter[0][id]"/>
                                            <input class="form-control" type="number" value="<?php echo e(isset($productLeaseData->seller_lease_sub_parameters[0]->duration_in_month)?$productLeaseData->seller_lease_sub_parameters[0]->duration_in_month:''); ?>" name="lease_sub_parameter[0][duration_in_month]" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" value="<?php echo e(isset($productLeaseData->seller_lease_sub_parameters[0]->miles_allowed_per_year)?$productLeaseData->seller_lease_sub_parameters[0]->miles_allowed_per_year:''); ?>" type="number" name="lease_sub_parameter[0][miles_allowed_per_year]" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <input value="<?php echo e(isset($productLeaseData->seller_lease_sub_parameters[0]->residual_value)?$productLeaseData->seller_lease_sub_parameters[0]->residual_value:''); ?>" class="form-control custom-residual-value" type="text" name="lease_sub_parameter[0][residual_value]" required/>
                                        </div>
                                    </div>
                                    <br>
                                    <?php
                                    if(isset($productLeaseData->seller_lease_sub_parameters[0])){
                                    unset($productLeaseData->seller_lease_sub_parameters[0]);
                                    }
                                    ?>
                                    <div id="append-after">
                                    <?php
                                    $counter = 1;
                                    ?>
                                    <?php $__currentLoopData = $productLeaseData->seller_lease_sub_parameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parameters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row lease_section existed" id="lease_section_<?php echo e($counter); ?>">
                                        <div class="col-md-4">
                                            <input type="hidden" class="existing_one" value="update" name="lease_sub_parameter[<?php echo e($counter); ?>][action]"/>
                                            <input type="hidden" value="<?php echo e(isset($productLeaseData->seller_lease_sub_parameters[$counter]->id)?$productLeaseData->seller_lease_sub_parameters[$counter]->id:''); ?>" name="lease_sub_parameter[<?php echo e($counter); ?>][id]"/>
                                            <input value="<?php echo e(isset($productLeaseData->seller_lease_sub_parameters[$counter]->duration_in_month)?$productLeaseData->seller_lease_sub_parameters[$counter]->duration_in_month:''); ?>" class="form-control" type="number" name="lease_sub_parameter[<?php echo e($counter); ?>][duration_in_month]" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <input value="<?php echo e(isset($productLeaseData->seller_lease_sub_parameters[$counter]->miles_allowed_per_year)?$productLeaseData->seller_lease_sub_parameters[$counter]->miles_allowed_per_year:''); ?>" class="form-control" type="number" name="lease_sub_parameter[<?php echo e($counter); ?>][miles_allowed_per_year]" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input value="<?php echo e(isset($productLeaseData->seller_lease_sub_parameters[$counter]->residual_value)?$productLeaseData->seller_lease_sub_parameters[$counter]->residual_value:''); ?>" class="custom-residual-value form-control" type="text" name="lease_sub_parameter[<?php echo e($counter); ?>][residual_value]" required/>
                                                <div class="input-group-append delete_lease"  counter="<?php echo e($counter); ?>">
                                                    <span class="input-group-text" id="basic-add<?php echo e($counter); ?>">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <label id="lease_sub_parameter[<?php echo e($counter); ?>][residual_value]-error" style="display:none;" class="error" for="lease_sub_parameter[<?php echo e($counter); ?>][residual_value]">This field is required.</label>
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
        $("#edit-form").validate({
			rules: {
				state_tax_rate: "required",
				money_factor: "required",
				quantity_for_leasing: "required"
			},
			messages: {
				state_tax_rate: "Please enter state tax rate.",
				money_factor: "Please enter money factor.",
				quantity_for_leasing: "Please enter quantity."
			}
		});
        $('#edit-form').validate();
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

            if($('#edit-form').valid()){
                $('#up_button').hide();
                $('#edit-form').submit();
            }else{
              $('#edit-form').submit();
            }
        });
        $('#add-more-lease').click(function(){
            var counter = $('.lease_section').length;
            if(counter < 10) {
                var appendHtml = '<div class="row lease_section" id="lease_section_'+counter+'"><div class="col-md-4"><input type="hidden" value="add" name="lease_sub_parameter['+counter+'][action]"/><input type="hidden" value="" name="lease_sub_parameter['+counter+'][id]"/><input class="form-control" type="number" name="lease_sub_parameter['+counter+'][duration_in_month]" required/></div><div class="col-md-4"><input class="form-control" type="number" name="lease_sub_parameter['+counter+'][miles_allowed_per_year]" required/></div><div class="col-md-4"><div class="input-group mb-3"><input class="custom-residual-value form-control" type="text" name="lease_sub_parameter['+counter+'][residual_value]" required/><div class="input-group-append delete_lease"  counter="'+counter+'"><span class="input-group-text" id="basic-add'+counter+'"><i class="fa fa-trash" aria-hidden="true"></i></span></div></div><label id="lease_sub_parameter['+counter+'][residual_value]-error" style="display:none;" class="error" for="lease_sub_parameter['+counter+'][residual_value]">This field is required.</label></div></div>'
                $('#append-after').append(appendHtml);
            }
        });
        $('body').on('click','.delete_lease', function(){
            var delCounter = $(this).attr('counter');
            if($('#lease_section_'+delCounter).hasClass('existed')){
                $('#lease_section_'+delCounter).css('display','none');
                $('#lease_section_'+delCounter).find('.existing_one').val('delete');
            }else{
                $('#lease_section_'+delCounter).remove();
            }
        });
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout-old', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>