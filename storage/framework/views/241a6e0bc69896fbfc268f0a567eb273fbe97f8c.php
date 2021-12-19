<?php $__env->startSection('content'); ?>

        <!-- Portfolio Grid Section --> 
    <div class="row" style="width: 100%">
                    <div class="col-lg-12 text-center">
                        
                    <h2><?php echo e($user->name); ?>'s​ Dashboard</h2>
                     <hr class="star-primary">
                       
                    </div>
                </div>
        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img src="img/teacher.jpg">
                    <h5><?php echo e($user->name); ?></h5>
                        <hr class="star-primary">
                    </div>
                </div>
            <div class="row text-center">        
                 <div class="col-md-12"><a href="<?php echo e(route('manager.edit', $user->id)); ?>"><button type="button" class="btn btn-primary">Edit profile</button></a></div>
            </div>
        </section>
        
                </div>
            </div>
        </div>
    </div>
   
</div>
<br>
<br>

        <!-- Footer -->
        

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.manager_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>