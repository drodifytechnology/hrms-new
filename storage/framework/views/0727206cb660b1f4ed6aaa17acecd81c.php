<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Designation')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Designation')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        
        <div class="col-12">
            <?php echo $__env->make('layouts.hrm_setup', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <div class="col-12">
            <div class="my-3 d-flex justify-content-end">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Designation')): ?>
                    <a href="#" data-url="<?php echo e(route('designation.create')); ?>" data-ajax-popup="true"
                        data-title="<?php echo e(__('Create New Designation')); ?>" data-bs-toggle="tooltip" title=""
                        class="btn btn-sm btn-primary" data-bs-original-title="<?php echo e(__('Create')); ?>">
                        <i class="ti ti-plus"></i>
                    </a>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body table-border-style">

                            <div class="table-responsive">
                                <table class="table" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Branch')); ?></th>
                                            <th><?php echo e(__('Department')); ?></th>
                                            <th><?php echo e(__('Designation')); ?></th>
                                            <th width="200px"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(!empty($designation->branch_id) ? $designation->branch->name : '-'); ?>

                                                </td>
                                                <td><?php echo e(!empty($designation->department_id) && !empty($designation->department) ? $designation->department->name : '-'); ?>

                                                </td>
                                                <td><?php echo e($designation->name); ?></td>
                                                <td class="Action">
                                                    <div class="dt-buttons">
                                                        <span class="float-start">
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Designation')): ?>
                                                                <div class="action-btn me-2">
                                                                    <a href="#"
                                                                        class="btn btn-sm align-items-center bg-info"
                                                                        data-url="<?php echo e(route('designation.edit', $designation->id)); ?>"
                                                                        data-ajax-popup="true"
                                                                        data-title="<?php echo e(__('Edit Designation')); ?>"
                                                                        data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"
                                                                        data-original-title="<?php echo e(__('Edit')); ?>">
                                                                        <i class="ti ti-pencil text-white"></i>
                                                                    </a>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Designation')): ?>
                                                                <div class="action-btn ">
                                                                    <?php echo Form::open([
                                                                        'method' => 'DELETE',
                                                                        'route' => ['designation.destroy', $designation->id],
                                                                        'id' => 'delete-form-' . $designation->id,
                                                                    ]); ?>

                                                                    <a href="#"
                                                                    data-bs-trigger="hover" 
                                                                        class="btn btn-sm  align-items-center bs-pass-para bg-danger"
                                                                        data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"><i
                                                                            class="ti ti-trash text-white text-white"></i></a>
                                                                    <?php echo Form::close(); ?>

                                                                </div>
                                                            <?php endif; ?>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).on('change', '#branch_id', function() {
            var branch_id = $(this).val();
            getDepartment(branch_id);
        });

        function getDepartment(branch_id) {
            var data = {
                "branch_id": branch_id,
                "_token": "<?php echo e(csrf_token()); ?>",
            }

            $.ajax({
                url: '<?php echo e(route('employee.getdepartment')); ?>',
                method: 'POST',
                data: data,
                success: function(data) {
                    $('#department_id').empty();
                    $('#department_id').append(
                        '<option value="" disabled><?php echo e(__('Select Department')); ?></option>');

                    $.each(data, function(key, value) {
                        $('#department_id').append('<option value="' + key + '">' + value +
                            '</option>');
                    });
                    $('#department_id').val('');
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/designation/index.blade.php ENDPATH**/ ?>