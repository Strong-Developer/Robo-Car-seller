<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-12">







            <div class="card mb-5">

                <div class="card-header">

                    <p class="font-weight-bold"> Manage Sellers</p>

                </div>

                <div class="card-body">


                    <div class="row">

                        <div class="col-12">

                            <div class="table-responsive">

                                <table class="table table-bordered">

                                    <thead>

                                    <tr>

                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Cell No</th>
                                        <th>Negotiation Mode</th>
                                        <th>Delete</th>

                                    </tr>

                                    </thead>

                                    <tbody>


                                    <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td><?php echo e($seller->id); ?></td>
                                            <td><?php echo e($seller->first_name); ?> <?php echo e($seller->last_name); ?></td>
                                            <td><?php echo e($seller->company_name); ?></td>
                                            <td><?php echo e($seller->email_address); ?></td>
                                            <td><?php echo e($seller->cell_no); ?></td>
                                            <td><?php echo e($seller->negotiation); ?></td>

                                            <td>
                                                <a href="<?php echo e(route('admin.seller.delete',['seller_id' => $seller->id ])); ?>"
                                                   onclick="return  confirm
                                                ('All data and ' +
                                                 'products of ' +
                                                 'this ' +
                                                 'seller ' +
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

                            <?php echo e($sellers->links()); ?>

                        </div>

                    </div>

                </div>

            </div>


        </div>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>