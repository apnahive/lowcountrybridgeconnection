<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Edit Tournament</div>
                <div class="panel-body">
               
                     <form class="form-horizontal" role="form" method="POST" action="<?php echo route('unittournament.update', $tournaments['id']); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                       <div class="form-group<?php echo e($errors->has('tournament_name') ? ' has-error' : ''); ?>">
                            <label for="tournament_name" class="col-md-4 control-label">Tournament Name</label>

                            <div class="col-md-6">
                                <input id="tournament_name" type="text" class="form-control" name="tournament_name" placeholder="maximum 455 character" value="<?php echo e(old('tournament_name', $tournaments['name'])); ?>" required autofocus>

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
                                <textarea id="tournament_description" type="text" class="form-control" name="tournament_description" placeholder="maximum 2024 character" value="<?php echo e(old('tournament_description')); ?>" required autofocus><?php echo $tournaments->description; ?></textarea>

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
                                <!-- <input id="tournament_flyer" type="text" class="form-control" name="tournament_flyer" value="<?php echo e(old('tournament_flyer', $tournaments['flyer'])); ?>" required autofocus> -->
                                <?php if($flyer): ?>
                                <div class="col-md-12" style="margin-bottom: 12px;">
                                    <a href="<?php echo e(route('tournamentflyer', $flyer)); ?>" target="_blank"><?php echo e($flyer); ?></a>
                                </div>
                                <div class="col-md-12">
                                    <input id="tournament_flyer" style="visibility:hidden;" class="form-control inputfile" name="tournament_flyer" type="file">
                                    <label for="tournament_flyer" class="btn" style="border:  1px black solid;margin-top: -52px;"><span>Change Flyer</span></label>
                                </div>
                                <div class="col-md-12">
                                    

                                    <button type="button" class="btn" data-toggle="modal" data-target="#confirm<?php echo e($tournaments->id); ?>" style="border:  1px black solid;">Delete</button>
                                    
                                    <div class="modal fade" id="confirm<?php echo e($tournaments->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($tournaments->id); ?>" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="text-align: left;">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Flyer</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            You are going to delete Tournament flyer. You won't be able to revert the changes!
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Flyer</button>
                                            <a href="<?php echo e(route('unittournament.flyer', $tournaments['id'])); ?>"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>



                                </div>
                                <?php else: ?>
                                <div class="col-md-12">
                                    <input id="tournament_flyer" style="visibility:hidden;" class="form-control inputfile" name="tournament_flyer" type="file">
                                    <label for="tournament_flyer" class="btn" style="border:  1px black solid;margin-top: -52px;"><span>Add Flyer</span></label>
                                </div>

                                <?php endif; ?>

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