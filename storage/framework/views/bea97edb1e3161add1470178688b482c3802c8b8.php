<?php $__env->startSection('content'); ?>


<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="<?php echo e(route('unittournament.create')); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a New Tournament</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Tournament</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">#</div> -->
                        <div class="col-md-5 wcol-md-5">Tournament Name</div>
                        <div class="col-md-1 wcol-md-1"></div>
                        <div class="col-md-5 wcol-md-5" style="text-align: center;">
                            <div class="col-md-4">Edit</div> 
                            <div class="col-md-4">View</div> 
                            <div class="col-md-4">Delete</div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $tournaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tournamentkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2"><?php echo e($value->id); ?></div> -->
                        <div class="col-md-5 wcol-md-5" style="word-wrap: break-word;"><?php echo e($value->name); ?></div>
                        <div class="col-md-1 wcol-md-1"></div>
                        <div class="col-md-5 wcol-md-5" style="text-align: center">
                            <div class="col-md-4"><a href="<?php echo e(route('unittournament.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Edit</button></a></div> 
                            <div class="col-md-4 button-top"><a href="<?php echo e(route('unittournament.show', $value->id)); ?>"><button type="button" class="btn btn-priamry">View</button></a></div> 

                            <div class="col-md-4 button-top" style="text-align: center;"> <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>">Delete</button></div>
                            <form id="<?php echo e($value->id); ?>" action="/unittournament/delete/<?php echo e($value->id); ?>" method="DELETE" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            </form>
                            <div class="modal fade" id="confirm<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true" style="text-align: left">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete tournament</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    You are going to delete tournament. Are you sure? you won't be able to revert these changes!
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this tournament</button>
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

<?php echo $__env->make('layouts.unitadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>