<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row" style="display: flex;">
            <div class="col-md-2 wcol-md-2"><a href="<?php echo e(route('superplayers.index')); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a></div>
            <div class="col-md-7 wcol-md-7"> 
            <form action="<?php echo route('superplayers.search'); ?>" method="POST" role="search" class="search-des">
                <?php echo e(csrf_field()); ?>

                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search players"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            </div>

            <div class="col-md-3  wcol-md-3"><a href="<?php echo e(route('superplayers.create')); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a New Player</button></a></div>             
            </div>
            <div class="col-md-12 search-mob" style="margin-top: 26px;"> 
            <form action="<?php echo route('superplayers.search'); ?>" method="POST" role="search">
                <?php echo e(csrf_field()); ?>

                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search players"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            </div>


            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Players</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                       <!--  <div class="col-md-1"></div> -->
                        <div class="col-md-4 wcol-md-4">
                            Name
                        </div>
                        <div class="col-md-8 wcol-md-8" style="text-align: center">
                            <div class="col-md-6">Email/ACBL</div>
                            <div class="col-md-6" style="text-align: center;">                            
                                    Add to                            
                            </div>
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php if(count($players) > 0 && count($users) > 0): ?>
                        <?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playerkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <div class="row" style="margin-top: 15px;display: flex;">
                            <!-- <div class="col-md-1"><?php echo e($value->id); ?></div> -->
                            <div class="col-md-4 wcol-md-4"><?php echo e($value->name); ?> <?php echo e($value->lastname); ?></div>
                            <div class="col-md-8 wcol-md-8" style="text-align: center">

                                <div class="col-md-6" style="word-wrap: break-word;"><?php echo e($value->email); ?> <br> <?php echo e($value->acbl); ?> </div>
                                <div class="col-md-6" style="text-align: center">
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="<?php echo e(route('superclass_subscription.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Series/Class</button></a>
                                    </div>                            
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="<?php echo e(route('supergame_subscription.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Game</button></a>
                                    </div>                            
                                </div>
                            </div>
                        </div> 
                        <hr class="mobline">                                       
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userkey => $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <div class="row" style="margin-top: 15px;display: flex;">
                            <!-- <div class="col-md-1"><?php echo e($value->id); ?></div> -->
                            <div class="col-md-4 wcol-md-4"><?php echo e($value1->name); ?> <?php echo e($value1->lastname); ?></div>
                            <div class="col-md-8 wcol-md-8" style="text-align: center">
                                <div class="col-md-6" style="word-wrap: break-word;"><?php echo e($value1->email); ?> <br> <?php echo e($value->acbl); ?> </div>
                                <div class="col-md-6" style="text-align: center">
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="<?php echo e(route('superuserclass.edit', $value1->id)); ?>"><button type="button" class="btn btn-priamry">Series/Class</button></a>
                                    </div>                            
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="<?php echo e(route('superusergame.edit', $value1->id)); ?>"><button type="button" class="btn btn-priamry">Game</button></a>
                                    </div>                            
                                </div>
                            </div>
                        </div>  
                        <hr class="mobline">                                      
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                   
                    <?php elseif(count($players) > 0): ?>
                        <?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playerkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <div class="row" style="margin-top: 15px;display: flex;">
                            <!-- <div class="col-md-1"><?php echo e($value->id); ?></div> -->
                            <div class="col-md-4 wcol-md-4"><?php echo e($value->name); ?> <?php echo e($value->lastname); ?></div>
                            <div class="col-md-8 wcol-md-8" style="text-align: center">

                                <div class="col-md-6" style="word-wrap: break-word;"><?php echo e($value->email); ?></div>
                                <div class="col-md-6" style="text-align: center">
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="<?php echo e(route('superclass_subscription.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Series/Class</button></a>
                                    </div>                            
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="<?php echo e(route('supergame_subscription.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Game</button></a>
                                    </div>                            
                                </div>
                            </div>
                        </div> 
                        <hr class="mobline">                                       
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    <?php elseif(count($users) > 0): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userkey => $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <div class="row" style="margin-top: 15px;display: flex;">
                            
                            <div class="col-md-4 wcol-md-4"><?php echo e($value1->name); ?> <?php echo e($value1->lastname); ?></div>
                            <div class="col-md-8 wcol-md-8" style="text-align: center">
                                <div class="col-md-6" style="word-wrap: break-word;"><?php echo e($value1->email); ?></div>
                                <div class="col-md-6" style="text-align: center">
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="<?php echo e(route('superuserclass.edit', $value1->id)); ?>"><button type="button" class="btn btn-priamry">Series/Class</button></a>
                                    </div>                            
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="<?php echo e(route('superusergame.edit', $value1->id)); ?>"><button type="button" class="btn btn-priamry">Game</button></a>
                                    </div>                            
                                </div>
                            </div>
                        </div>  
                        <hr class="mobline">                                      
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <?php else: ?>
                        <br>
                        <div style="text-align: center;">no records to show</div>
                    <?php endif; ?>

                </div>
            </div>
            

        </div>
    </div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.superadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>