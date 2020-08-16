<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                    <!-- Default form register -->
                    <form class="text-center border border-light p-5" action="#!">

                        <p class="h4 mb-4">Profile Details</p>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- First name --><label>First Name</label>
                                <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name" value="<?php echo e($seller->first_name); ?>" disabled>
                            </div>
                            <div class="col">
                                <!-- Last name --><label>Last Name</label>
                                <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name" value="<?php echo e($seller->last_name); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col">
                                <label>Email Address</label>
                                <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Email Address" value="<?php echo e($seller->email_address); ?>" disabled>
                            </div>
                            <div class="col">
                                <label>Company Name</label>
                                <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Company Name" value="<?php echo e($seller->company_name); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col">
                                <label>Contact Number</label>
                                <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name" value="<?php echo e($seller->cell_no); ?>" disabled>
                            </div>
                            <div class="col">
                                <label>Negotiation Mode</label>
                                <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name" value="<?php echo e(strtoupper($seller->negotiation)); ?>" disabled>
                            </div>
                        </div>
                    </form>
                    <form class="text-center border border-light p-5" action="<?php echo e(url('/reset_password')); ?>" method="post">
                        <p class="h4 mb-4">Reset Password</p>
                        <div class="form-row mb-4">
                            <div class="col">
                                <input type="password" id="defaultRegisterFormFirstName" class="form-control" name="curr_password" placeholder="Current Password" >
                            </div>
                            <div class="col">
                                <input type="password" id="defaultRegisterFormLastName" class="form-control" name="new_password" placeholder="New Password">
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col">
                                <input type="password" id="defaultRegisterFormFirstName" class="form-control" name="confirm_password" placeholder="Confirm Password">
                            </div>
                            <div class="col">
                                <button type="submit" class="form-control" style="background-color: #000850;color: #ffffff;">Submit</button>
                            </div>
                        </div>
                    </form>
                    <!-- Default form register -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout-old', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>