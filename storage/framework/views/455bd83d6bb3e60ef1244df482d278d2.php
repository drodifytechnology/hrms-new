


<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Interns')); ?>

<?php $__env->stopSection(); ?>
<?php
    $setting = App\Models\Utility::settings();
    $icons = \App\Models\Utility::get_file('uploads/job/icons/');
?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>


<!-- <?php if(session('success')): ?><div class="alert alert-success"><?php echo e(session('success')); ?></div><?php endif; ?> -->

    
        <div class="row">
            <div class="col-md-12">
                <div class="card em-card">
                    <div class="card-header">
                        <h5>Assign task</h5>
                    </div>
                    <div class="card-body">
                       
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th>Intern</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $internships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $internship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                          <tr>
                            <td>
                                <strong><?php echo e($internship->intern->name); ?></strong> - <?php echo e($internship->department); ?>

                            </td>
                            <td>
                                <button type="button" onclick="assignTask('<?php echo e($internship->id); ?>','<?php echo e($internship->intern->name); ?> - <?php echo e($internship->department); ?>')" class="btn btn-primary btn-sm "  >Assign Task</button>
                                <!-- <button type="submit" class="btn btn-primary btn-sm">Assign Task</button> -->
                            </td>
                          </tr>
                        </form>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                      
                </div>
            </div>
        </div>
       <div class="modal fade show-modal bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?php echo e(route('mentor.tasks.assign')); ?>" class="mb-3">
                <div class="modal-body">
                        
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="internship_id" id="internship_id" class="form-control" value="">
                            
                            <div class="row" >
                                <div class="form-group col-md-6">
                                    <label>Title</label>
                                    <input type="text" name="title" placeholder="Task title" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Description</label>
                                    <textarea name="description" placeholder="Task description" class="form-control"></textarea>
                                </div>   
                               <div class="form-group col-md-6">
                                    <label>Deadline</label>
                                    <input type="date" name="deadline" class="form-control">
                                </div>
                               <div class="form-group col-md-6">
                                    <label>Priority</label>
                                    <input type="number" name="priority" class="form-control">
                                </div>
                               <div class="form-group col-md-6">
                                    <label>Attachment</label>
                                    <input type="file" name="attachment" class="form-control">
                                </div>
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Asign Task</button>
                    </div>
                    </form>
                </div>
            </div>
       </div>

        
        <?php $__env->stopSection(); ?>
        <?php $__env->startPush('script-page'); ?>

        <script>
            function assignTask(inter_id , text){
                $(".show-modal").modal('show') 
                $('#exampleModalLabel').text(text)
                $('#internship_id').val(inter_id)

            }
        </script>
        <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\hrms\resources\views/mentor/intern-list.blade.php ENDPATH**/ ?>