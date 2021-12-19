<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Add Classes to Series</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="GET" action="<?php echo route('unitseries_class.save', $classes['id']); ?>">
                        <!-- <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> -->


                        <div class="form-group">
                            <label for="player_name" class="col-md-4 control-label">class Name</label>
                            <div class="col-md-6">
                                <label for="player_name" class="control-label"> <?php echo e($classes->class_name); ?> </label>
                            </div>
                        </div>
                        <input type="hidden" name="class_name" value="<?php echo e($classes->classroom_id); ?>">
                        <div class="form-group<?php echo e($errors->has('class_name') ? ' has-error' : ''); ?>">
                            <label for="series_name" class="col-md-4 control-label">Series Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="series_name" name="series_name">
                                      <option selected>Choose...</option>
                                        <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serieskey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <h1><option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></h1>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                      
                                    </select>
                                </div>
                                <?php if($errors->has('series_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('series_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                      
                        


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add to Series
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

<?php echo $__env->make('layouts.unitadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>