<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Add Classes to Series</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo route('unitseries_class.update', $series['id']); ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">


                        <div class="form-group">
                            <label for="player_name" class="col-md-4 control-label">Series Name</label>
                            <div class="col-md-6">
                                <label for="class_name" class="control-label"> <?php echo e($series->name); ?> </label>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('class_name') ? ' has-error' : ''); ?>">
                            <label for="class_name" class="col-md-4 control-label">Class Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="class_name" name="class_name">
                                      <option selected>Choose...</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classkey => $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <h1><option value="<?php echo e($class->classroom_id); ?>"><?php echo e($class->class_name); ?></h1>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                      
                                    </select>
                                </div>
                                <?php if($errors->has('class_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('class_name')); ?></strong>
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