
<?php if(count($internships??[]) > 0): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Intern</th>
                <th>Completed Tasks</th>
                <th>Total Tasks</th>
                <th>Progress</th>
            </tr>
        </thead>
        <tbody> 
            <?php $__currentLoopData = $internships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $internship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $total = $internship->tasks->count();
                    $done = $internship->tasks->where('status', 'Completed')->count();
                    $percentage = $total > 0 ? round(($done / $total) * 100) : 0;
                ?>
                <tr>
                    <td><?php echo e($internship->intern->name); ?></td>
                    <td><?php echo e($done); ?></td>
                    <td><?php echo e($total); ?></td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: <?php echo e($percentage); ?>%"><?php echo e($percentage); ?>%</div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No interns assigned.</p>     
<?php endif; ?>
<?php /**PATH C:\laragon\www\hrms\resources\views/components/progress-overview.blade.php ENDPATH**/ ?>