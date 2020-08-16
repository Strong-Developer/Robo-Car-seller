<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
	            <div class="card-body">
	                <h4 class="header-title">Customer Profile</h4>
	                <form action="<?php echo e(route('get.customerProfile')); ?>" method="post">
	                    <div class="form-row align-items-center">
	                        <div class="col-sm-10 my-10">
	                            <label class="sr-only" for="inlineFormInputName">Email Id</label>
	                            <?php if(isset($customer_details)): ?>
	                            <input class="form-control" type="email" placeholder="name@example.com" id="example-email-input" name="buyer_email_id" value="<?php echo e($customer_details['Buyer_Email']); ?>">
	                            <?php else: ?>
	                            <input class="form-control" type="email" placeholder="name@example.com" id="example-email-input" name="buyer_email_id">
	                            <?php endif; ?>
	                        </div>
	                        <div class="col-auto my-1">
	                            <button type="submit" class="btn btn-flat btn-primary">Get Profile</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
		</div>
	</div>	

	<?php if(isset($customer_details) && array_key_exists("FullyMatched",$customer_details)): ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
	            <div class="card-body">
	                <p class="card-text">Fully Matched: <?php echo e($customer_details['FullyMatched']); ?></p>
	                <p class="card-text">In Negotiation: <?php echo e($customer_details['InNegotiation']); ?></p>
	                <p class="card-text">Not Matching: <?php echo e($customer_details['NotMatching']); ?></p>
	                <p class="card-text">Partial Matched: <?php echo e($customer_details['PartialMatched']); ?></p>
	                <p class="card-text">Average Percentage Increase: <?php echo e($customer_details['average_percentage_increase']); ?></p>
	                <p class="card-text">Minimum Percentage Increase: <?php echo e($customer_details['minimum_percentage_increase']); ?></p>
	                <p class="card-text">Total Deals: <?php echo e($customer_details['total_Deals']); ?></p>
	            </div>
	        </div>
		</div>
	</div>
	<?php elseif(isset($customer_details)): ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
		        <div class="card-body">
		        	 <h5 class="card-title">No Result Found</h5>
		        </div>
		    </div>
		</div>
	</div>
	<?php endif; ?>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout-old', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>