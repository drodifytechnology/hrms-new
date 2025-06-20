


<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('My Tasks')); ?>

<?php $__env->stopSection(); ?>
<?php
    $setting = App\Models\Utility::settings();
    $icons = \App\Models\Utility::get_file('uploads/job/icons/');
?>
<?php $__env->startSection('content'); ?>
 <div class="row">
        <div class="col-xl-12">
            
                <div class="col-sm-12 col-md-12">
                    <div class="card ">
                        <div class="card-body employee-detail-body fulls-card">
                  
                                <?php if(session('status')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e(session('status')); ?>

                                    </div>
                                <?php endif; ?>
                                <?php if(count($tasks)): ?>
                                <div class="table-responsive">
                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Task Title</th>
                                                        <th>Asign To</th>
                                                        <th>Deadline</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>    
                                                <tbody>
                                                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($task->title); ?></td>
                                                        <td><?php echo e($task->internship->intern->name); ?></td>
                                                        <td><?php echo e($task->deadline ?? 'N/A'); ?></td>
                                                        <td><?php echo $__env->make('components.status-badge', ['status' => $task->status], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></td>
                                                        <td>
                                                        <div class="action-btn me-2">
                                                                <a href="<?php echo e(route('task.view', \Illuminate\Support\Facades\Crypt::encrypt($task->id))); ?>"
                                                                    class="mx-3 btn btn-sm bg-info align-items-center"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="<?php echo e(__('show')); ?>">
                                                                View Task
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                    <?php else: ?>
                                    <p>No tasks assigned yet.</p>
                                    <?php endif; ?>
                            </div></div></div></div>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/mentor/mentor-asign-task.blade.php ENDPATH**/ ?>