<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
            <div class="col-md-2"><a href="<?php echo e(route('unitadmins.index')); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a></div>
            <div class="col-md-7"> 
            <form action="<?php echo route('member.search'); ?>" method="POST" role="search">
                <?php echo e(csrf_field()); ?>

                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search member"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            </div>
            <div class="col-md-3"><a href="<?php echo e(route('member.create')); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add New Registered User</button></a></div>
            </div>                       
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Member</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Member Name</div>
                        <div class="col-md-3">Email</div>
                        <div class="col-md-3" style="text-align: center;">
                            <div class="col-md-6" style="text-align: center">
                                Edit
                            </div>
                            <div class="col-md-6" style="text-align: center">
                                Delete
                            </div>
                        </div>
                    </div>
                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $memberkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2"><?php echo e($value->id); ?></div>
                        <div class="col-md-3"><?php echo e($value->name); ?></div>
                        <div class="col-md-3"><?php echo e($value->email); ?></div>
                        <div class="col-md-3" style="text-align: center">
                            <div class="col-md-6" style="text-align: center">
                                <a href="<?php echo e(route('member.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Edit</button></a>
                            </div>

                            <div class="col-md-6" style="text-align: center;"> <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>">Delete</button></div>
                            <form id="<?php echo e($value->id); ?>" action="/members/delete/<?php echo e($value->id); ?>" method="DELETE" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            </form>
                            <div class="modal fade" id="confirm<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="text-align: left;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    You are going to delete Member. Are you sure? you won't be able to revert these changes!
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Member</button>
                                    <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                  </div>
                                </div>
                              </div>
                            </div>

                            
                            
                        </div>                            
                    </div>                                                            
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                   
                    
                </div>
            </div>
            

        </div>
    </div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.unitadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>