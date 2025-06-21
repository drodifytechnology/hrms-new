


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
                                        <th>Intern Name</th>
                                        <th>Submitted On</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($eval->task->title ?? '-'); ?></td>
                                        <td><?php echo e($eval->internship->intern->name); ?></td>
                                        <td><?php echo e($eval->created_at->format('d-m-Y')); ?></td>
                                        <td><?php echo $__env->make('components.status-badge', ['status' => $eval->status], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></td>
                                        <td><a href="<?php echo e(route('mentor.evaluations.edit', $eval->id)); ?>" class="btn btn-sm btn-primary">Evaluate</a></td>
                                    </tr>       
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                      
                </div>
            </div>
        </div>
     
        
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/mentor/pending-evaluations.blade.php ENDPATH**/ ?>