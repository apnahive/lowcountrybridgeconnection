<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <a href="<?php echo e(route('unitclass.show', $id)); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">View Class</button></a> 
           <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Players</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">#</div> -->
                        <div class="col-md-5 wcol-md-5">Player Name</div>
                        <div class="col-md-2 wcol-md-2"></div>
                        <div class="col-md-4 wcol-md-4" style="text-align: center;">                            
                            <div class="col-md-6">Status</div> 
                            <div class="col-md-6">Cancel</div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $class_sub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($value->classroom_id == $classid): ?>
                            <?php if($value->subscription_status && $value->is_member): ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($value->user_id == $user->id): ?>     
                                        <div class="row" style="margin-top: 15px;display: flex;">
                                            <!-- <div class="col-md-2 wcol-md-2"><?php echo e($user->id); ?></div> -->
                                            <div class="col-md-5 wcol-md-5"><?php echo e($user->name); ?></div>
                                            <div class="col-md-2 wcol-md-2"></div>
                                            <div class="col-md-4 wcol-md-4" style="text-align: center">
                                                <div class="col-md-6">
                                                    <?php if($value->subscription_status): ?>
                                                    <p >
                                                        Coming
                                                    </p>
                                                    <?php else: ?>
                                                    <p>Cancelled</p>
                                                    <?php endif; ?>
                                                </div>    
                                                <div class="col-md-6">
                                                    <div class="col-md-4 button-top"><button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>">Cancel</button></div>

                                                    <form id="<?php echo e($value->id); ?>" action="/unitclass_cancel_enrollment/delete/<?php echo e($value->id); ?>" method="DELETE" style="display: none;">
                                                    <input type="hidden" name="_method" value="DELETE">
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
                                                            You are going to Cancel Enrollment. Are you sure? you won't be able to revert these changes!
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Enrollment</button>
                                                            <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Cancel it</button></a>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div> 
                                        <hr class="mobline">
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            <?php elseif($value->subscription_status && !$value->is_member): ?>
                                <?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($value->user_id == $player->id): ?>     
                                        <div class="row" style="margin-top: 15px;display: flex;">
                                            <!-- <div class="col-md-2 wcol-md-2"><?php echo e($player->id); ?></div> -->
                                            <div class="col-md-5 wcol-md-5"><?php echo e($player->name); ?></div>
                                            <div class="col-md-2 wcol-md-2"></div>
                                            <div class="col-md-4 wcol-md-4" style="text-align: center">                           
                                                <div class="col-md-6">
                                                    <?php if($value->subscription_status): ?>
                                                    <p >
                                                        Coming
                                                    </p>
                                                    <?php else: ?>
                                                    <p>Cancelled</p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-4 button-top"><button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>">Cancel</button></div>

                                                    <form id="<?php echo e($value->id); ?>" action="/unitclass_cancel_enrollment/delete/<?php echo e($value->id); ?>" method="DELETE" style="display: none;">
                                                    <input type="hidden" name="_method" value="DELETE">
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
                                                            You are going to Cancel Enrollment. Are you sure? you won't be able to revert these changes!
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Enrollment</button>
                                                            <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Cancel it</button></a>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <hr class="mobline">
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            <?php endif; ?>
                        <?php endif; ?>    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.unitadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>