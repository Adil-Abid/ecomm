<?php $__env->startSection('page_title','Manage Coupon'); ?>
<?php $__env->startSection('container'); ?>

<h1>Manage Coupon</h1>
<a href="<?php echo e(url('admin/coupon')); ?>">
<button type="button" class="btn btn-success m-t-10" >Back</button>
</a>
<div class="row m-t-10">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?php echo e(route('coupon.manage_coupon_process')); ?>" method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                                <label for="title" class="control-label mb-1">Title</label>
                                                <input id="title" value="<?php echo e($title); ?>" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>
                                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="code" class="control-label mb-1">Code</label>
                                                <input id="code" value="<?php echo e($code); ?>" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                <!-- <label for="cimage" class="control-label mb-1">Category Image</label>
                                                <input type="file" class="form-control" value="" name="cimage" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                                                <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="value" class="control-label mb-1">Value</label>
                                                <input id="value" value="<?php echo e($value); ?>" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                <!-- <label for="cimage" class="control-label mb-1">Category Image</label>
                                                <input type="file" class="form-control" value="" name="cimage" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"> -->
                                                <?php $__errorArgs = ['value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div>
                                                <button id="" type="submit" class="btn btn-lg btn-info btn-block">
                                                Submit
                                                </button>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo e($id); ?>">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/manage_coupon.blade.php ENDPATH**/ ?>