<?php $__env->startSection('content'); ?>


<div class="row full1">
    <div class="mid-section">
        <div class="col-md-12"><img src="/img/series.png" style="margin-top: 22px;margin-left: -30px;width: 100%;"></div>
        <div class="col-md-12" style="margin-top: 72px;border: 1px black solid;text-align: left;">
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Series Name</div>
                <div class="col-md-8 table-space left-table"><?php echo e($series->name); ?></div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Description</div>
                <div class="col-md-8 table-space left-table"><?php echo e($series->description); ?></div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Starts Date</div>
                <div class="col-md-8 table-space left-table"><?php echo e(date('m-d-Y', strtotime($series->start_date))); ?></div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">End Date</div>
                <div class="col-md-8 table-space left-table">
                    <?php if($series->end_date == 'N/A'): ?>
                    <?php echo e($series->end_date); ?>

                    <?php else: ?>
                    <?php echo e(date('m-d-Y', strtotime($series->end_date))); ?>

                    <?php endif; ?>
                </div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Starts Time</div>
                <div class="col-md-8 table-space left-table"><?php echo e(date("g:i a", strtotime($series->start_time))); ?></div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Series Size</div>
                <div class="col-md-8 table-space left-table"><?php echo e($series->class_size); ?></div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Payment Option</div>
                <div class="col-md-8 table-space left-table"><?php echo e($series->payment_option); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4 table-space" style="font-weight: 600;">Price (USD)</div>
                <div class="col-md-8 table-space left-table"><?php echo e($series->fee_amount); ?></div>
            </div>
        </div>

        <div class="col-md-12 buttonbox1" style="margin-top: 72px;margin-bottom: 72px;">
            <div class="col-md-4 listclass button-top" style="text-align: left;">
                <a href="<?php echo e(URL::previous()); ?>">
                    <button class="btn btn-primary silver">Back</button>
                </a>
            </div>
            <div class="col-md-4 listclass button-top" style="text-align: center;">
                <?php if($flyer): ?>
                <a href="<?php echo e(route('seriesflyer', $flyer)); ?>" target="_blank">
                    <button class="btn btn-primary silver">View Flyer</button>
                </a>
                <?php endif; ?>
                <!-- <a href="<?php echo e($series->series_flyer); ?>" target="_blank">
                    <button class="btn btn-primary silver">View Flyer</button>
                </a> -->
            </div>
            <div class="col-md-4 listclass button-top" style="text-align: right;">
                <a href="<?php echo route('seriesbook', $series['id']); ?>">
                    <button class="btn btn-primary silver">Enroll Now</button>
                </a>
            </div>
        </div>
    </div>
</div>
    <!-- Header -->
       
        <!-- Portfolio Grid Section -->
        <!-- <div class="row full1">
            <div class="mid-section">
                <div class="col-md-3"><img src="img/heart.jpg" style="margin-top: 22px;"></div>
                <div class="col-md-6"><h3 class="text-uppercase" style="font-size: 17px;font-weight: 700;color: black; margin-top: 32px; border-bottom: 3px black solid;">local bridge classes & seminar information</h3></div>
                <div class="col-md-3"><img src="img/heart.jpg" style="margin-top: 22px;"></div>

            </div>
        </div>
        <div class="row full1">
            <div class="mid-section">
                <h3 class="text-uppercase" style="font-size: 17px; margin-top: 32px; font-weight: 400;">bridge is a fascinating game...........check out our current offerings.</h3>
                <hr style="border-top: 1px solid rgb(35, 34, 34);width: 50%;">
            </div>
        </div> -->
        <?php if(count($classes) > 0): ?>
        <div class="row full1" style="margin-bottom: 50px;">
            <div class="mid-section">
                <div class="col-md-12"><img src="/img/enroll.png" style="width: 100%;margin-bottom: 54px;margin-left: -30px;"></div>
                <div class="col-md-12">
                
                    <div class="row buttonbox1">
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 wcol-md-4 sapce1 listclass button-top">
                            <a href="<?php echo route('class_details.show', $value['id']); ?>"><button type="button" class="btn btn-primary silver sp"><?php echo e($value->class_name); ?></button></a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                    </div>                    
                </div>                   
           
            </div>
        </div>
       <?php endif; ?> 

        

         <!-- Footer -->
        


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>