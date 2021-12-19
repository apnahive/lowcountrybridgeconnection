<?php $__env->startSection('content'); ?>


<?php if(Session::get('error_code')): ?>
<script type="text/javascript">
$(function() {
    $('#popup1').modal('show');
});
</script>
<?php endif; ?>
<div id="popup1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Series Created</h4>
      </div>
      <div class="modal-body">
        <p>Do you wish to create class for the series.</p>
      </div> 
      <div class="modal-footer">
        <a href="<?php echo e(route('superclass.creates', Session::get('error_code') )); ?>"><button type="button" class="btn btn-primary">Yes</button></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>           
    </div>

  </div>
</div>


<div class="container" style="margin-top: 60px;">    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="<?php echo e(route('superseries.create')); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a new series</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Series</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-1 wcol-md-1">#</div> -->
                        <div class="col-md-4 wcol-md-4">Series Name</div>
                        <!-- <div class="col-md-3"></div> -->
                        <div class="col-md-8 wcol-md-8" style="text-align: center;">
                            <div class="col-md-3">Add</div>
                            <div class="col-md-3">View</div>
                            <div class="col-md-3">Edit</div>
                            <div class="col-md-3">Delete</div>

                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serieskey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        <!-- <div class="col-md-1 wcol-md-1"><?php echo e($value->id); ?></div> -->
                        <div class="col-md-4 wcol-md-4"><?php echo e($value->name); ?></div>
                        <!-- <div class="col-md-3"></div> -->
                        <div class="col-md-8 wcol-md-8" style="text-align: center;">
                            <div class="col-md-3"><a href="<?php echo e(route('superseries_class.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Classes</button></a></div>
                            <div class="col-md-3 button-top"><a href="<?php echo e(route('superseries.show', $value->id)); ?>"><button type="button" class="btn btn-priamry">Classes</button></a></div>
                            <div class="col-md-3 button-top"><a href="<?php echo e(route('superseries.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Edit</button></a></div>
                            <div class="col-md-3 button-top" style="text-align: center;"> <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>">Delete</button></div>
                            <form id="<?php echo e($value->id); ?>" action="/superseriess/delete/<?php echo e($value->id); ?>" method="DELETE" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            </form>
                            <div class="modal fade" id="confirm<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="text-align: left;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Series</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    You are going to delete Series. All the associated records will be deleted (i.e. Series enrollment). You won't be able to revert these changes!
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Series</button>
                                    <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
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
        </div>
    </div>
</div>
<!-- Footer -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.superadmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>