<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Roles')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Role')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    
        <a href="#" data-url="<?php echo e(route('roles.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Role')); ?>"
            data-bs-toggle="tooltip" title="" data-size="lg" class="btn btn-sm btn-primary"
            data-bs-original-title="<?php echo e(__('Create')); ?>">
            <i class="ti ti-plus"></i>
        </a>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header card-body table-border-style">
                    
                    <div class="table-responsive">
                        <table class="table" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Role')); ?></th>
                                    <th><?php echo e(__('Permissions')); ?></th>
                                    <th width="200px"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($role->name); ?></td>
                                        <td style="white-space: inherit">
                                            <?php $__currentLoopData = $role->permissions()->pluck('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="badge badge p-2 m-1 px-3 bg-primary ">
                                                    <a href="#" class="text-white"><?php echo e($permission); ?></a>
                                                </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td class="Action">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Role')): ?>
                                                <div class="action-btn me-2">
                                                    <a data-url="<?php echo e(URL::to('roles/' . $role->id . '/edit')); ?>"
                                                        data-ajax-popup="true" data-size="lg"
                                                        class="mx-3 btn btn-sm bg-info align-items-center"
                                                        data-bs-toggle="tooltip" title=""
                                                        data-title="<?php echo e(__('Edit Role')); ?>"
                                                        data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                           
                                                <?php if($role->name != 'employee'): ?>
                                                    <div class="action-btn">
                                                        <?php echo Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['roles.destroy', $role->id],
                                                            'id' => 'delete-form-' . $role->id,
                                                        ]); ?>

                                                        <a href="#"
                                                        data-bs-trigger="hover"
                                                            class=" btn btn-sm bg-danger align-items-center bs-pass-para"
                                                            data-bs-toggle="tooltip" title=""
                                                            data-bs-original-title="Delete" aria-label="Delete"><span
                                                                class="text-white"><i class="ti ti-trash"></i></span></a>
                                                        </form>
                                                    </div>
                                                <?php endif; ?>
                                          
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/role/index.blade.php ENDPATH**/ ?>