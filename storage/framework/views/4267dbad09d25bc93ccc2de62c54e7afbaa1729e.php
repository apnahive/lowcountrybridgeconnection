<?php $__env->startSection('content'); ?>


<div class="row full1">
    <div class="mid-section">
        <div class="col-md-12"><img src="/img/game.png" style="margin-top: 22px;width: 100%"></div>
        <div class="col-md-12" style="margin-top: 72px;border: 1px black solid;text-align: left;">
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Game Name</div>
                <div class="col-md-8 table-space left-table"><?php echo e($games->game_name); ?></div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Game Description</div>
                <div class="col-md-8 table-space left-table"><?php echo e($games->game_description); ?></div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Game Date</div>
                <div class="col-md-8 table-space left-table"><?php echo e(date('m-d-Y', strtotime($games->game_date))); ?></div>
            </div>
            <div class="row">
                <div class="col-md-4 table-space" style="font-weight: 600;">Team Size</div>
                <div class="col-md-8 table-space left-table"><?php echo e($games->team_size); ?></div>
            </div>
        </div>

        <div class="col-md-12 buttonbox1" style="margin-top: 72px;margin-bottom: 72px;">
            <div class="col-md-6 wcol-md-6 listclass button-top" style="text-align: left;">
                <a href="<?php echo e(URL::previous()); ?>">
                    <button class="btn btn-primary silver">Back</button>
                </a>
            </div>
            <!-- <div class="col-md-4" style="text-align: center;">
                <a href="">
                    <button class="btn btn-primary silver">View Flyer</button>
                </a>
            </div> -->
            <div class="col-md-6 wcol-md-6 listclass button-top" style="text-align: right;">
                
                        <?php if($games->seats_available>0): ?>
                            <?php if( $games->team_size == 1 ): ?>
                                <form class="form-horizontal" role="form" method="POST" action="<?php echo route('game_enrollment.update', $games['id']); ?>">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">                                
                                <button type="submit" class="btn btn-primary silver">Enroll Now</button>
                                </form>
                            <?php elseif( $games->team_size == 2 ): ?>                                
                                <button type="button" class="btn btn-priamry silver" data-toggle="modal" data-target="#confirm2">Enroll Now</button>
                            <?php elseif( $games->team_size == 4 ): ?>                                
                                <button type="button" class="btn btn-priamry silver" data-toggle="modal" data-target="#confirm4">Enroll Now</button>
                            <?php endif; ?>   
                        <?php else: ?>              
                                <div class="col-md-12">
                                <p class="pull-right" style="font-size: 14px;">Seats are full</p></div>
                                <form class="form-horizontal" role="form" method="POST" action="<?php echo route('game_enrollment.update', $games['id']); ?>">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <div class="col-md-12"><button type="submit" class="btn btn-primary pull-right">
                                    Join waiting list
                                </button></div> 
                                </form>

                        <?php endif; ?>               
            </div>
        </div>
    </div>
</div>



<!--  for two players  -->

<div class="modal fade" id="confirm2" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="text-align: left;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add players</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="<?php echo route('game_enrollment.update', $games['id']); ?>">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group<?php echo e($errors->has('second_player') ? ' has-error' : ''); ?>">
                <label for="second_player" class="col-md-4 control-label">Second player Name</label>

                <div class="col-md-6">
                    <input id="second_player" type="text" class="form-control" name="second_player" value="<?php echo e(old('second_player')); ?>" required autofocus>

                    <?php if($errors->has('second_player')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('second_player')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Enroll Now
                    </button>
                </div>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="confirm4" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="text-align: left;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add players</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="<?php echo route('game_enrollment.update', $games['id']); ?>">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group<?php echo e($errors->has('second_player') ? ' has-error' : ''); ?>">
                <label for="second_player" class="col-md-4 control-label">Second player Name</label>

                <div class="col-md-6">
                    <input id="second_player" type="text" class="form-control" name="second_player" value="<?php echo e(old('second_player')); ?>" required autofocus>

                    <?php if($errors->has('second_player')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('second_player')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group<?php echo e($errors->has('third_player') ? ' has-error' : ''); ?>">
                <label for="third_player" class="col-md-4 control-label">Third player Name</label>

                <div class="col-md-6">
                    <input id="third_player" type="text" class="form-control" name="third_player" value="<?php echo e(old('third_player')); ?>" required autofocus>

                    <?php if($errors->has('third_player')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('third_player')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group<?php echo e($errors->has('forth_player') ? ' has-error' : ''); ?>">
                <label for="forth_player" class="col-md-4 control-label">Forth player Name</label>

                <div class="col-md-6">
                    <input id="forth_player" type="text" class="form-control" name="forth_player" value="<?php echo e(old('forth_player')); ?>" required autofocus>

                    <?php if($errors->has('forth_player')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('forth_player')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Enroll Now
                    </button>
                </div>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>