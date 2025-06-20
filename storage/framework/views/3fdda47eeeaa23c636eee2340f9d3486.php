
<div class="table-responsive">
 <table class="table" id="pc-dt-simple">
    <thead>
        <tr>
            <th>Title</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Deadline</th>
            <th>Attachment</th>
            <th>Progress</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($task->title); ?></td>
            <td><?php echo e($task->priority); ?></td>
            <td><?php echo $__env->make('components.status-badge', ['status' => $task->status], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></td>
            <td><?php echo e($task->deadline ?? 'N/A'); ?></td>
            <td><a href="<?php echo e(asset('storage/' . $task->attachment)); ?>" download>Download attachment</a></td>
            <td>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo e($task->completion_percentage ?? 0); ?>%">
                        <?php echo e($task->completion_percentage ?? 0); ?>%
                    </div>
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</div>
<?php /**PATH C:\laragon\www\hrms\resources\views/components/task-list.blade.php ENDPATH**/ ?>