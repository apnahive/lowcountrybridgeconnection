<?php $__env->startSection('content'); ?>



<div class="row full1">
    <div class="mid-section">
        <?php if(count($tournaments) > 0): ?>
        <div class="col-md-12"><img src="img/local.png" style="margin-top: 22px;margin-left: -30px;width: 100%;"></div>
        <div class="col-md-12 row" style="margin-top: 58px;padding-bottom: 58px;">
            <?php $__currentLoopData = $tournaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tournamentkey => $tournament): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if($loop->iteration%2 == 0): ?>
            <div class="col-md-6 text-right1">
                <h4 style="color: #937b22;word-wrap: break-word;"><?php echo e($tournament->name); ?></h4>
                <p style="padding-bottom: 16px;word-wrap: break-word;"><?php echo e($tournament->description); ?></p>
                <?php if($tournament->flyer1): ?>
                <a href="<?php echo e(route('tournamentflyer', $tournament->flyer1)); ?>" target="_blank">
                    <button class="btn btn-primary silver">View Flyer</button>
                </a>
                <?php endif; ?>
                <!-- <a href="<?php echo e($tournament->flyer); ?>"><button type="button" class="btn btn-primary silver">View Flyer</button></a> -->
            </div>
            <hr class="border-bottom" style="width: 100%;padding-top: 58px;">
                
            <?php else: ?>
            <div class="col-md-6 border-right text-left1 space-bottom">
                <h4 style="color: #937b22;word-wrap: break-word;"><?php echo e($tournament->name); ?></h4>
                <p style="padding-bottom: 16px;word-wrap: break-word;"><?php echo e($tournament->description); ?></p>
                <?php if($tournament->flyer1): ?>
                <a href="<?php echo e(route('tournamentflyer', $tournament->flyer1)); ?>" target="_blank">
                    <button class="btn btn-primary silver">View Flyer</button>
                </a>
                <?php endif; ?>
                <!-- <a href="<?php echo e($tournament->flyer); ?>"><button type="button" class="btn btn-primary silver">View Flyer</button></a> -->
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </div>
        <?php endif; ?>
        <?php if(count($special_games) > 0): ?>
        <div class="col-md-12"><img src="img/special.png" style="margin-top: 22px;margin-left: -30px;width: 100%;"></div>
        <div class="col-md-12" style="text-align: left;margin-top: 40px;margin-bottom: 40px;">
            
                <?php $__currentLoopData = $special_games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special_gameskey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row" style="padding-bottom: 12px;word-wrap: break-word;"><h4><i class="fa fa-check" style="color: #894343;"></i>&nbsp;&nbsp; <?php echo e($value->description); ?></h4></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                      
        </div>
         <?php endif; ?>  

    </div>
</div>


<?php if($counter === 0): ?>
<div class="row full1">
    <div class="mid-section">
        <div class="col-md-2"><img src="img/heart.jpg" style="margin-top: 22px;"></div>
        <div class="col-md-8"><h3 style="font-size: 20px;font-weight: 700;color: black; margin-top: 32px; border-bottom: 3px black solid;">LOCAL BRIDGE GAMES INFORMATION</h3></div>
        <div class="col-md-2"><img src="img/heart.jpg" style="margin-top: 22px;"></div>

    </div>
</div>
<?php endif; ?>
<div class="row full1">
    <div class="mid-section">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php if(count($value->clubs) > 0): ?>
                <div class="col-md-12"><img src="img/<?php echo e($value->name); ?>-games.png" style="margin-top: 22px;margin-left: -30px;width: 100%;"></div>
                <?php $__currentLoopData = $value->clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clubkey => $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($club->games) > 0): ?> 
                    <div class="col-md-12"><h3><?php echo e($club->club_name); ?></h3></div>
                    <div class="col-md-12">
                        <?php $__currentLoopData = $club->games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clubkey => $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo route('game_details.show', $game['id']); ?>" style="margin-right: 24px;"><button type="button" class="btn btn-primary outline" style="margin-bottom: 34px;margin-top: 21px;width: 170px;white-space: normal!important;height: 68px;"><?php echo e($game->game_name); ?></button></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <hr style="border-top: 1px solid rgb(35, 34, 34);width: 50%;">
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        
    </div>
</div>









<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>