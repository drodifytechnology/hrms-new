


<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php
    $setting = App\Models\Utility::settings();
    $icons = \App\Models\Utility::get_file('uploads/job/icons/');
?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>


<!-- <?php if(session('success')): ?><div class="alert alert-success"><?php echo e(session('success')); ?></div><?php endif; ?> -->

    
        <div class="row">
            <div class="col-md-12">
                <div class="card em-card">
                    <div class="card-header">
                        <h5>Progress Overview</h5>
                        <div class="float-end">
                            <a href="<?php echo e(route('intern')); ?>" data-title="<?php echo e(__('Asign Ttask')); ?>" data-bs-toggle="tooltip"
                                title="" class="btn btn-sm btn-primary" data-bs-original-title="<?php echo e(__('Asign Ttask')); ?>">
                               <?php echo e(__('Asign Task')); ?>

                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo $__env->make('components.progress-overview', ['internships' => $internships], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/mentor/dashboard.blade.php ENDPATH**/ ?>