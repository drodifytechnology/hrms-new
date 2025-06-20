    

    <?php $__env->startSection('page-title'); ?>
        <?php echo e(__('Manage Award')); ?>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(__('Award')); ?></li>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('action-button'); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Award')): ?>
            <a href="#" data-url="<?php echo e(route('award.create')); ?>" data-ajax-popup="true"
                data-title="<?php echo e(__('Create New Award')); ?>" data-size="lg" data-bs-toggle="tooltip" title=""
                class="btn btn-sm btn-primary" data-bs-original-title="<?php echo e(__('Create')); ?>">
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
                                        <?php if (\Illuminate\Support\Facades\Blade::check('role', 'company')): ?>
                                            <th><?php echo e(__('Employee')); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo e(__('Award Type')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Gift')); ?></th>
                                        <th><?php echo e(__('Description')); ?></th>
                                        <?php if(Gate::check('Edit Award') || Gate::check('Delete Award')): ?>
                                            <th width="200px"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $awards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'company')): ?>
                                                <td><?php echo e(!empty($award->employee_id) ? $award->employee->name : ''); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo e(!empty($award->award_type) ? $award->awardType->name : ''); ?></td>
                                            <td><?php echo e(\Auth::user()->dateFormat($award->date)); ?></td>
                                            <td><?php echo e($award->gift); ?></td>
                                            <td><?php echo e($award->description); ?></td>
                                            <td class="Action">
                                                <?php if(Gate::check('Edit Award') || Gate::check('Delete Award')): ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Award')): ?>
                                                                <div class="action-btn me-2">
                                                                    <a href="#"
                                                                        class="mx-3 btn btn-sm bg-info align-items-center"
                                                                        data-size="lg"
                                                                        data-url="<?php echo e(URL::to('award/' . $award->id . '/edit')); ?>"
                                                                        data-ajax-popup="true" data-size="md"
                                                                        data-bs-toggle="tooltip" title=""
                                                                        data-title="<?php echo e(__('Edit Award')); ?>"
                                                                        data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                                        <span class="text-white"><i class="ti ti-pencil"></i></span>
                                                                    </a>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Award')): ?>
                                                                <div class="action-btn">
                                                                    <?php echo Form::open([
                                                                        'method' => 'DELETE',
                                                                        'route' => ['award.destroy', $award->id],
                                                                        'id' => 'delete-form-' . $award->id,
                                                                    ]); ?>

                                                                    <a href="#"
                                                                    data-bs-trigger="hover"
                                                                        class="btn btn-sm bg-danger align-items-center bs-pass-para"
                                                                        data-bs-toggle="tooltip" title=""
                                                                        data-bs-original-title="Delete" aria-label="Delete"><span class="text-white"><i
                                                                            class="ti ti-trash"></i></span></a>
                                                                    </form>
                                                                </div>
                                                            <?php endif; ?>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/award/index.blade.php ENDPATH**/ ?>