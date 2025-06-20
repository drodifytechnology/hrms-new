

<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Create Internship')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a>
</li>
<li class="breadcrumb-item"><a href="<?php echo e(url('internships')); ?>"><?php echo e(__('Internship')); ?></a>
</li>
<li class="breadcrumb-item"><?php echo e(__('Create Internship')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .cursor-pointer {
            cursor: pointer;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="">
        <div class="">
            
            <?php echo e(Form::open(['route' => ['internships.store'], 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'needs-validation', 'novalidate'])); ?>

                <div class="row">
                    <div class="col-md-6 ">
                        <div class="card em-card">
                            <div class="card-header">
                                <h5><?php echo e(__('Intern Detail')); ?></h5>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                       <label for="intern_id">Intern</label>
                                        <select name="intern_id" class="form-control" required>
                                            <?php $__currentLoopData = $interns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intern): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($intern->id); ?>"><?php echo e($intern->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('intern_id')): ?>
                                            <div class="error"><?php echo e($errors->first('intern_id')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                             <label for="primary_mentor_id">Primary Mentor</label>
                                          <select name="primary_mentor_id" class="form-control" required>
                                                <?php $__currentLoopData = $interns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intern): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($intern->id); ?>"><?php echo e($intern->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                           <?php if($errors->has('primary_mentor_id')): ?>
                                            <div class="error"><?php echo e($errors->first('primary_mentor_id')); ?></div>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                           <label for="secondary_mentor_id">Secondary Mentor (optional)</label>
                                            <select name="secondary_mentor_id" class="form-control">
                                                <option value="">-- None --</option>
                                                <?php $__currentLoopData = $interns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intern): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($intern->id); ?>"><?php echo e($intern->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('secondary_mentor_id')): ?>
                                                    <div class="error"><?php echo e($errors->first('secondary_mentor_id')); ?></div>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Internship Type</label>
                                        <select name="internship_type" class="form-control" required>
                                            <option value="3-months">3-months</option>
                                            <option value="6-months">6-months</option>
                                            <option value="1-year">1-year</option>
                                        </select>
                                        <?php if($errors->has('internship_type')): ?>
                                                <div class="error"><?php echo e($errors->first('internship_type')); ?></div>
                                            <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mb-3 form-group col-md-6">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" class="form-control" min="<?php echo e(date('Y-m-d')); ?>" required>
                                      <?php if(@$errors->has('start_date')): ?>
                                            <div class="error"><?php echo e(@$errors->first('start_date')); ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3 form-group col-md-6">
                                    <label>End Date</label>
                                    <input type="date" name="end_date" class="form-control" min="<?php echo e(date('Y-m-d')); ?>" required>
                                      <?php if(@$errors->has('end_date')): ?>
                                            <div class="error"><?php echo e(@$errors->first('end_date')); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-3 form-group col-md-6">
                                    <label>Flexible Duration</label>
                                    <input type="checkbox" name="flexible_duration" value="1">
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <?php if(\Auth::user()->type != 'employee'): ?>
                        <div class="col-md-6 ">
                            <div class="card em-card">
                                <div class="card-header">
                                    <h5><?php echo e(__('Payment Detail')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group ">
                                            <label>Stipend Type</label><br>
                                            <input type="radio" name="stipend_type" value="Paid" required /> Paid
                                            <input type="radio" name="stipend_type" value="Unpaid" /> Unpaid
                                            <input type="radio" name="stipend_type" value="Performance-based" /> Performance-based
                                            <?php if($errors->has('stipend_type')): ?>
                                                    <div class="error"><?php echo e($errors->first('stipend_type')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                         
                                         <div class="form-group col-md-6">
                                            <label>Stipend Amount</label>
                                            <input type="number" name="stipend_amount" class="form-control" step="0.01" />
                                            <?php if($errors->has('stipend_amount')): ?>
                                                    <div class="error"><?php echo e($errors->first('stipend_amount')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Payment Frequency</label>
                                            <select name="payment_frequency" class="form-control">
                                                <option value="Monthly">Monthly</option>
                                                <option value="Bi-weekly">Bi-weekly</option>
                                            </select>
                                            <?php if($errors->has('payment_frequency')): ?>
                                                    <div class="error"><?php echo e($errors->first('payment_frequency')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Bank Details</label>
                                            <input type="text" name="bank_account_no" class="form-control" placeholder="Account Number">
                                            <input type="text" name="bank_ifsc" class="form-control mt-2" placeholder="IFSC Code">
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <?php echo e(Form::label('branch_id', __('Select Branch'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                            <?php echo e(Form::select('branch', $branches, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('select Branch')])); ?>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <?php echo e(Form::label('department_id', __('Select Department'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                            <?php echo e(Form::select('department', $departments, null, ['class' => 'form-control', 'id' => 'department_id', 'required' => 'required', 'placeholder' => __('Select Department')])); ?>

                                        </div>
                                       </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if(\Auth::user()->type != 'employee'): ?>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="card em-card">
                                <div class="card-header">
                                    <h5><?php echo e(__('Document')); ?></h5>
                                </div>
                                <div class="card-body">
                                  
                                    
                                        <div class="row">
                                            <div class="form-group col-12 d-flex">
                                                <div class="mb-3 form-group col-md-6">
                                                        <label>Document Type</label>
                                                        <select name="type" required class="form-control" >
                                                            <option value="Aadhar">Aadhar</option>
                                                            <option value="Resume">Resume</option>
                                                            <option value="Certificate">Certificate</option>
                                                            <option value="Photo">Photo</option>
                                                            <option value="Bank Passbook">Bank Passbook</option>
                                                        </select>

                                                        <div class="choose-files ">
                                                            <label>Document</label>
                                                            
                                                            <label for="doc">
                                                            <div class=" bg-primary document cursor-pointer"> <i
                                                                    class="ti ti-upload "></i><?php echo e(__('Choose file here')); ?>

                                                            </div>
                                                            <input type="file" name="document"
                                                                class="form-control file <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                        </label>
                                                        </div>
                                                        <?php if(@$errors->has('document')): ?>
                                                                <div class="error"><?php echo e(@$errors->first('document  ')); ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                             
                                              </div>
                                        </div>
                              
                                </div>
                            </div>
                        </div>
                     
                    </div>
             
                <?php endif; ?>

                <?php if(\Auth::user()->type != 'employee'): ?>
                    <div class="float-end">
                        <a class="btn btn-secondary btn-submit"
                            href="<?php echo e(route('internships.index')); ?>"><?php echo e(__('Cancel')); ?></a>
                        <button class="btn btn-primary btn-submit ms-1" type="submit"
                            id="submit"><?php echo e(__('Save')); ?></button>
                    </div>
                <?php endif; ?>
                <div class="col-12">
                    <?php echo Form::close(); ?>

                </div>
             </div>
        </div>
                    <?php $__env->stopSection(); ?>
                    <?php $__env->startPush('script-page'); ?>
                        <script>
                            $('input[type="file"]').change(function (e) {
                                var file = e.target.files[0].name;
                                var file_name = $(this).attr('data-filename');
                                $('.' + file_name).append(file);
                            });

                        </script>
                        <script type="text/javascript">
                            $(document).on('change', '#branch_id', function () {
                                var branch_id = $(this).val();
                                getDepartment(branch_id);
                            });

                            function getDepartment(branch_id) {
                                var data = {
                                    "branch_id": branch_id,
                                    "_token": "<?php echo e(csrf_token()); ?>",
                                }

                                $.ajax({
                                    url: '<?php echo e(route('monthly.getdepartment')); ?>',
                                    method: 'POST',
                                    data: data,
                                    success: function (data) {
                                        $('#department_id').empty();
                                        $('#department_id').append(
                                            '<option value="" disabled><?php echo e(__('Select Department')); ?></option>'
                                            );

                                        $.each(data, function (key, value) {
                                            $('#department_id').append('<option value="' + key +
                                                '">' + value +
                                                '</option>');
                                        });
                                        $('#department_id').val('');
                                    }
                                });
                            }

                        </script>
                    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/internships/create.blade.php ENDPATH**/ ?>