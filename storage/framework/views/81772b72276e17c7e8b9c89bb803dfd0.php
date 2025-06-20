<ul class="nav nav-pills nav-fill information-tab hrm_setup_tab" id="pills-tab" role="tablist">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Branch')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('branch.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(Request::route()->getName() == 'branch.index' ? 'active' : ''); ?>"
                    id="branch-setting-tab" data-bs-toggle="pill" data-bs-target="#branch-setting"
                    type="button"><?php echo e(__('Branch')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Department')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('department.index')); ?>" class="list-group-item list-group-item-action border-0 ">
                <button class="nav-link <?php echo e(Request::route()->getName() == 'department.index' ? 'active' : ''); ?>"
                    id="department-setting-tab" data-bs-toggle="pill" data-bs-target="#department-setting"
                    type="button"><?php echo e(__('Department')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Designation')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('designation.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('designation*') ? 'active' : ''); ?>" id="designation-setting-tab"
                    data-bs-toggle="pill" data-bs-target="#designation-setting"
                    type="button"><?php echo e(__('Designation')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Leave Type')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('leavetype.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(Request::route()->getName() == 'leavetype.index' ? 'active' : ''); ?>"
                    id="leave-setting-tab" data-bs-toggle="pill" data-bs-target="#leave-setting"
                    type="button"><?php echo e(__('Leave Type')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Document Type')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('document.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(Request::route()->getName() == 'document.index' ? 'active' : ''); ?>"
                    id="document-setting-tab" data-bs-toggle="pill" data-bs-target="#document-setting"
                    type="button"><?php echo e(__('Document Type')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Payslip Type')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('paysliptype.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('paysliptype*') ? 'active' : ''); ?> " id="payslip-setting-tab"
                    data-bs-toggle="pill" data-bs-target="#payslip-setting"
                    type="button"><?php echo e(__('Payslip Type')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Allowance Option')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('allowanceoption.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('allowanceoption*') ? 'active' : ''); ?> "
                    id="allowance-setting-tab" data-bs-toggle="pill" data-bs-target="#allowance-setting"
                    type="button"><?php echo e(__('Allowance Option')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Loan Option')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('loanoption.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('loanoption*') ? 'active' : ''); ?> " id="loan-setting-tab"
                    data-bs-toggle="pill" data-bs-target="#loan-setting" type="button"><?php echo e(__('Loan Option')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Deduction Option')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('deductionoption.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('deductionoption*') ? 'active' : ''); ?> "
                    id="deduction-setting-tab" data-bs-toggle="pill" data-bs-target="#deduction-setting"
                    type="button"><?php echo e(__('Deduction Option')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Goal Type')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('goaltype.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('goaltype*') ? 'active' : ''); ?> " id="goal-setting-tab"
                    data-bs-toggle="pill" data-bs-target="#goal-setting" type="button"><?php echo e(__('Goal Type')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Training Type')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('trainingtype.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('trainingtype*') ? 'active' : ''); ?> " id="training-setting-tab"
                    data-bs-toggle="pill" data-bs-target="#training-setting"
                    type="button"><?php echo e(__('Training Type')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Award Type')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('awardtype.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('awardtype*') ? 'active' : ''); ?> " id="award-setting-tab"
                    data-bs-toggle="pill" data-bs-target="#award-setting" type="button"><?php echo e(__('Award Type')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Termination Type')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('terminationtype.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('terminationtype*') ? 'active' : ''); ?> "
                    id="termination-setting-tab" data-bs-toggle="pill" data-bs-target="#termination-setting"
                    type="button"><?php echo e(__('Termination Type')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Job Category')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('job-category.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('job-category*') ? 'active' : ''); ?> "
                    id="jobcategory-setting-tab" data-bs-toggle="pill" data-bs-target="#jobcategory-setting"
                    type="button"><?php echo e(__('Job Category')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Job Stage')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('job-stage.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('job-stage*') ? 'active' : ''); ?> " id="jobstage-setting-tab"
                    data-bs-toggle="pill" data-bs-target="#jobstage-setting"
                    type="button"><?php echo e(__('Job Stage')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Performance Type')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('performanceType.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('performanceType*') ? 'active' : ''); ?> "
                    id="performance-setting-tab" data-bs-toggle="pill" data-bs-target="#performance-setting"
                    type="button"><?php echo e(__('Performance Type')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Competencies')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('competencies.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('competencies*') ? 'active' : ''); ?> "
                    id="competencies-setting-tab" data-bs-toggle="pill" data-bs-target="#competencies-setting"
                    type="button"><?php echo e(__('Competencies')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Expense Type')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('expensetype.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('expensetype*') ? 'active' : ''); ?> "
                    id="expensetype-setting-tab" data-bs-toggle="pill" data-bs-target="#expensetype-setting"
                    type="button"><?php echo e(__('Expense Type')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Income Type')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('incometype.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('incometype*') ? 'active' : ''); ?> " id="incometype-setting-tab"
                    data-bs-toggle="pill" data-bs-target="#incometype-setting"
                    type="button"><?php echo e(__('Income Type')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Payment Type')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('paymenttype.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('paymenttype*') ? 'active' : ''); ?> "
                    id="paymenttype-setting-tab" data-bs-toggle="pill" data-bs-target="#paymenttype-setting"
                    type="button"><?php echo e(__('Payment Type')); ?></button>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Contract Type')): ?>
        <li class="nav-item" role="presentation">
            <a href="<?php echo e(route('contract_type.index')); ?>" class="list-group-item list-group-item-action border-0">
                <button class="nav-link <?php echo e(request()->is('contract_type*') ? 'active' : ''); ?> "
                    id="contract_type-setting-tab" data-bs-toggle="pill" data-bs-target="#contract_type-setting"
                    type="button"><?php echo e(__('Contract Type')); ?></button>
            </a>
        </li>
    <?php endif; ?>
</ul>
<?php /**PATH C:\laragon\www\hrms\resources\views/layouts/hrm_setup.blade.php ENDPATH**/ ?>