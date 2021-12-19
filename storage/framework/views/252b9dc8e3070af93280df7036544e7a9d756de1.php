<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Edit Class</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo route('classes.update', $classes['id']); ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                        <div class="form-group<?php echo e($errors->has('class_name') ? ' has-error' : ''); ?>">
                            <label for="class_name" class="col-md-4 control-label">Class Name</label>

                            <div class="col-md-6">
                                <input id="class_name" type="text" class="form-control" name="class_name" value="<?php echo e(old( 'class_name', $classes['class_name'])); ?>" required autofocus>

                                <?php if($errors->has('class_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('class_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('class_description') ? ' has-error' : ''); ?>">
                            <label for="class_description" class="col-md-4 control-label">Class Description</label>

                            <div class="col-md-6">
                                <textarea id="class_description" type="text" class="form-control" name="class_description" rows="5" required autofocus><?php echo $classes->class_description; ?></textarea>

                                <?php if($errors->has('class_description')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('class_description')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('club') ? ' has-error' : ''); ?>" id="club">
                            <label for="club" class="col-md-4 control-label">Club Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="club" name="club">
                                      <option selected>Choose...</option>
                                        <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <h1><option value="<?php echo e($club->id); ?>" <?php echo e($classes['club_id'] === $club->id ? 'selected' : ''); ?>><?php echo e($club->club_name); ?></h1>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                      
                                    </select>
                                </div>
                                <?php if($errors->has('club')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('club')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- <div class="form-group<?php echo e($errors->has('class_type') ? ' has-error' : ''); ?>">
                            <label for="class_type" class="col-md-4 control-label">Class Type</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="class_type" name="class_type">
                                      <option selected><?php echo e($classes['class_type']); ?></option>                                      
                                      <option value="Seminar">Seminar</option>
                                      <option value="New Series">New Series</option>
                                      <option value="Existing Series">Existing Series</option>
                                    </select>
                                 </div>                                  

                                <?php if($errors->has('class_type')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('class_type')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div> -->
                        <!-- <div class="form-group<?php echo e($errors->has('series_name') ? ' has-error' : ''); ?>" id="series" style="display: none;">
                            <label for="series_name" class="col-md-4 control-label">Series Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="series_name" name="series_name">
                                      <option selected>Choose...</option>
                                        <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $series1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <h1><option value="<?php echo e($series1->id); ?>"><?php echo e($series1->name); ?></h1>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                      
                                    </select>
                                </div>
                                <?php if($errors->has('series_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('series_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div> -->

                        <div class="form-group<?php echo e($errors->has('class_from') ? ' has-error' : ''); ?>">
                            <label for="class_from" class="col-md-4 control-label">From Date</label>

                            <div class="col-md-6">
                                <input id="class_from" type="date" class="form-control" name="class_from" value="<?php echo e($classes['class_from']); ?>" required autofocus>

                                <?php if($errors->has('class_from')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('class_from')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('class_till') ? ' has-error' : ''); ?>">
                            <label for="class_till" class="col-md-4 control-label">Till Date</label>
                            <div class="col-md-6">
                                <input id="class_till" type="date" class="form-control" name="class_till" value="<?php echo e($classes['class_till']); ?>">

                                <?php if($errors->has('class_till')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('class_till')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>                            
                        </div>

                        <div class="form-group<?php echo e($errors->has('start_time') ? ' has-error' : ''); ?>">
                            <label for="start_time" class="col-md-4 control-label">Start Time</label>

                            <div class="col-md-6">
                                <input type="time" name="start_time" id="start_time" class="form-control" value="<?php echo e($classes['start_time']); ?>" required autofocus>                              

                                <?php if($errors->has('start_time')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('start_time')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('class_size') ? ' has-error' : ''); ?>">
                            <label for="class_size" class="col-md-4 control-label">Maximum Student Allowed</label>

                            <div class="col-md-6">
                                <input id="class_size" type="text" class="form-control" name="class_size" value="<?php echo e($classes['class_size']); ?>" required autofocus>

                                <?php if($errors->has('class_size')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('class_size')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('payment_option') ? ' has-error' : ''); ?>">
                            <label for="payment_option" class="col-md-4 control-label">Choose Payment Option</label>

                            <div class="col-md-6">
                                
                                <select class="custom-select form-control" id="payment_option" name="payment_option">
                                    <!-- <option selected><?php echo e($classes['payment_option']); ?></option> -->
                                    <option value="Bring_Cash_only" <?php echo e($classes['payment_option'] === "Bring_Cash_only" ? 'selected' : ''); ?>>Bring Cash only</option>
                                    <option value="Bring_Cash_or_Check"<?php echo e($classes['payment_option'] === "Bring_Cash_or_Check" ? 'selected' : ''); ?>>Bring Cash or Check</option>
                                    <option value="Prepayment_required" <?php echo e($classes['payment_option'] === "Prepayment_required" ? 'selected' : ''); ?>>Payment Gateway</option>
                                    <option value="Free" <?php echo e($classes['payment_option'] === "Free" ? 'selected' : ''); ?>>Free</option>                                      
                                </select>

                                <?php if($errors->has('payment_option')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('payment_option')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('fee_amount') ? ' has-error' : ''); ?>">
                            <label for="fee_amount" class="col-md-4 control-label">Fee Amount (USD)</label>

                            <div class="col-md-6">
                                <input id="fee_amount" type="text" class="form-control" name="fee_amount" value="<?php echo e($classes['fee_amount']); ?>" required autofocus>

                                <?php if($errors->has('fee_amount')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('fee_amount')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('class_flyer_address') ? ' has-error' : ''); ?>">
                            <label for="class_flyer_address" class="col-md-4 control-label">Flyer URL</label>

                            <div class="col-md-6">
                                <input id="class_flyer_address" type="text" class="form-control" name="class_flyer_address" value="<?php echo e($classes['class_flyer_address']); ?>" >

                                <?php if($errors->has('class_flyer_address')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('class_flyer_address')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.manage_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>