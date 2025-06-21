

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Task')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('intern-asign-task')); ?>"><?php echo e(__('Recent Task')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('task')); ?></li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="card ">
                        <div class="card-body employee-detail-body fulls-card">
                            <h5><?php echo e($task->title); ?></h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong class="font-bold"><?php echo e(__('description')); ?> : </strong>
                                        <span><?php echo e($task->description); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold"><?php echo e(__('deadline')); ?> :</strong>
                                        <span><?php echo e($task->deadline); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold"><?php echo e(__('priority')); ?> :</strong>
                                        <span><?php echo e($task->priority); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold"><?php echo e(status); ?> :</strong>
                                        <span><?php echo $__env->make('components.status-badge', ['status' => $task->status], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold"><?php echo e(Drive Url); ?> :</strong>
                                        <span><a href="<?php echo e($task->url); ?>" download>Download attachment</a></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold"><?php echo e(Attachment); ?> :</strong>
                                        <span><a href="<?php echo e(asset('public/storage/' . $task->attachment)); ?>" download>Download attachment</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

          
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/mentor/show-task.blade.php ENDPATH**/ ?>