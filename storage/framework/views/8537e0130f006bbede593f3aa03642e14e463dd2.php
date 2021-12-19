<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a> 
            <a href="<?php echo e(route('unitclass.show', $id)); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">View Class</button></a>           

           <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Members</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">#</div> -->
                        <div class="col-md-5 wcol-md-5">Member Name</div>
                        <div class="col-md-3 wcol-md-3"></div>
                        <div class="col-md-3 wcol-md-3" style="text-align: center;">                            
                            <div class="col-md-6">Action</div> 
                            <div class="col-md-6"></div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $waiting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wait => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($user->id == $value->user_id): ?>                                
                                <div class="row" style="margin-top: 15px;display: flex;">
                                    <!-- <div class="col-md-2 wcol-md-2"><?php echo e($user->id); ?></div> -->
                                    <div class="col-md-5 wcol-md-5"><?php echo e($user->name); ?></div>
                                    <div class="col-md-3 wcol-md-3"></div>
                                    <div class="col-md-3 wcol-md-3" style="text-align: center">
                                        <div class="col-md-6">
                                           <a href="<?php echo e(route('unitclasswaiting.edit', $value)); ?>"><button type="button" class="btn btn-priamry">Send Mail</button></a>
                                        </div>    
                                        <div class="col-md-6"></div>
                                    </div>
                                </div>
                                <hr class="mobline">
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
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