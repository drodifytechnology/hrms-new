
<?php
    $class = match($status ?? '') {
        'Active' => 'badge bg-success',
        'Completed' => 'badge bg-primary',
        'Requested Change' => 'badge bg-warning',
        default => 'badge bg-secondary',
    };
?>

<span class="<?php echo e($class); ?>"><?php echo e($status); ?></span>
            <?php /**PATH C:\laragon\www\hrms\resources\views/components/status-badge.blade.php ENDPATH**/ ?>