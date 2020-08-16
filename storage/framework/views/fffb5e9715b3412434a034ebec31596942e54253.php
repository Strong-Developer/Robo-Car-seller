<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <div class="row">
        <legend style="margin-left:14px;"><span>Manage Products</span><a href="<?php echo e(route('addProduct')); ?>" aria-expanded="true"><i style="margin-left: 30px;" class="fa fa-upload" aria-hidden="true"></i><span>Upload Product &amp; Deal</span></a></legend>
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
            <div class="col-12">
                <div class="table-responsive">
                    <div class="data-tables datatable-primary">
                        <table class="table text-center table-bordered" id="dataTable2">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>UPC</th>
                                    <th>Title</th>
                                    <!-- <th>Seller</th> -->
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Special Deal Price</th>
                                    <th>Lowest Price</th>
                                    <th>Deal Expiry Date</th>
                                    <th>Update/Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php if(isset($product->images[0]->file_path)): ?>
                                        <td> <img src="storage/app/<?php echo e($product->images[0]->file_path); ?>" width="50px" height="50px"> </td>
                                    <?php else: ?>
                                        <td> <img src="storage/app/" width="50px" height="50px"> </td>
                                    <?php endif; ?>
                                    <td><?php echo e($product->upc_product_code); ?></td>
                                    <td><?php echo e($product->product_title); ?> </td>
                                    <!-- <td><?php echo e($product->seller->email_address); ?></td> -->
                                    <th><?php echo e($product->category); ?></th>
                                    <th><?php echo e($product->seller_original_quantity); ?></th>
                                    <td>$<?php echo e($product->special_deal_price); ?></td>
                                    <td>$<?php echo e($product->lowest_price); ?></td>
                                    <td><?php echo e($product->deal_expiry_date); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('editProduct', ['request_id' => $product->request_id])); ?>">
                                            <i style="color: #01AEEF;" class="fa fa-pencil"></i>
                                        </a>
                                        <a href="<?php echo e(route('delete-product', ['request_id' => $product->request_id])); ?>" onclick="return  confirm('Are you sure?')">
                                            <i style="color: #FF5658;" class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php echo e($products->links()); ?>

            </div>
        </div>
        <!-- Start datatable js -->
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout-old', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>