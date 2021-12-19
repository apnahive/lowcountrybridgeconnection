<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="<?php echo e(route('superteacher.create')); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a New Teacher</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Teachers</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-1 wcol-md-1">#</div> -->
                        <div class="col-md-4 wcol-md-4">Teacher Name</div>
                        <div class="col-md-4 wcol-md-4">Email</div>
                        <!-- <div class="col-md-1 wcol-md-1"></div> -->
                        <div class="col-md-3 wcol-md-3" style="text-align: center;">
                            <div class="col-md-6">Edit</div> 
                            <div class="col-md-6">Delete</div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacherkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        <!-- <div class="col-md-1 wcol-md-1"><?php echo e($value->id); ?></div> -->
                        <div class="col-md-4 wcol-md-4"><?php echo e($value->name); ?></div>
                        <div class="col-md-4 wcol-md-4" style="word-wrap: break-word;"><?php echo e($value->email); ?></div>
                        
                        <div class="col-md-3 wcol-md-3" style="text-align: center">
                            <div class="col-md-6"><a href="<?php echo e(route('superteacher.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Edit</button></a></div> 
                            <div class="col-md-6 button-top" style="text-align: center;"> <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>">Delete</button></div>
                            <form id="<?php echo e($value->id); ?>" action="/superteacher/delete/<?php echo e($value->id); ?>" method="DELETE" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            </form>
                            <div class="modal fade" id="confirm<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="text-align: left;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Teacher</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                  <?php if($value->active == 1): ?>
                                  <div class="modal-body">
                                    You are going to delete Teacher. Are you sure? you won't be able to revert these changes!
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Teacher</button>
                                    <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                  </div>
                                  <?php else: ?>
                                  <div class="modal-body">
                                    This teacher has classes & series. Please re-asign or delete them to delete this teacher.
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                  </div>
                                  <?php endif; ?>

                                </div>
                              </div>
                            </div>
                            
                        </div>
                    </div>
                    <hr class="mobline">                                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                </div>
            </div>
        </div>
    </div>    
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.superadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>