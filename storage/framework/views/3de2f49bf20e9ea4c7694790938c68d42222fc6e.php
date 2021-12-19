<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(route('unitgame.index')); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Edit Game</div>
                <div class="panel-body">
               
                     <form class="form-horizontal" role="form" method="POST" action="<?php echo route('unitgame.update', $games['id']); ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                       <div class="form-group<?php echo e($errors->has('game_name') ? ' has-error' : ''); ?>">
                            <label for="game_name" class="col-md-4 control-label">Game Name</label>

                            <div class="col-md-6">
                                <input id="game_name" type="text" class="form-control" name="game_name" value="<?php echo e(old( 'game_name', $games['game_name'])); ?>" required autofocus>

                                <?php if($errors->has('game_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('game_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('game_description') ? ' has-error' : ''); ?>">
                            <label for="game_description" class="col-md-4 control-label">Game Description</label>

                            <div class="col-md-6">
                                <textarea id="game_description" type="text" class="form-control" name="game_description"  required autofocus><?php echo $games->game_description; ?></textarea>

                                <?php if($errors->has('game_description')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('game_description')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="form-group<?php echo e($errors->has('manager_name') ? ' has-error' : ''); ?>">
                            <label for="manager_name" class="col-md-4 control-label">Manager Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="manager_name" name="manager_name">
                                      
                                        <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <option value="<?php echo e($manager->id); ?>" <?php echo e($games['manager_id'] === $manager->id ? 'selected' : ''); ?>><?php echo e($manager->name); ?>  --
                                            <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($manager->club_id == $club->id): ?>
                                                <?php echo e($club->club_name); ?>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                      
                                    </select>
                                </div>
                                <?php if($errors->has('manager_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('manager_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('game_date') ? ' has-error' : ''); ?>">
                            <label for="game_date" class="col-md-4 control-label">Game Date</label>

                            <div class="col-md-6">
                                <input id="game_date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="game_date" value="<?php echo e($games['game_date']); ?>" required autofocus>

                                <?php if($errors->has('game_date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('game_date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('start_time') ? ' has-error' : ''); ?>">
                            <label for="start_time" class="col-md-4 control-label">Start Time</label>

                            <div class="col-md-6">
                                <input type="text" onfocus="(this.type='time')" onblur="(this.type='text')" name="start_time" id="start_time" class="form-control" value="<?php echo e($games['start_time']); ?>" required autofocus>                              

                                <?php if($errors->has('start_time')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('start_time')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="form-group<?php echo e($errors->has('team_size') ? ' has-error' : ''); ?>">
                            <label for="class_size" class="col-md-4 control-label">Team Size</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="team_size" name="team_size">
                                      <option value="1" <?php echo e($games['team_size'] === 1 ? 'selected' : ''); ?>>Single</option>
                                      <option value="2" <?php echo e($games['team_size'] === 2 ? 'selected' : ''); ?>>Two-Person</option>
                                      <option value="4" <?php echo e($games['team_size'] === 4 ? 'selected' : ''); ?>>Four-Person</option>
                                    </select>
                                 </div>                                  

                                <?php if($errors->has('team_size')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('team_size')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- <div class="form-group<?php echo e($errors->has('tournament') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label"></label>

                            <div class="checkbox checkbox-inline" style="margin-left: 15px;">
                                <input type="hidden" name="tournament" value="false">
                                <input type="checkbox" id="tournament" name="tournament" value="true" style="margin-left: 0;">
                                <label for="tournament">It is a tournament.</label>


                                <?php if($errors->has('tournament')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tournament')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div> -->
                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
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