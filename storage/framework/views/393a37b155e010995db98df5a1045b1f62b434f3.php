<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<div class="row">
    <legend style="margin-left:14px;"><span>Manage Product Discount/Rebate</span><a href="<?php echo e(url('add-product-discount')); ?>" aria-expanded="true"><i style="margin-left: 30px;" class="fa fa-upload" aria-hidden="true"></i><span>Set Discounts/Rebates</span></a></legend>

        <div class="col-12">
        <?php if(session()->has('error')): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Alert !</strong><span> <?php echo e(session()->get('error')); ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success !</strong><span> <?php echo e(session()->get('success')); ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-10">
                    <select required name="product" class="custom-select" style="display: block !important;" >
                        <option value="">Select Product *</option>
                        <?php $__currentLoopData = $all_seller_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($one->upc_product_code); ?>" <?php if($product_title == $one->product_title): ?> selected <?php endif; ?> ><?php echo e($one->product_title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>



        <div class="table-responsive">
            <div class="data-tables datatable-primary">
                <table class="table text-center table-bordered" id="dataTable2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Type</th>
                            <th>Discount/Rebate</th>
                            <th>Amount</th>
                            <th>Quantity</th>
                            <th>Applicability</th>
                            <th>Expiry Date</th>
                            <th>Creation Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $productDiscountData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key + 1); ?></td>
                            <td><?php echo e($product->upc_product_code); ?></td>
                            <td><?php echo e($product_title); ?></td>
                            <th><?php echo e($product->type); ?></th>
                            <th><?php echo e($product->title); ?></th>
                            <th>$<?php echo e($product->amount); ?></th>
                            <?php if($product->qty == -1): ?>
                                <th>Unlimited</th>
                            <?php else: ?>
                                <th><?php echo e($product->qty); ?></th>
                            <?php endif; ?>
                            <td><?php echo e($product->applicability); ?></td>
                            <td><?php echo e($product->expiry_date); ?></td>
                            <td><?php echo e($product->created_at); ?></td>
                            <td>
                                <a href="<?php echo e(route('edit-product-discount-rebate', ['discount_id' => $product->id, 'upc_product_code' => $product->upc_product_code])); ?>">
                                <i style="color: #01AEEF;" class="fa fa-pencil"></i>
                                </a>
                                <a href="<?php echo e(route('delete-product-discount-rebate', ['discount_id' => $product->id])); ?>" onclick="return  confirm('Are you sure?')">
                                <i style="color: #FF5658;" class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $('select').on('change', function() {

        location.replace('<?php echo route('manage-discounts-rebates', ['upc_product_code' => '']); ?>' + this.value);
    });
</script>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout-old', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>