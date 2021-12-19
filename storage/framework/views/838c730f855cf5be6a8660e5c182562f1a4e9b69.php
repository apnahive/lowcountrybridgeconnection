<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Series</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo route('series.update', $series['id']); ?>">
                       <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                        <div class="form-group<?php echo e($errors->has('series_name') ? ' has-error' : ''); ?>">
                            <label for="series_name" class="col-md-4 control-label">Series Name</label>

                            <div class="col-md-6">
                                <input id="series_name" type="text" class="form-control" name="series_name" value="<?php echo e(old('series_name', $series['name'])); ?>" required autofocus>

                                <?php if($errors->has('series_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('series_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" value="<?php echo e(old('description', $series['description'])); ?>" required autofocus><?php echo $series->description; ?></textarea>

                                <?php if($errors->has('description')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('description')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('club') ? ' has-error' : ''); ?>" id="club">
                            <label for="club" class="col-md-4 control-label">Club Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="club" name="club">
                                      
                                        <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <h1><option value="<?php echo e($club->id); ?>" <?php echo e($series['club_id'] === $club->id ? 'selected' : ''); ?>><?php echo e($club->club_name); ?></h1>
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
                        <div class="form-group<?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
                            <label for="start_date" class="col-md-4 control-label">From Date</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control" name="start_date" value="<?php echo e($series['start_date']); ?>" required autofocus>

                                <?php if($errors->has('start_date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('start_date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
                            <label for="end_date" class="col-md-4 control-label">Till Date</label>

                            <div class="col-md-6">
                                <input id="end_date" type="date" class="form-control" name="end_date" value="<?php echo e($series['end_date']); ?>">

                                <?php if($errors->has('end_date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('end_date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('start_time') ? ' has-error' : ''); ?>">
                            <label for="start_time" class="col-md-4 control-label">Start Time</label>

                            <div class="col-md-6">
                                <input type="time" name="start_time" id="start_time" class="form-control" value="<?php echo e($series['start_time']); ?>" required autofocus>                              

                                <?php if($errors->has('start_time')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('start_time')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('class_size') ? ' has-error' : ''); ?>">
                            <label for="class_size" class="col-md-4 control-label">Maximum Students Allowed</label>

                            <div class="col-md-6">
                                <input id="class_size" type="text" class="form-control" name="class_size" value="<?php echo e($series['class_size']); ?>" required autofocus>

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
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="payment_option" name="payment_option">
                                      <!-- <option selected><?php echo e($series['payment_option']); ?></option> -->
                                      <option value="Bring_Cash_only" <?php echo e($series['payment_option'] === "Bring_Cash_only" ? 'selected' : ''); ?>>Bring Cash only</option>
                                    <option value="Bring_Cash_or_Check"<?php echo e($series['payment_option'] === "Bring_Cash_or_Check" ? 'selected' : ''); ?>>Bring Cash or Check</option>
                                    <option value="Prepayment_required" <?php echo e($series['payment_option'] === "Prepayment_required" ? 'selected' : ''); ?>>Payment Gateway</option>
                                    <option value="Free" <?php echo e($series['payment_option'] === "Free" ? 'selected' : ''); ?>>Free</option>                                     
                                    </select>
                                 </div>                                  

                                <?php if($errors->has('payment_option')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('payment_option')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('series_flyer') ? ' has-error' : ''); ?>">
                            <label for="series_flyer" class="col-md-4 control-label">Flyer URL</label>

                            <div class="col-md-6">
                                <input id="series_flyer" type="text" class="form-control" name="series_flyer" value="<?php echo e($series['series_flyer']); ?>">

                                <?php if($errors->has('series_flyer')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('series_flyer')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- <div class="form-group<?php echo e($errors->has('fee_amount') ? ' has-error' : ''); ?>">
                            <label for="fee_amount" class="col-md-4 control-label">Fee Amount</label>

                            <div class="col-md-6">
                                <input id="fee_amount" type="text" class="form-control" name="fee_amount" value="<?php echo e(old('fee_amount', $series['fee_amount'])); ?>" required autofocus>

                                <?php if($errors->has('fee_amount')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('fee_amount')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div> -->
                        
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