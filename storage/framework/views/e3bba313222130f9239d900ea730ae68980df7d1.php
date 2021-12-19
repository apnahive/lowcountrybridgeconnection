<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="/unitadmins"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="<?php echo e(route('clubs.create')); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a New Club</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Clubs</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">#</div> -->
                        <div class="col-md-7 wcol-md-7">Clubs Name</div>
                        <div class="col-md-2 wcol-md-2" style="text-align: center;">Edit</div>
                        <div class="col-md-2 wcol-md-2" style="text-align: center;">Delete</div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clubkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2"><?php echo e($value->id); ?></div> -->
                        <div class="col-md-7 wcol-md-7"><?php echo e($value->club_name); ?></div>
                        
                        <div class="col-md-2 wcol-md-2" style="text-align: center;"><a href="<?php echo e(route('clubs.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Edit</button></a></div>

                        <div class="col-md-2 wcol-md-2" style="text-align: center;"> <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>">Delete</button></div>
                        <form id="<?php echo e($value->id); ?>" action="/clubs/delete/<?php echo e($value->id); ?>" method="DELETE" style="display: none;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        </form>
                        <div class="modal fade" id="confirm<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Club</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                You are going to delete club. All the associated records will be deleted (i.e. Classes, Class enrollment, waiting list records etc). You won't be able to revert these changes!
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this club</button>
                                <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
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

<?php echo $__env->make('layouts.unitadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>