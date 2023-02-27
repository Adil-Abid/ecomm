<?php $__env->startSection('page_title','Manage Size'); ?>
<?php $__env->startSection('size_select','active'); ?>
<?php $__env->startSection('container'); ?>

<h1>Manage Size</h1>
<a href="<?php echo e(url('admin/size')); ?>">
<button type="button" class="btn btn-success m-t-10" >Back</button>
</a>
<div class="row m-t-10">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?php echo e(route('size.manage_size_process')); ?>" method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                                <label for="size" class="control-label mb-1">Size</label>
                                                <input id="size" value="<?php echo e($size); ?>" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" required>
                                                <?php $__errorArgs = ['size'];
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

<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/manage_size.blade.php ENDPATH**/ ?>