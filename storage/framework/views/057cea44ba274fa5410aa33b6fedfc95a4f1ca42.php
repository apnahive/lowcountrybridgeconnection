<?php $__env->startSection('content'); ?>



<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">            
                <div class="panel-heading">Create Tournament</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('unittournament.store')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('tournament_name') ? ' has-error' : ''); ?>">
                            <label for="tournament_name" class="col-md-4 control-label">Tournament Name</label>

                            <div class="col-md-6">
                                <input id="tournament_name" type="text" class="form-control" name="tournament_name" placeholder="maximum 455 character" value="<?php echo e(old('tournament_name')); ?>" required autofocus>

                                <?php if($errors->has('tournament_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tournament_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('tournament_description') ? ' has-error' : ''); ?>">
                            <label for="tournament_description" class="col-md-4 control-label">Tournament Description</label>

                            <div class="col-md-6">
                                <textarea id="tournament_description" type="text" class="form-control" name="tournament_description" placeholder="maximum 2024 character" value="<?php echo e(old('tournament_description')); ?>" required autofocus></textarea>

                                <?php if($errors->has('tournament_description')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tournament_description')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('tournament_flyer') ? ' has-error' : ''); ?>">
                            <label for="tournament_flyer" class="col-md-4 control-label">Flyer URL</label>

                            <div class="col-md-6">
                                <!-- <input id="tournament_flyer" type="text" class="form-control" name="tournament_flyer" value="<?php echo e(old('tournament_flyer')); ?>" required autofocus> -->
                                <input id="tournament_flyer" class="form-control" name="tournament_flyer" type="file">

                                <?php if($errors->has('tournament_flyer')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tournament_flyer')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Tournament
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