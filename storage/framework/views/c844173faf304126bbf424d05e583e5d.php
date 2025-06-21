


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
                      
                        <div class="table-responsive">
                            <table class="table" id="pc-dt-simple">
                                <thead>
                                    <tr>
                                        <th>Task Title</th>
                                        <th>Intern</th>
                                        <th>Score</th>
                                        <th>Feedback</th>
                                        <th>Submitted On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $submitted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($eval->task->title ?? '-'); ?></td>
                                        <td><?php echo e($eval->internship->intern->name); ?></td>
                                        <td><?php echo e($eval->score); ?></td>
                                        <td><?php echo e($eval->feedback); ?></td>
                                        <td><?php echo e($eval->updated_at->format('d-m-Y')); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                      
                </div>
            </div>
        </div>
     
        
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/mentor/submitted-evaluations.blade.php ENDPATH**/ ?>