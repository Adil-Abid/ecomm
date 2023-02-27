<?php $__env->startSection('page_title','Color'); ?>
<?php $__env->startSection('color_select','active'); ?>
<?php $__env->startSection('container'); ?>
<?php echo e(session('message')); ?>

<h1>Color</h1>
<a href="<?php echo e(url('admin/color/manage_color')); ?>">
<button type="button" class="btn btn-success m-t-10" >Add Color</button>
</a>
<div class="row m-t-10">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Color</th>
                                                <!-- <th>Category Image</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($list->id); ?></td>
                                                <td><?php echo e($list->color); ?></td>
                                                <!-- <td><img src="../../images/<?php echo e($list->cimage); ?>" width="100px" height="100px" alt="img"></td> -->
                                                <td>
                                                <a href="<?php echo e(url('admin/color/manage_color')); ?>/<?php echo e($list->id); ?>"><button type="button" class="btn btn-success btn-sm" >Edit</button></a>
                                                <a href="<?php echo e(url('admin/color/delete')); ?>/<?php echo e($list->id); ?>"><button type="button" class="btn btn-danger btn-sm" >Delete</button></a>

                                                <?php if($list->status==1): ?>
                                                <a href="<?php echo e(url('admin/color/status/0')); ?>/<?php echo e($list->id); ?>"><button type="button" class="btn btn-outline-success btn-sm" >Active</button></a>
                                            <?php elseif($list->status==0): ?>
                                                <a href="<?php echo e(url('admin/color/status/1')); ?>/<?php echo e($list->id); ?>"><button type="button" class="btn btn-outline-danger btn-sm" >Deactive</button></a>
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

<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/color.blade.php ENDPATH**/ ?>