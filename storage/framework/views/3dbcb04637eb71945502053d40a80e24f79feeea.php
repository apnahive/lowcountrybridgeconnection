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
        <a href="<?php echo e(route('classes.creates', Session::get('error_code') )); ?>"><button type="button" class="btn btn-primary">Yes</button></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>           
    </div>

  </div>
</div>

<div class="container" style="margin-top: 60px;">    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="<?php echo e(URL::previous()); ?>"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="<?php echo e(route('series.create')); ?>" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Create Series</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Series</div>
                <div class="panel-body">
                    <div class="row"  style="display: flex;">
                        <div class="col-md-2 wcol-md-2">#</div>
                        <div class="col-md-3 wcol-md-3">Series Name</div>
                        
                        <div class="col-md-7 wcol-md-7" style="text-align: center;">
                            <div class="col-md-3 wcol-md-3" style="margin: auto;">Add</div>
                            <div class="col-md-3 wcol-md-3" style="margin: auto;">View</div>
                            <div class="col-md-3 wcol-md-3" style="margin: auto;">Edit</div>
                            <div class="col-md-3 wcol-md-3" style="margin: auto;">Delete</div>
                        </div>
                    </div>
                    <hr class="mobline">
                    <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serieskey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        <div class="col-md-2 wcol-md-2"><?php echo e($value->id); ?></div>
                        <div class="col-md-3 wcol-md-3"><?php echo e($value->name); ?></div>
                        
                        <div class="col-md-7 wcol-md-7" style="text-align: center;">
                            <div class="col-md-3 wcol-md-3" style="margin: auto;"><a href="<?php echo e(route('series_class.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Classes</button></a></div>
                            <div class="col-md-3 wcol-md-3 button-top" style="margin: auto;"><a href="<?php echo e(route('series.show', $value->id)); ?>"><button type="button" class="btn btn-priamry">View</button></a></div>
                            <div class="col-md-3 wcol-md-3 button-top" style="margin: auto;"><a href="<?php echo e(route('series.edit', $value->id)); ?>"><button type="button" class="btn btn-priamry">Edit</button></a></div>
                            <div class="col-md-3 wcol-md-3 button-top" style="margin: auto;text-align: center;"> <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>">Delete</button></div>
                            <form id="<?php echo e($value->id); ?>" action="/seriess/delete/<?php echo e($value->id); ?>" method="DELETE" style="display: none;">
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
                                    You are going to delete Series. Are you sure? you won't be able to revert these changes!
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

<?php echo $__env->make('layouts.manage_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>