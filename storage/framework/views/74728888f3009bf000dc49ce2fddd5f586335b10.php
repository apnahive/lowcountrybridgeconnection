<?php $__env->startSection('content'); ?>



<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">            
                <div class="panel-heading">Create Special Game</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('unitspecial_game.store')); ?>">
                        <?php echo e(csrf_field()); ?>


                        
                        <div class="form-group<?php echo e($errors->has('special_game') ? ' has-error' : ''); ?>">
                            <label for="special_game" class="col-md-4 control-label">Special Game</label>

                            <div class="col-md-6">
                                <textarea id="special_game" type="text" class="form-control" name="special_game" value="<?php echo e(old('special_game')); ?>" required autofocus></textarea>

                                <?php if($errors->has('special_game')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('special_game')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        
                        
                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Special Game
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