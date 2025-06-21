

<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Interns')); ?>

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
                    <h5>Pending Evaluations</h5>
                </div>
                <div class="card-body">

                    <h2>Evaluate Task: <?php echo e($evaluation->task->title ?? 'N/A'); ?></h2>
                    <?php if($evaluation->status === 'Submitted'): ?>
                        <div class="alert alert-info">Evaluation already submitted.</div>
                    <?php else: ?>
                        <form method="POST"
                            action="<?php echo e(route('mentor.evaluations.submit', $evaluation->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <p><strong>Intern:</strong> <?php echo e($evaluation->internship->intern->name); ?></p>
                            <label>Score (0-100):</label>
                            <input type="number" name="score" class="form-control" value="<?php echo e($evaluation->score); ?>"
                                required>
                            <label>Feedback:</label>
                            <textarea name="feedback" class="form-control" required><?php echo e($evaluation->feedback); ?></textarea>
                            <button class="btn btn-success mt-2">Submit Evaluation</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/mentor/evaluations.blade.php ENDPATH**/ ?>