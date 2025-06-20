<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Department')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Department')); ?></li>
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
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Department')): ?>
                    <a href="#" data-url="<?php echo e(route('department.create')); ?>" data-ajax-popup="true"
                        data-title="<?php echo e(__('Create New Department')); ?>" data-bs-toggle="tooltip" title=""
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
                                            <th width="200px"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(!empty($department->branch) ? $department->branch->name : ''); ?></td>
                                                <td><?php echo e($department->name); ?></td>

                                                <td class="Action">
                                                    <div class="dt-buttons">
                                                        <span class="float-start">
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Department')): ?>
                                                                <div class="action-btn me-2">
                                                                    <a href="#" class="btn btn-sm align-items-center bg-info"
                                                                        data-url="<?php echo e(route('department.edit', $department->id)); ?>"
                                                                        data-ajax-popup="true" data-title="<?php echo e(__('Edit Department')); ?>"
                                                                        data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"
                                                                        data-original-title="<?php echo e(__('Edit')); ?>">
                                                                        <i class="ti ti-pencil text-white"></i>
                                                                    </a>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Department')): ?>
                                                                <div class="action-btn ">
                                                                    <?php echo Form::open([
                                                                        'method' => 'DELETE',
                                                                        'route' => ['department.destroy', $department->id],
                                                                        'id' => 'delete-form-' . $department->id,
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/department/index.blade.php ENDPATH**/ ?>