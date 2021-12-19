<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Add Student to Class</div>
                <div class="panel-body">

                    <div class="container" style="width: 100%;">
                    <div class="row" style="width: 100%;">
                        <div class="col-lg-12 bhoechie-tab-container" style="margin: 0;">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                              <div class="list-group">
                                <a href="#" class="list-group-item active text-center">
                                  <h4 class="fa fa-file"></h4><br/>Add to Class
                                </a>
                                <a href="#" class="list-group-item text-center">
                                  <h4 class="fa fa-files-o"></h4><br/>Add to Series
                                </a>
                               </div> 
                              </div>

                              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                                <div class="bhoechie-tab-content active">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <!-- add form here -->
                                        <form class="form-horizontal" role="form" method="POST" action="<?php echo route('unituserclass.update', $user['id']); ?>">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                        <div class="form-group">
                                            <label for="player_name" class="col-md-4 control-label">Player Name</label>
                                            <div class="col-md-6">
                                                <label for="class_name" class="control-label"> <?php echo e($user->name); ?> </label>
                                                <label for="class_name" class="control-label"> <?php echo e($user->lastname); ?> </label>
                                            </div>
                                        </div>

                                        <div class="form-group<?php echo e($errors->has('class_name') ? ' has-error' : ''); ?>">
                                            <label for="class_name" class="col-md-4 control-label">Class Name</label>

                                            <div class="col-md-6">
                                                <div class="form-group" style="margin: 0;">                                    
                                                    <select class="custom-select form-control" id="class_name" name="class_name">
                                                      <option selected>Choose...</option>
                                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                            <h1><option value="<?php echo e($class->id); ?>"><?php echo e($class->class_name); ?></h1>
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
                                                    Add to Class
                                                </button>

                                                
                                            </div>
                                        </div>
                                    </form>

                                     </div>
                                  </div> 
                                </div> 

                                <div class="bhoechie-tab-content">
                                  <div class="row">
                                    <div class="col-md-12"> 
                                        <!-- add form here --> 
                                        <form class="form-horizontal" role="form" method="POST" action="<?php echo route('unituserclass.update', $user['id']); ?>">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                        <div class="form-group">
                                            <label for="player_name" class="col-md-4 control-label">Player Name</label>
                                            <div class="col-md-6">
                                                <label for="class_name" class="control-label"> <?php echo e($user->name); ?> </label>
                                                <label for="class_name" class="control-label"> <?php echo e($user->lastname); ?> </label>
                                            </div>
                                        </div>

                                        <div class="form-group<?php echo e($errors->has('series_name') ? ' has-error' : ''); ?>">
                                            <label for="series_name" class="col-md-4 control-label">Series Name</label>

                                            <div class="col-md-6">
                                                <div class="form-group" style="margin: 0;">                                    
                                                    <select class="custom-select form-control" id="series_name" name="series_name">
                                                      <option selected>Choose...</option>
                                                        <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                            <h1><option value="<?php echo e($serie->id); ?>"><?php echo e($serie->name); ?></h1>
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
                     </div>
                </div>
               
                    <!-- <form class="form-horizontal" role="form" method="POST" action="<?php echo route('unituserclass.update', $user['id']); ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                        <div class="form-group">
                            <label for="player_name" class="col-md-4 control-label">Player Name</label>
                            <div class="col-md-6">
                                <label for="class_name" class="control-label"> <?php echo e($user->name); ?> </label>
                                <label for="class_name" class="control-label"> <?php echo e($user->lastname); ?> </label>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('class_name') ? ' has-error' : ''); ?>">
                            <label for="class_name" class="col-md-4 control-label">Class Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="class_name" name="class_name">
                                      <option selected>Choose...</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <h1><option value="<?php echo e($class->id); ?>"><?php echo e($class->class_name); ?></h1>
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
                                    Add to Class
                                </button>

                                
                            </div>
                        </div>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.unitadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>