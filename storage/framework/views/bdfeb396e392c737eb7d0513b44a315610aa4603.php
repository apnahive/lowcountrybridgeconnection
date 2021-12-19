<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Series Enrollment</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">#</div> -->
                        <div class="col-md-4 wcol-md-4">Series Name</div>
                        <div class="col-md-4 wcol-md-4">Series Starts From</div>
                        <div class="col-md-3 wcol-md-3" style="text-align: center;">                             
                            <div class="col-md-6">Status</div> 
                            <div class="col-md-6">Action</div>
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serieskey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                    <div class="row" style="margin-top: 15px;display: flex;">                        
                            <!-- <div class="col-md-2 wcol-md-2"><?php echo e($value->id); ?></div> -->
                            <div class="col-md-4 wcol-md-4"><?php echo e($value->name); ?></div>
                            <div class="col-md-4 wcol-md-4"><?php echo e(date('m-d-Y', strtotime($value->start_date))); ?></div>
                            <div class="col-md-3 wcol-md-3" style="text-align: center">
                                <div class="col-md-6">
                                    <?php if($value->subscription_status): ?>
                                    <p >
                                        <?php if($value->end_date < $now->format("Y-m-d")): ?>
                                         Ended
                                        <?php else: ?>
                                         Upcoming
                                        <?php endif; ?>
                                    </p>
                                    <?php else: ?>
                                    <p>Cancelled</p>
                                    <?php endif; ?>
                                </div>     
                                <div class="col-md-6">
                                    <?php if($value->subscription_status): ?>
                                    <button type="button" class="btn btn-priamry"  data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>">Cancel</button>

                                    <form id="<?php echo e($value->id); ?>" action="<?php echo route('seriesenrolls', $value->id); ?>" method="POST" style="display: none;">
                                    <input type="hidden" name="_method" value="GET">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    </form>
                                    <div class="modal fade" id="confirm<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="text-align: left;">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cancel Enrollment</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            You are going to cancel enrollment. Are you sure?<br> note: Teacher can re-add you if you cancel
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keep enrollment</button>
                                            <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! cancel it</button></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <?php else: ?>        
                                    <a href="">
                                        <!-- <button type="button" class="btn btn-priamry"></button> -->
                                    </a>
                                    <?php endif; ?>  
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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>