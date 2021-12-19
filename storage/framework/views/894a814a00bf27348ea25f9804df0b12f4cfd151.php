<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading"><?php echo e($series->name); ?></div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                       <!--  <div class="col-md-1"></div> -->
                        <div class="col-md-5  wcol-md-5">
                            <div class="col-md-6">Class Name</div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="col-md-3 wcol-md-3"></div>
                        <div class="col-md-4 wcol-md-4" style="text-align: center;">Action
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classkey => $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        
                        <div class="col-md-5 wcol-md-5">
                            <div class="col-md-12"><?php echo e($class->class_name); ?></div>
                            
                        </div>
                        <div class="col-md-3 wcol-md-3"></div>
                        <div class="col-md-4 wcol-md-4" style="text-align: center">
                            <a href="<?php echo e(route('superclass.show', $class->id)); ?>"><button type="button" class="btn btn-priamry">View</button></a>
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

<?php echo $__env->make('layouts.superadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>