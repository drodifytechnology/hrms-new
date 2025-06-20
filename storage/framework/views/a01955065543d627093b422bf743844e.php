


<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php
    $setting = App\Models\Utility::settings();
    $icons = \App\Models\Utility::get_file('uploads/job/icons/');
?>
<?php $__env->startSection('content'); ?>
     <div class="row">
            <div class="col-md-12">
                <div class="card em-card">
                    <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                     <h2>Welcome, <?php echo e(Auth::user()->name); ?></h2>
                    <a href="<?php echo e(route('intern.certificate')); ?>" class="btn btn-success mt-3">Download Certificate</a>
                </div>
            </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/intern/dashboard.blade.php ENDPATH**/ ?>