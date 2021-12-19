<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row" style="display: flex;">
            <div class="col-md-2 wcol-md-2"><a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a></div>
            <div class="col-md-6 wcol-md-6"> 
            <form action="<?php echo route('playerunit.search'); ?>" method="POST" role="search" class="search-des">
                <?php echo e(csrf_field()); ?>

                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search players"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            </div>

            <div class="col-md-4 wcol-md-4"><a href="<?php echo e(route('playerunit.create')); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add New Student/Player</button></a></div>             
            </div>
            <div class="col-md-12 search-mob" style="margin-top: 26px;"> 
            <form action="<?php echo route('playerunit.search'); ?>" method="POST" role="search">
                <?php echo e(csrf_field()); ?>

                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search Students/Players"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            </div>




            <!-- <div class="row">
            <div class="col-md-2"><a href="<?php echo e(route('unitadmins.index')); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a></div>
            <div class="col-md-6"> 
            <form action="<?php echo route('playerunit.search'); ?>" method="POST" role="search">
                <?php echo e(csrf_field()); ?>

                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search players"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            </div>
            <div class="col-md-4"><a href="<?php echo e(route('playerunit.create')); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add New Unregistered User</button></a></div>
            </div>   -->                     
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Players/Students</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                       <!--  <div class="col-md-1"></div> -->
                        <div class="col-md-4 wcol-md-4">
                            Name
                        </div>
                        <div class="col-md-8 wcol-md-8" style="text-align: center">
                            <div class="col-md-6">Email/ACBL</div>
                            <div class="col-md-6" style="text-align: center;">                            
                                    Add to                            
                            </div>
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playerkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="row" style="margin-top: 15px;display: flex;">
                       
                        <div class="col-md-4 wcol-md-4"><?php echo e($value->name); ?> <?php echo e($value->lastname); ?></div>
                        <div class="col-md-8 wcol-md-8" style="text-align: center">

                            <div class="col-md-6" style="word-wrap: break-word;"><?php echo e($value->email); ?> <br> <?php echo e($value->acbl); ?> </div>
                            <div class="col-md-6" style="text-align: center">
                                <div class="col-md-6 button-top" style="text-align: center">
                                    <a href="<?php echo e(route('unitclass_subscription.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Series/Class</button></a>
                                </div>                            
                                <div class="col-md-6 button-top" style="text-align: center">
                                    <a href="<?php echo e(route('unitgame_subscription.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Game</button></a>
                                </div> 
                                <div class="col-md-12" style="text-align: center;margin-top: 9px!important;">
                                    <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm1<?php echo e($value->id); ?>">Delete</button>
                                </div>                            
                            </div>

                            <form id="<?php echo e($value->id); ?>" action="/playerunits/delete/<?php echo e($value->id); ?>" method="DELETE" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            </form>
                            <div class="modal fade" id="confirm1<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="text-align: left;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body"> 
                                    You are going to delete Member. Are you sure? you won't be able to revert these changes!
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Member</button>
                                    <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                  </div>
                                </div>
                              </div>
                            </div>


                        </div>
                    </div>  
                    <hr class="mobline">                                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userkey => $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="row" style="margin-top: 15px;display: flex;">
                     
                        <div class="col-md-4 wcol-md-4"><?php echo e($value1->name); ?> <?php echo e($value1->lastname); ?></div>
                        <div class="col-md-8 wcol-md-8" style="text-align: center">
                            <div class="col-md-6" style="word-wrap: break-word;"><?php echo e($value1->email); ?> <br> <?php echo e($value1->acbl); ?> </div>
                            <div class="col-md-6" style="text-align: center">
                                <div class="col-md-6 button-top" style="text-align: center">
                                    <a href="<?php echo e(route('unituserclass.edit', $value1->id)); ?>"><button type="button" class="btn btn-priamry">Series/Class</button></a>
                                </div>                            
                                <div class="col-md-6 button-top" style="text-align: center">
                                    <a href="<?php echo e(route('unitusergame.edit', $value1->id)); ?>"><button type="button" class="btn btn-priamry">Game</button></a>
                                </div>
                                <div class="col-md-12" style="text-align: center;margin-top: 9px!important;">
                                    <button type="button" class="btn btn-priamry"  data-toggle="modal" data-target="#confirm<?php echo e($value1->id); ?>">Delete</button>
                                </div>                           
                            </div>

                            <form id="<?php echo e($value1->id); ?>" action="/members/delete/<?php echo e($value1->id); ?>" method="DELETE" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            </form>
                            <div class="modal fade" id="confirm<?php echo e($value1->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value1->id); ?>" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="text-align: left;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body"> 
                                    You are going to delete Member. Are you sure? you won't be able to revert these changes!
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Member</button>
                                    <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value1->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                  </div>
                                </div>
                              </div>
                            </div>





                        </div>
                    </div>  
                    <hr class="mobline">                                      
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
                    
                </div>
            </div>
            <div class="col-md-12">  
                <?php if($players->total() > $users->total()): ?>
                    <?php echo $players->render(); ?>

                <?php else: ?>
                    <?php echo $users->render(); ?>

                <?php endif; ?>  
            </div>
            <a href="<?php echo e(route('user-report',['type'=>'xls'])); ?>"><button type="button" class="btn btn-lg btn-info">Download Report</button></a>
            <a href="<?php echo e(route('playerunit.show', 'upload-record')); ?>" class="pull-right" style="margin-bottom: 30px;">
            <button type="button" class="btn btn-lg btn-info">Upload Records</button></a>
            
            
            

        </div>
    </div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.unitadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>