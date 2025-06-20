

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Internship')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Internship')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <!-- <a href="#" data-url="<?php echo e(route('employee.file.import')); ?>" data-ajax-popup="true"
        data-title="<?php echo e(__('Import  Employee CSV File')); ?>" data-bs-toggle="tooltip" title=""
        class="btn btn-sm btn-primary me-1" data-bs-original-title="<?php echo e(__('Import')); ?>">
        <i class="ti ti-file"></i>
    </a>

    <a href="<?php echo e(route('employee.export')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-original-title="<?php echo e(__('Export')); ?>" class="btn btn-sm btn-primary me-1">
        <i class="ti ti-file-export"></i>
    </a> -->

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Employee')): ?>
        <a href="<?php echo e(route('internships.create')); ?>" data-title="<?php echo e(__('Create New Employee')); ?>" data-bs-toggle="tooltip"
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
                                      
                                        <th>Intern ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Start</th>
                                        <th>Mentor</th>
                                       <?php if(Gate::check('Edit Employee') || Gate::check('Delete Employee')): ?>
                                        <th width="200px"><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                   <?php $__currentLoopData = $internships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $internship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Employee')): ?>
                                                <a class="btn btn-outline-primary"
                                                    href="<?php echo e(route('internships.show', \Illuminate\Support\Facades\Crypt::encrypt($internship->id))); ?>"><?php echo e($internship->internship_id); ?></a>
                                            <?php else: ?>
                                                <a href="#"
                                                    class="btn btn-outline-primary"><?php echo e($employee->internship_id); ?></a>
                                            <?php endif; ?>
                                        </td>
                                    
                                        <td><?php echo e($internship->intern->name); ?></td>
                                        <td><?php echo e($internship->intern->email); ?></td>
                                        <td><?php echo $__env->make('components.status-badge', ['status' => $internship->status], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></td>
                                        <td><?php echo e($internship->start_date); ?></td>
                                        <td><?php echo e($internship->primaryMentor->name); ?></td>
                                       
                                        <?php if(Gate::check('Edit Employee') || Gate::check('Delete Employee')): ?>
                                            <td class="Action">
                                                
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Employee')): ?>
                                                        <div class="action-btn me-2">
                                                            <a href="<?php echo e(route('internships.edit', \Illuminate\Support\Facades\Crypt::encrypt($internship->id))); ?>"
                                                                class="mx-3 btn btn-sm bg-info align-items-center"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                                <i class="ti ti-pencil text-white"></i>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Employee')): ?>
                                                        <div class="action-btn meff-2">
                                                            <?php echo Form::open([
                                                                'method' => 'DELETE',
                                                                'route' => ['internships.destroy', $internship->id],
                                                                'id' => 'delete-form-' . $internship->id,
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
                                        <?php endif; ?>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/internships/index.blade.php ENDPATH**/ ?>