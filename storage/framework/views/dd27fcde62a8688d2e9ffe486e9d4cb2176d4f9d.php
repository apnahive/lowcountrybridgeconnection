<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">                       
            <div class="col-md-12">
                <a href="<?php echo e(route('playerunits.index')); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add Student to Class</button></a>
            </div>
            <div class="panel panel-default" style="margin-top: 60px;">
                <div class="panel-heading">Available Classes</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2">#</div> -->
                        <div class="col-md-3 wcol-md-3">Class Name</div>
                        <div class="col-md-4 wcol-md-4">Details</div>
                        <div class="col-md-5 wcol-md-5" style="text-align: center;">                            
                            <div class="col-md-6">View</div>                             
                            <div class="col-md-6">Waiting</div> 
                            <!-- <div class="col-md-4">Cancel</div>  -->
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php if($value->class_status): ?>
                            <div class="row" style="margin-top: 15px;display: flex;">
                                <!-- <div class="col-md-2"><?php echo e($value->id); ?></div> -->
                                <div class="col-md-3 wcol-md-3"><?php echo e($value->class_name); ?></div>
                                <div class="col-md-4 wcol-md-4">
                                    Starts From: <?php echo e(date('m-d-Y', strtotime($value->class_from))); ?><br>
                                    Series: <?php echo e($value->series_name); ?>

                                </div>
                                <div class="col-md-5 wcol-md-5" style="text-align: center">                           
                                    <div class="col-md-6"><a href="<?php echo e(route('unitclass_subscription.show', $value->id)); ?>"><button type="button" class="btn btn-priamry">Enrollment</button></a></div> 
                                    <div class="col-md-6 button-top">
                                        <a href="<?php echo e(route('unitclasswaiting.show', $value->id)); ?>"><button type="button" class="btn btn-priamry">Waitlist</button></a>
                                       
                                    </div>

                                    <!-- <div class="col-md-4 button-top"><button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>">Cancel</button></div> -->

                                    


                                    <form id="<?php echo e($value->id); ?>" action="/unitclass_subscriptionss/delete/<?php echo e($value->id); ?>" method="DELETE" style="display: none;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    </form>
                                    <div class="modal fade" id="confirm<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="text-align: left;">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cancel Class</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            You are going to Cancel Class. Are you sure? you won't be able to revert these changes!
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Class</button>
                                            <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Cancel it</button></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mobline">
                        <?php endif; ?>                                            
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.unitadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>