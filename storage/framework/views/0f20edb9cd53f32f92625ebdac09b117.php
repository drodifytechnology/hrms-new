<?php
    // $profile = asset(Storage::url('uploads/avatar/'));
    $profile = \App\Models\Utility::get_file('uploads/avatar/');

?>

<?php $__env->startPush('script-page'); ?>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Profile')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> <?php echo e(__('Profile')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo e(__('Profile')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Personal Info')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-2"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Change Password')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
<?php if($userDetail->type =='super admin' ||$userDetail->type =='company' || $userDetail->type =='hr'): ?>
                                    <a href="#useradd-3"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Two Factor Authentication')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
<?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div id="useradd-1">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><?php echo e(__('Personal Information')); ?></h5>
                                <small> <?php echo e(__('Details about your personal information')); ?></small>
                            </div>
                            <div class="card-body">


                                <?php echo e(Form::model($userDetail, ['route' => ['update.account'], 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'needs-validation', 'novalidate'])); ?>

                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label
                                                class="col-form-label text-dark"><?php echo e(__('Name')); ?></label><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                                            <input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                                                type="text" id="name" placeholder="<?php echo e(__('Enter Your Name')); ?>"
                                                value="<?php echo e($userDetail->name); ?>" required autocomplete="name">
                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback text-danger text-xs"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email"
                                                class="col-form-label text-dark"><?php echo e(__('Email')); ?></label><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                                            <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                                type="text" id="email"
                                                placeholder="<?php echo e(__('Enter Your Email Address')); ?>"
                                                value="<?php echo e($userDetail->email); ?>" required autocomplete="email">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback text-danger text-xs"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('profile', __('Avatar'), ['class' => 'col-form-label'])); ?>

                                            <div class="choose-files ">
                                                <label for="profile">
                                                    <div class=" bg-primary profile "> <i
                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                    </div>
                                                    <input type="file" class="form-control file" name="profile"
                                                        id="profile"
                                                        onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                    <img id="blah"
                                                        class="img-fluid rounded border-2 border border-primary"
                                                        width="120px" style="height: 120px"
                                                        src="<?php echo e(!empty($userDetail->avatar) ? $profile . $userDetail->avatar : $profile . 'avatar.png'); ?>" />
                                                </label>
                                            </div>
                                            <span
                                                class="text-xs text-muted"><?php echo e(__('Please upload a valid image file. Size of image should not be more than 2MB.')); ?></span>
                                            <?php $__errorArgs = ['profile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback text-danger text-xs"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer col-lg-12">
                                        <input type="submit" value="<?php echo e(__('Save Changes')); ?>"
                                            class="btn btn-print-invoice  btn-primary m-r-10">
                                    </div>
                                </div>
                                </form>

                            </div>

                        </div>
                    </div>

                    <div id="useradd-2">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><?php echo e(__('Change Password')); ?></h5>
                                <small> <?php echo e(__('Details about your account password change')); ?></small>
                            </div>
                            <div class="card-body">
                                <?php echo e(Form::model($userDetail, ['route' => ['update.password', $userDetail->id], 'method' => 'post', 'class' => 'needs-validation', 'novalidate'])); ?>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('current_password', __('Current Password'), ['class' => 'col-form-label text-dark'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                                            <?php echo e(Form::password('current_password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Current Password')])); ?>

                                            <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-current_password" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('new_password', __('New Password'), ['class' => 'col-form-label text-dark'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                                            <?php echo e(Form::password('new_password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter New Password')])); ?>

                                            <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-new_password" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('confirm_password', __('Re-type New Password'), ['class' => 'col-form-label text-dark'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                                            <?php echo e(Form::password('confirm_password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Re-type New Password')])); ?>

                                            <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-confirm_password" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer pr-0">
                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn  btn-primary'])); ?>

                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <?php if($userDetail->type =='super admin' || $userDetail->type =='company' || $userDetail->type =='hr'): ?>

                    <div id="useradd-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><?php echo e(__('Two Factor Authentication')); ?></h5>
                            </div>
                            <div class="card-body">
                                <p><?php echo e(__('Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.')); ?>

                                </p>
                                <?php if($userDetail->google2fa_secret == null): ?>
                                    <div class=" ">
                                        <form class="form-horizontal" method="POST"
                                            action="<?php echo e(route('google2fa.index')); ?>">
                                            <?php echo csrf_field(); ?> <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn btn-primary">
                                                    <?php echo e(__('Generate Secret Key to Enable 2FA')); ?>

                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                <?php elseif($userDetail->google2fa_secret != null && $userDetail->google2fa_enable == 0): ?>
                                    <?php
                                        $svg_base64 = base64_encode($userDetail->google2fa_url);

                                        // Create the data URI
                                        $data_uri = 'data:image/svg+xml;base64,' . $svg_base64;

                                    ?>

                                    1. <?php echo e(__('Install "Google Authentication App" on your')); ?> <a
                                        href="https://apps.apple.com/us/app/google-authenticator/id388497605"
                                        target="_black"> <?php echo e(__('IOS')); ?></a> <?php echo e(__('or')); ?> <a
                                        href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2"
                                        target="_black"><?php echo e(__('Android phone.')); ?></a><br />
                                    2. <?php echo e(__('Open the Google Authentication App and scan the below QR code.')); ?><br />
                                    <div class="text-start">
                                        <img src="<?php echo e($data_uri); ?>" alt="QR Code" />
                                    </div>
                                    <?php echo e(__('Alternatively, you can use the code:')); ?>

                                    <code><?php echo e($userDetail->google2fa_secret); ?></code>. <br>
                                    3.
                                    <?php echo e(__('Enter the 6-digit Google Authentication code from the app')); ?><br /><br />
                                    <form class="form-horizontal" method="POST"
                                        action="<?php echo e(route('google2fa.enable')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="secret"
                                                class="col-form-label"><?php echo e(__('Authenticator Code')); ?></label>
                                            <input id="secret" type="password" name="secret" class="form-control"
                                                placeholder="<?php echo e(__('Enter the code from your authenticator app')); ?>"
                                                required>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary mt-3">
                                                    <?php echo e(__('Enable 2FA')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                <?php else: ?>
                                    <div class="alert alert-success">
                                        <?php echo e(__('2FA is currently')); ?> <strong><?php echo e(__('Enabled')); ?></strong>
                                        <?php echo e(__('on your account.')); ?>

                                    </div>
                                    <p><?php echo e(__('If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.')); ?>

                                    </p>
                                    <form class="form-horizontal" method="POST"
                                        action="<?php echo e(route('google2fa.disable')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="password"
                                                class="col-form-label"><?php echo e(__('Current Password')); ?></label>
                                            <input id="password" type="password" name="password" class="form-control"
                                                placeholder="<?php echo e(__('Enter Your Current Password')); ?>" required>
                                        </div>
                                        <div class=" text-center">
                                            <button type="submit" class="btn btn-primary mt-3">
                                                <?php echo e(__('Disable 2FA')); ?>

                                            </button>
                                        </div>

                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/user/profile.blade.php ENDPATH**/ ?>