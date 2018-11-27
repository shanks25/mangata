

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo app('translator')->getFromJson('transporter.edit.title'); ?></h3>
        </div>
        <div class="card-body collapse in">
            <div class="card-block">
                <form class="form-horizontal" role="form" method="POST"
                      action="<?php echo e(route('admin.transporters.docs.update', [$transporterDoc->transporter_id , $transporterDoc->id])); ?>"
                      enctype="multipart/form-data">

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PATCH')); ?>



                    <div class="form-group col-xs-12 mb-2 contact-repeater">
                        <label>Status</label>
                        <div data-repeater-list="repeater-group">
                            <div class="input-group mb-1" data-repeater-item>
                                <?php echo e($transporterDoc->status); ?>

                            </div>
                        </div>
                    </div>


                    <div class="form-group col-xs-12 mb-2 contact-repeater">
                        <label>Document</label>
                        <div data-repeater-list="repeater-group">
                            <div class="input-group mb-1" data-repeater-item>
                                <img src="<?php echo e(url('storage/' . $transporterDoc->url)); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 mb-2">
                        <a href="<?php echo e(route('admin.transporters.docs.index', $transporterDoc->transporter_id)); ?>"
                           class="btn btn-warning mr-1">
                            <i class="ft-x"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Approve
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>