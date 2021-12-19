<?php $__env->startSection('content'); ?>

    <!-- Header -->
       
        <!-- Portfolio Grid Section -->
        <div class="row full1">
            <div class="mid-section">
                <div class="col-md-3"><img src="img/heart.jpg" style="margin-top: 22px;"></div>
                <div class="col-md-6"><h3 class="text-uppercase" style="font-size: 17px;font-weight: 700;color: black; margin-top: 32px; border-bottom: 3px black solid;">local bridge classes & seminar information</h3></div>
                <div class="col-md-3"><img src="img/heart.jpg" style="margin-top: 22px;"></div>

            </div>
        </div>




        <div class="row full1">
            <div class="mid-section">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if(count($value->clubs) > 0): ?>                        
                        <div class="col-md-12"><img src="img/<?php echo e($value->name); ?>-classes.png" style="margin-top: 22px;margin-left: -30px;width: 100%;"></div>
                        <?php $__currentLoopData = $value->clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clubkey => $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($club->classes) > 0 || count($club->series) > 0): ?> 
                            <div class="col-md-12"><h3><?php echo e($club->club_name); ?></h3></div>
                            <div class="col-md-12">
                                <?php $__currentLoopData = $club->classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clubkey => $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo route('class_details.show', $class['id']); ?>" style="margin-right: 24px;"><button type="button" class="btn btn-primary outline" style="margin-bottom: 34px;margin-top: 21px;width: 170px;white-space: normal!important;height: 68px;"><?php echo e($class->class_name); ?></button></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php $__currentLoopData = $club->series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clubkey => $series1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo route('serieslist', $series1['id']); ?>" style="margin-right: 24px;"><button type="button" class="btn btn-primary outline" style="margin-bottom: 34px;margin-top: 21px;width: 170px;white-space: normal!important;height: 68px;"><?php echo e($series1->name); ?></button></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <hr style="border-top: 1px solid rgb(35, 34, 34);width: 50%;">
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                
                
            </div>
        </div>



        
        

         <!-- Footer -->
        


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>