<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add Player to Game</button></a>
            <div class="panel panel-default" style="margin-top: 60px;">
                <div class="panel-heading">Available Games</div>
                <div class="panel-body">
                    <div class="row" style="margin-left: 20px;display: flex;">
                        <!-- <div class="col-md-2">#</div> -->
                        <div class="col-md-3 wcol-md-3">Game Name</div>
                        <div class="col-md-4 wcol-md-4">Details</div>
                        <div class="col-md-5 wcol-md-5" style="text-align: center;">                            
                            <div class="col-md-6">View</div> 
                            <div class="col-md-6">Waiting</div>  
                        </div>
                    </div>
                    <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gamekey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($value->game_status): ?>
                            <div class="row" style="margin-top: 15px;margin-left: 20px;display: flex;">
                                <!-- <div class="col-md-2"><?php echo e($value->id); ?></div> -->
                                <div class="col-md-3 wcol-md-3"><?php echo e($value->game_name); ?></div>
                                <div class="col-md-4 wcol-md-4">
                                    Starts From: <?php echo e(date('m-d-Y', strtotime($value->game_date))); ?> <br>
                                    Status: <?php if($value->game_status == 0): ?> Cancelled <?php else: ?> Active <?php endif; ?>
                                </div>
                                <div class="col-md-5 wcol-md-5" style="text-align: center">                           
                                    <div class="col-md-6"><a href="<?php echo e(route('supergame_subscription.show', $value->id)); ?>"><button type="button" class="btn btn-priamry">Enrollment</button></a></div>    
                                    <div class="col-md-6"><a href="<?php echo e(route('supergamewaiting.show', $value->id)); ?>"><button type="button" class="btn btn-priamry">waitlist</button></a></div>

                                    <!-- <div class="col-md-4"><a href="/supergame_subscription/delete/<?php echo e($value->id); ?>"><button type="button" class="btn btn-priamry">Cancel</button></a></div> -->

                                </div>
                            </div>
                        <?php endif; ?>                                            
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.superadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>