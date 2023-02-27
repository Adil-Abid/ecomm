<?php $__env->startSection('page_title','Coupon'); ?>
<?php $__env->startSection('coupon_select','active'); ?>
<?php $__env->startSection('container'); ?>
<?php echo e(session('message')); ?>

<h1>Coupon</h1>
<a href="<?php echo e(url('admin/coupon/manage_coupon')); ?>">
<button type="button" class="btn btn-success m-t-10" >Add Coupon</button>
</a>
<div class="row m-t-10">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Code</th>
                                                <th>Value</th>
                                                <!-- <th>Category Image</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($list->id); ?></td>
                                                <td><?php echo e($list->title); ?></td>
                                                <td><?php echo e($list->code); ?></td>
                                                <td><?php echo e($list->value); ?></td>
                                                <!-- <td><img src="../../images/<?php echo e($list->cimage); ?>" width="100px" height="100px" alt="img"></td> -->
                                                <td>
                                                <a href="<?php echo e(url('admin/coupon/delete')); ?>/<?php echo e($list->id); ?>"><button type="button" class="btn btn-danger" >Delete</button></a>
                                                <a href="<?php echo e(url('admin/coupon/manage_coupon')); ?>/<?php echo e($list->id); ?>"><button type="button" class="btn btn-success" >Edit</button></a>
                                                <?php if($list->status==1): ?>
                                                <a href="<?php echo e(url('admin/coupon/status/0')); ?>/<?php echo e($list->id); ?>"><button type="button" class="btn btn-outline-success btn-sm" >Active</button></a>
                                            <?php elseif($list->status==0): ?>
                                                <a href="<?php echo e(url('admin/coupon/status/1')); ?>/<?php echo e($list->id); ?>"><button type="button" class="btn btn-outline-danger btn-sm" >Deactive</button></a>
                                            <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/coupon.blade.php ENDPATH**/ ?>