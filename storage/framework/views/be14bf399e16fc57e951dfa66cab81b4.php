<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Employee')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Employee')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <a href="#" data-url="<?php echo e(route('employee.file.import')); ?>" data-ajax-popup="true"
        data-title="<?php echo e(__('Import  Employee CSV File')); ?>" data-bs-toggle="tooltip" title=""
        class="btn btn-sm btn-primary me-1" data-bs-original-title="<?php echo e(__('Import')); ?>">
        <i class="ti ti-file"></i>
    </a>

    <a href="<?php echo e(route('employee.export')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-original-title="<?php echo e(__('Export')); ?>" class="btn btn-sm btn-primary me-1">
        <i class="ti ti-file-export"></i>
    </a>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Employee')): ?>
        <a href="<?php echo e(route('employee.create')); ?>" data-title="<?php echo e(__('Create New Employee')); ?>" data-bs-toggle="tooltip"
            title="" class="btn btn-sm btn-primary" data-bs-original-title="<?php echo e(__('Create')); ?>">
            <i class="ti ti-plus"></i>
        </a>
    <?php endif; ?>
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
                                    <th><?php echo e(__('Employee ID')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Email')); ?></th>
                                    <th><?php echo e(__('Branch')); ?></th>
                                    <th><?php echo e(__('Department')); ?></th>
                                    <th><?php echo e(__('Designation')); ?></th>
                                    <th><?php echo e(__('Date Of Joining')); ?></th>
                                    <?php if(Gate::check('Edit Employee') || Gate::check('Delete Employee')): ?>
                                        <th width="200px"><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($employees): ?>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Employee')): ?>
                                                <a class="btn btn-outline-primary"
                                                    href="<?php echo e(route('employee.show', \Illuminate\Support\Facades\Crypt::encrypt($employee->id))); ?>"><?php echo e(\Auth::user()->employeeIdFormat($employee->employee_id)); ?></a>
                                            <?php else: ?>
                                                <a href="#"
                                                    class="btn btn-outline-primary"><?php echo e(\Auth::user()->employeeIdFormat($employee->employee_id)); ?></a>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($employee->name); ?></td>
                                        <td><?php echo e($employee->email); ?></td>
                                        <td>
                                            <?php echo e(!empty($employee->branch_id) ? $employee->branch->name : ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e(!empty($employee->department_id) ? $employee->department->name : '-'); ?>

                                        </td>
                                        <td>
                                            <?php echo e(!empty($employee->designation_id) ? $employee->designation->name : '-'); ?>

                                        </td>
                                        <td>
                                            <?php echo e(\Auth::user()->dateFormat($employee->company_doj)); ?>

                                        </td>
                                        <?php if(Gate::check('Edit Employee') || Gate::check('Delete Employee')): ?>
                                            <td class="Action">
                                                <?php if($employee->user->is_active == 1 && $employee->user->is_disable == 1): ?>
                                                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'hr'): ?>
                                                        <?php if($employee->user->is_login_enable == 1): ?>
                                                            <div class="action-btn me-2">
                                                                <a href="<?php echo e(route('user.login', \Crypt::encrypt($employee->user->id))); ?>"
                                                                    class="mx-3 btn btn-sm bg-success align-items-center"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="<?php echo e(__('Login Disable')); ?>">
                                                                    <span class="text-white"><i
                                                                            class="ti ti-road-sign"></i></span>
                                                                </a>
                                                            </div>
                                                        <?php elseif($employee->user->is_login_enable == 0 && $employee->user->password == null): ?>
                                                            <div class="action-btn me-2">
                                                                <a href="#"
                                                                    data-url="<?php echo e(route('employee.reset', \Crypt::encrypt($employee->user->id))); ?>"
                                                                    class="mx-3 btn btn-sm bg-warning align-items-center"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-ajax-popup="true" data-size="md"
                                                                    data-bs-original-title="<?php echo e(__('New Password')); ?>">
                                                                    <span class="text-white"><i
                                                                            class="ti ti-road-sign"></i></span>
                                                                </a>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="action-btn me-2">
                                                                <a href="<?php echo e(route('user.login', \Crypt::encrypt($employee->user->id))); ?>"
                                                                    class="mx-3 btn btn-sm bg-danger align-items-center"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="<?php echo e(__('Login Enable')); ?>">
                                                                    <span class="text-white"><i
                                                                            class="ti ti-road-sign"></i></span>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'hr'): ?>
                                                        <div class="action-btn me-2">
                                                            <a href="#"
                                                                data-url="<?php echo e(route('employee.reset', \Crypt::encrypt($employee->user->id))); ?>"
                                                                class="mx-3 btn btn-sm bg-warning align-items-center"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-ajax-popup="true" data-size="md"
                                                                data-bs-original-title="<?php echo e(__('Change Password')); ?>">
                                                                <span class="text-white"><i class="ti ti-key"></i></span>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Employee')): ?>
                                                        <div class="action-btn me-2">
                                                            <a href="<?php echo e(route('employee.edit', \Illuminate\Support\Facades\Crypt::encrypt($employee->id))); ?>"
                                                                class="mx-3 btn btn-sm bg-info align-items-center"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                                <i class="ti ti-pencil text-white"></i>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Employee')): ?>
                                                        <div class="action-btn me-2">
                                                            <?php echo Form::open([
                                                                'method' => 'DELETE',
                                                                'route' => ['employee.destroy', $employee->id],
                                                                'id' => 'delete-form-' . $employee->id,
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
                                                <?php else: ?>
                                                    <i class="ti ti-lock"></i>
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/employee/index.blade.php ENDPATH**/ ?>