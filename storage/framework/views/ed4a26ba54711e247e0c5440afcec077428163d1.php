<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-12">







            <div class="card mb-5">

                <div class="card-header">

                    <p class="font-weight-bold"> Manage Products</p>

                </div>

                <div class="card-body">


                    <div class="row">

                        <div class="col-12">

                            <div class="table-responsive">

                                <table class="table table-bordered">

                                    <thead>

                                    <tr>

                                        <th>UPC</th>
                                        <th>Title</th>
                                        <th>Seller</th>
                                        <th>Category</th>
                                        <th>Special Deal Price</th>
                                        <th>Lowest Price</th>
                                        <th>Deal Expiry Date</th>
                                        <th>Delete</th>

                                    </tr>

                                    </thead>

                                    <tbody>


                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td><?php echo e($product->upc_product_code); ?></td>
                                            <td><?php echo e($product->product_title); ?> </td>
                                            <td><?php echo e($product->seller->email_address); ?></td>
                                            <th><?php echo e($product->category); ?></th>
                                            <td><?php echo e($product->special_deal_price); ?></td>
                                            <td><?php echo e($product->lowest_price); ?></td>
                                            <td><?php echo e($product->deal_expiry_date); ?></td>

                                            <td>
                                                <a href="<?php echo e(route('admin.product.delete',['id' => $product->id ])); ?>"
                                                   onclick="return  confirm
                                                ('All data  of ' +
                                                 'this ' +
                                                 'product ' +
                                                 'will' +
                                                 ' be deleted , are you sure to perform this action ?')" class="btn
                                                 btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                </table>

                            </div>

                            <?php echo e($products->links()); ?>

                        </div>

                    </div>

                </div>

            </div>


        </div>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>