<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Tournament Details</div>
                <div class="panel-body" style="font-size: 19px;">               
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata" style="word-wrap: break-word;">Tournament:</div>
                        <div class="col-md-6 wcol-md-6"><?php echo e($tournaments->name); ?></div>
                    </div>
                    
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata" style="word-wrap: break-word;">Description:</div>
                        <div class="col-md-6 wcol-md-6"><?php echo e($tournaments->description); ?></div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                       <!--  <div class="col-md-4 wcol-md-4 showdata">Flyer:</div>
                        <div class="col-md-6 wcol-md-6" style="word-wrap: break-word;"><?php echo e($tournaments->flyer); ?></div> -->
                        <div class="col-md-4 wcol-md-4 showdata">View Flyer:</div>

                        <?php if($flyer): ?>
                            <div class="col-md-6 wcol-md-6"> <a href="<?php echo e(route('tournamentflyer', $flyer)); ?>" target="_blank">Click Here</a></div>
                        <?php else: ?>
                            <div class="col-md-6 wcol-md-6">No flyer</div>
                        <?php endif; ?>
                    </div>
                                     
                    
                    
                </div>                
            </div>
            <a href="<?php echo e(route('supertournament.edit', $tournaments->id)); ?>"><button type="button" class="btn btn-lg btn-info">Edit</button></a>            
        </div>
    </div>
    <div class="row" style="height: 10px;"></div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.superadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>