<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a> 
            <?php if($games->game_status == 1): ?>
            <div class="pull-right">
                <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#confirm<?php echo e($games->id); ?>">Cancel</button>
            </div>


            <form id="<?php echo e($games->id); ?>" action="/unitgame_subscriptionss/delete/<?php echo e($games->id); ?>" method="DELETE" style="display: none;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            </form>
            <div class="modal fade" id="confirm<?php echo e($games->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($games->id); ?>" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content" style="text-align: left;">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel Game</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    You are going to Cancel Game. Are you sure? you won't be able to revert these changes!
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Game</button>
                    <a onclick="event.preventDefault(); document.getElementById( <?php echo e($games->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Cancel it</button></a>
                  </div>
                </div>
              </div>
            </div>


            <?php endif; ?>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Games Details <?php if($games->game_status == 0): ?><span class="pull-right">Game Cancelled</span><?php endif; ?></div>
                <div class="panel-body" style="font-size: 19px;">               
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Game Name:</div>
                        <div class="col-md-6 wcol-md-6"><?php echo e($games->game_name); ?></div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Club Name:</div>
                        <div class="col-md-6 wcol-md-6"> <?php echo e($games->club_name); ?> </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata" style="word-wrap: break-word;">Game Description:</div>
                        <div class="col-md-6 wcol-md-6"><?php echo e($games->game_description); ?></div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata" style="word-wrap: break-word;">Manager Name</div>
                        <div class="col-md-6 wcol-md-6"><?php echo e($games->manager); ?></div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Game Date:</div>
                        <div class="col-md-6 wcol-md-6"><?php echo e(date('m-d-Y', strtotime($games->game_date))); ?></div>
                    </div>
                    
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Team Size:</div>
                        <div class="col-md-6 wcol-md-6"><?php echo e($games->team_size); ?></div>
                    </div>                    
                    
                    
                </div>                
            </div>
            <?php if($games->game_status == 1): ?><a href="<?php echo e(route('unitgame.edit', $games->id)); ?>"><button type="button" class="btn btn-lg btn-info">Edit</button></a><?php endif; ?>
            <div class="pull-right">
               <a href="<?php echo e(route('unitgamewaiting.show', $games->id)); ?>"><button type="button" class="btn btn-lg btn-info">Waiting List</button></a>
               
            </div>
        </div>
    </div>
    <div class="row" style="height: 10px;"></div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.unitadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>