<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">            
            <div class="col-md-12"><a href="<?php echo e(route('manage_students.index')); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add Student to Class</button></a></div> 
            <div class="panel panel-default" style="margin-top: 60px;">
                <div class="panel-heading">Available Classes</div>
                <div class="panel-body">
                    <div class="row" style="margin-left: 20px;display: flex;">
                         
                        <div class="col-md-3 wcol-md-3">Class Name</div>
                        <div class="col-md-4 wcol-md-4">Details</div>
                        <div class="col-md-5 wcol-md-5" style="text-align: center;">                            
                            <div class="col-md-6">View</div>                             
                            <div class="col-md-6">Waiting</div>  
                            <!-- <div class="col-md-4">Cancel</div> --> 
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php if($value->class_status): ?>
                            <div class="row" style="margin-top: 15px;margin-left: 20px;display: flex;">
                                
                                <div class="col-md-3 wcol-md-3"><?php echo e($value->class_name); ?></div>
                                <div class="col-md-4 wcol-md-4">
                                    Starts From: <?php echo e(date('m-d-Y', strtotime($value->class_from))); ?><br>
                                    Series: <?php echo e($value->series_name); ?>

                                </div>
                                <div class="col-md-5 wcol-md-5" style="text-align: center">                           
                                    <div class="col-md-6"><a href="<?php echo e(route('playerclass.show', $value->id)); ?>"><button type="button" class="btn btn-priamry">Enrollment</button></a></div>    
                                    <div class="col-md-6 button-top"><a href="<?php echo e(route('classwaiting.show', $value->id)); ?>"><button type="button" class="btn btn-priamry">Waitlist</button></a></div>
                                    <!-- <div class="col-md-4 button-top"><a href="/playerclass/delete/<?php echo e($value->id); ?>"><button type="button" class="btn btn-priamry">Cancel</button></a></div> --> 
                                    
                                </div>
                            </div>
                            <hr class="mobline">
                        <?php endif; ?>                                            
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.manage_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>