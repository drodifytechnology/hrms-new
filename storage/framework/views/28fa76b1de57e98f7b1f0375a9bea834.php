<h2>Intern Evaluations</h2>
<?php if(session('success')): ?><p class="text-success"><?php echo e(session('success')); ?></p><?php endif; ?>
<?php $__currentLoopData = $internships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $internship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <form method="POST" action="<?php echo e(route('mentor.evaluations.submit')); ?>">
        <?php echo csrf_field(); ?>
        <p><strong><?php echo e($internship->intern->name); ?></strong> (<?php echo e($internship->internship_id); ?>)</p>
        <input type="hidden" name="internship_id" value="<?php echo e($internship->id); ?>">
        <input type="number" name="score" min="0" max="100" required>
        <textarea name="feedback" required></textarea>
        <button type="submit">Submit Evaluation</button>
    </form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/mentor/evaluations.blade.php ENDPATH**/ ?>