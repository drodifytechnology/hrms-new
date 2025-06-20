<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>


<?php
    $admin_payment_setting = App\Models\Utility::getAdminPaymentSetting();
?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xxl-12">
            <div class="row row-gap mb-4">
                <div class="col-xxl-12 col-12">
                    <div class="row d-flex dashboard-wrp">
                        <div class="col-md-4 col-sm-6 col-12 d-flex flex-wrap">
                            <div class="dashboard-project-card">
                                <div class="card-inner  d-flex justify-content-between">
                                    <div class="card-content d-flex gap-2">
                                        <div class="badge theme-avtar bg-primary">
                                            <i class="ti ti-users"></i>
                                        </div>
                                        <div class="card-content-left">
                                            <p class="text-muted text-sm mb-1"><?php echo e(__('Total Users')); ?> :
                                                <?php echo e($user->total_user); ?></p>
                                            <h6 class="mb-0"><?php echo e(__('Paid Users')); ?></h6>
                                        </div>
                                    </div>
                                    <h4 class="mb-0 text-end"><?php echo e($user['total_paid_user']); ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 d-flex flex-wrap">
                            <div class="dashboard-project-card">
                                <div class="card-inner  d-flex justify-content-between">
                                    <div class="card-content d-flex gap-2">
                                        <div class="badge theme-avtar bg-info">
                                            <i class="ti ti-shopping-cart"></i>
                                        </div>
                                        <div class="card-content-left">
                                            <p class="text-muted text-sm mb-1">
                                                <?php echo e(__('Total Orders')); ?>:<?php echo e($user->total_orders); ?></p>
                                            <h6 class="mb-0"><?php echo e(__('Total Order Amount')); ?></h6>
                                        </div>
                                    </div>
                                    <h4 class="mb-0 text-end">
                                        <?php echo e((!empty($admin_payment_setting['currency_symbol']) ? $admin_payment_setting['currency_symbol'] : '$') . $user['total_orders_price']); ?>

                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 d-flex flex-wrap">
                            <div class="dashboard-project-card">
                                <div class="card-inner  d-flex justify-content-between">
                                    <div class="card-content d-flex gap-2">
                                        <div class="badge theme-avtar bg-warning">
                                            <i class="ti ti-trophy"></i>
                                        </div>
                                        <div class="card-content-left">
                                        <p class="text-muted text-sm mb-1"><?php echo e(__('Total Plan')); ?>:
                                            <?php echo e($user['total_plan']); ?></p>
                                        <h6 class="mb-0"><?php echo e(__('Most Purchase Plan')); ?></h6>
                                        </div>
                                    </div>
                                    <h4 class="mb-0 text-end"><?php echo e($user['most_purchese_plan']); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Recent Order')); ?></h5>
                </div>
                <div class="card-body">
                    <div id="chart-sales" height="200" class="p-3"></canvas>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('script-page'); ?>
        <script src="<?php echo e(asset('assets/js/plugins/apexcharts.min.js')); ?>"></script>
        <script>
            (function() {
                var chartBarOptions = {
                    series: [{
                        name: '<?php echo e(__('Order')); ?>',
                        data: <?php echo json_encode($chartData['data']); ?>,

                    }, ],

                    chart: {
                        height: 300,
                        type: 'area',
                        // type: 'line',
                        dropShadow: {
                            enabled: true,
                            color: '#000',
                            top: 18,
                            left: 7,
                            blur: 10,
                            opacity: 0.2
                        },
                        toolbar: {
                            show: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 2,
                        curve: 'smooth'
                    },
                    title: {
                        text: '',
                        align: 'left'
                    },
                    xaxis: {
                        categories: <?php echo json_encode($chartData['label']); ?>,
                        title: {
                            text: 'Date'
                        }
                    },
                    colors: ['#6fd944', '#6fd944'],

                    grid: {
                        strokeDashArray: 4,
                    },
                    legend: {
                        show: false,
                    },
                    // markers: {
                    //     size: 4,
                    //     colors: ['#ffa21d', '#FF3A6E'],
                    //     opacity: 0.9,
                    //     strokeWidth: 2,
                    //     hover: {
                    //         size: 7,
                    //     }
                    // },
                    yaxis: {
                        title: {
                            text: 'Orders'
                        },

                    }

                };
                var arChart = new ApexCharts(document.querySelector("#chart-sales"), chartBarOptions);
                arChart.render();
            })();
        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/dashboard/super_admin.blade.php ENDPATH**/ ?>