<?php $__env->startSection('content'); ?>


<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="/supergame/create" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a New Game</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Games</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <div class="col-md-3 wcol-md-3">Game Name</div>
                        <div class="col-md-4 wcol-md-4">Details</div>
                        <div class="col-md-5 wcol-md-5" style="text-align: center;">
                            <div class="col-md-4">View</div> 
                            <div class="col-md-4">Edit</div> 
                            <div class="col-md-4">Delete</div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gamekey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        
                        <div class="col-md-3 wcol-md-3"><?php echo e($value->game_name); ?></div>
                        <div class="col-md-4 wcol-md-4">
                            Starts From: <?php echo e(date('m-d-Y', strtotime($value->game_date))); ?> <br>
                            Status: <?php if($value->game_status == 0): ?> Cancelled <?php else: ?> Active <?php endif; ?> <br>
                            Manager: <?php echo e($value->manager); ?>

                        </div>
                        <div class="col-md-5 wcol-md-5" style="text-align: center">
                            <div class="col-md-4"><a href="<?php echo e(route('supergame.show', $value->id)); ?>"><button type="button" class="btn btn-priamry">View</button></a></div>
                            <div class="col-md-4 button-top"><?php if($value->game_status == 1): ?><a href="<?php echo e(route('supergame.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Edit</button></a><?php endif; ?></div> 

                            <div class="col-md-4"><button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>">Delete</button></div>

                            <form id="<?php echo e($value->id); ?>" action="/supersgame/delete/<?php echo e($value->id); ?>" method="DELETE" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            </form>
                            <div class="modal fade" id="confirm<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="text-align: left;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Game</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    You are going to delete Game. All the associated records will be deleted (i.e. Game enrollment, Waiting). You won't be able to revert these changes!
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Game</button>
                                    <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                  </div>
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
    <div class="row" style="height: 50px;"></div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.superadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>