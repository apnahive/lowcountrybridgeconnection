<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Clubs</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo route('clubs.update', $clubs['id']); ?>">
                       <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                        <div class="form-group<?php echo e($errors->has('club_name') ? ' has-error' : ''); ?>">
                            <label for="club_name" class="col-md-4 control-label">Club Name</label>

                            <div class="col-md-6">
                                <input id="club_name" type="text" class="form-control" name="club_name" value="<?php echo e(old( 'club_name', $clubs['club_name'])); ?>" required autofocus>

                                <?php if($errors->has('club_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('club_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                            <label for="city" class="col-md-4 control-label">City Name</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="<?php echo e(old( 'city', $clubs['city'])); ?>" required autofocus>

                                <?php if($errors->has('city')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('city')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- <div class="form-group<?php echo e($errors->has('club_website') ? ' has-error' : ''); ?>">
                            <label for="club_website" class="col-md-4 control-label">Club Website</label>

                            <div class="col-md-6">
                                <input id="club_website" type="text" class="form-control" name="club_website" value="<?php echo e(old('club_website', $clubs['club_website'])); ?>" required autofocus>

                                <?php if($errors->has('club_website')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('club_website')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div> -->
                        <br/>
                        <div><p>Club Financial Officer Details</p></div>
                        <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name', $clubs['first_name'])); ?>" required autofocus>

                                <?php if($errors->has('first_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name', $clubs['last_name'])); ?>" required autofocus>

                                <?php if($errors->has('last_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('last_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="<?php echo e(old('email', $clubs['email'])); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
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

<?php echo $__env->make('layouts.unitadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>