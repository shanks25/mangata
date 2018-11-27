

<?php $__env->startSection('content'); ?>

<!-- File export table -->
    <div class="row file">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                <?php if(Setting::get('DEMO_MODE')==1): ?>
                    <div class="col-md-12" style="height:50px;color:red;">
                        ** Demo Mode : No Permission to Edit and Delete.
                    </div>
                <?php endif; ?>
                    <h4 class="card-title">Products</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a href="<?php echo e(route('shop.products.create')); ?>" class="btn btn-primary add-btn btn-darken-3">Add Product</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard table-responsive">
                        <table class="table table-striped table-bordered file-export">
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Name</th>
                                    <th>Cuisine Name</th>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Index => $Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($Index+1); ?></td>
                                    <td><?php echo e($Product->name); ?></td>
                                    <td>    
                                            <?php $__currentLoopData = $Product->shop->cuisines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Cuisine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($Cuisine->name); ?>,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td><?php echo e(@$Product->categories[0]->name); ?></td>
                                    <td>
                                        <?php if(Setting::get('DEMO_MODE')==0): ?>
                                            <a href="<?php echo e(route('shop.products.edit', $Product->id)); ?>" class="table-btn btn btn-icon btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                            <button  class="table-btn btn btn-icon btn-danger" form="resource-delete-<?php echo e($Product->id); ?>" ><i class="fa fa-trash-o"></i></button>
                                            <form id="resource-delete-<?php echo e($Product->id); ?>" action="<?php echo e(route('shop.products.destroy', $Product->id)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h4>No categories in inventory</h4>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- File export table -->



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    $('.collapse').on('show.bs.collapse', function () {
        $('.collapse.in').collapse('hide');
        var pElement = $('[data-target="#' + $(this).attr('id') + '"]');
        pElement.find('span.glyphicon.glyphicon-menu-down').removeClass("glyphicon glyphicon-menu-down").addClass("glyphicon glyphicon-menu-up");
        
    });

    $('.collapse').on('hide.bs.collapse', function () {
        var pElement = $('[data-target="#' + $(this).attr('id') + '"]');
        pElement.find('span.glyphicon.glyphicon-menu-up').removeClass("glyphicon glyphicon-menu-up").addClass("glyphicon glyphicon-menu-down");
        
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>