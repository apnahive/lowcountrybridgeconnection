<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="<?php echo e(route('profile')); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>            

           <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">You are on the waiting list for the following classes:</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">#</div> -->
                        <div class="col-md-5 wcol-md-5">Class Name</div>
                        <div class="col-md-3 wcol-md-3"></div>
                        <div class="col-md-3 wcol-md-3" style="text-align: center;">                            
                            <div class="col-md-6"></div> 
                            <div class="col-md-6"></div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                        
                            <div class="row" style="margin-top: 15px;display: flex;">
                                <!-- <div class="col-md-2 wcol-md-2"></div> -->
                                <div class="col-md-5 wcol-md-5"><?php echo e($class->class_name); ?></div>
                                <div class="col-md-3 wcol-md-3"></div>
                                <div class="col-md-3 wcol-md-3" style="text-align: center">
                                    <div class="col-md-6">
                                    </div>    
                                    <div class="col-md-6"></div>
                                </div>
                            </div> 
                            <hr class="mobline">                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
                    
                </div>
            </div>

            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">You are on the waiting list for the following games:</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">#</div> -->
                        <div class="col-md-5 wcol-md-5">Game Name</div>
                        <div class="col-md-3 wcol-md-3"></div>
                        <div class="col-md-3 wcol-md-3" style="text-align: center;">                            
                            <div class="col-md-6"></div> 
                            <div class="col-md-6"></div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    
                    <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                        
                            <div class="row" style="margin-top: 15px;display: flex;">
                                <!-- <div class="col-md-2 wcol-md-2"></div> -->
                                <div class="col-md-5 wcol-md-5"><?php echo e($game->game_name); ?></div>
                                <div class="col-md-3 wcol-md-3"></div>
                                <div class="col-md-3 wcol-md-3" style="text-align: center">
                                    <div class="col-md-6">
                                    </div>    
                                    <div class="col-md-6"></div>
                                </div>
                            </div>
                            <hr class="mobline">                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
                    
                </div>
            </div>


        </div>
    </div>
</div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>