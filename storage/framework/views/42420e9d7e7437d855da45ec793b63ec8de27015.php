<?php $__env->startSection('content'); ?>


<div class="row full1">
    <div class="mid-section">
        <div class="col-md-12"><img src="/img/class.png" style="margin-top: 22px;width: 100%"></div>
        <div class="col-md-12" style="margin-top: 72px;border: 1px black solid;text-align: left;">
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Class Name</div>
                <div class="col-md-8 table-space left-table"><?php echo e($classes->class_name); ?></div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Class Description</div>
                <div class="col-md-8 table-space left-table"><?php echo e($classes->class_description); ?></div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Starts Date</div>
                <div class="col-md-8 table-space left-table"><?php echo e(date('m-d-Y', strtotime($classes->class_from))); ?></div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">End Date</div>
                <div class="col-md-8 table-space left-table">
                    <?php if($classes->class_till == 'N/A'): ?>
                    <?php echo e($classes->class_till); ?>

                    <?php else: ?>
                    <?php echo e(date('m-d-Y', strtotime($classes->class_till))); ?>

                    <?php endif; ?>
                </div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Starts Time</div>
                <div class="col-md-8 table-space left-table"><?php echo e(date("g:i a", strtotime($classes->start_time))); ?></div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Class Size</div>
                <div class="col-md-8 table-space left-table"><?php echo e($classes->class_size); ?></div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Payment Option</div>
                <div class="col-md-8 table-space left-table"><?php echo e($classes->payment_option); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4 table-space" style="font-weight: 600;">Price (USD)</div>
                <div class="col-md-8 table-space left-table"><?php echo e($classes->fee_amount); ?></div>
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
                <a href="<?php echo e(route('classflyer', $flyer)); ?>" target="_blank">
                    <button class="btn btn-primary silver">View Flyer</button>
                </a>
                <?php endif; ?>
            </div>

                        
            <div class="col-md-4 listclass button-top" style="text-align: right;">
                <form class="form-horizontal" role="form" method="POST" action="<?php echo route('class_enrollment.update', $classes['id']); ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <a href="">
                            <button type="submit" class="btn btn-primary silver">Enroll Now</button>
                        </a>
                </form>
            </div>
        </div>
    </div>
</div>








<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>