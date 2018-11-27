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
                    <h4 class="card-title">Categories</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a href="<?php echo e(route('shop.categories.create')); ?>"
                                   class="btn btn-primary add-btn btn-darken-3">Add Category</a></li>
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
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $users->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                 <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($Category->name); ?></td>
                                    <td>
                                        <?php if(Setting::get('SUB_CATEGORY',0)): ?>
                                            <a href="<?php echo e(url('shop/subcategory?category='.$Category->id)); ?>">Sub
                                                Category</a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('shop.categories.edit', $Category->id)); ?>"
                                           class="table-btn btn btn-icon btn-success"><i
                                                    class="fa fa-pencil-square-o"></i></a>
                                        <button class="table-btn btn btn-icon btn-danger"
                                                form="resource-delete-<?php echo e($Category->id); ?>"><i class="fa fa-trash-o"></i>
                                        </button>

                                        <form id="resource-delete-<?php echo e($Category->id); ?>"
                                              action="<?php echo e(route('shop.categories.destroy', $Category->id)); ?>"
                                              method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                        </form>
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

<?php echo $__env->make('shop.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>