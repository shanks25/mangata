

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
                    <h4 class="card-title"><?php echo app('translator')->getFromJson('user.index.title'); ?></h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <!-- <li><a href="<?php echo e(route('admin.transporters.create')); ?>" class="btn btn-primary add-btn btn-darken-3">Add Delivery People</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard table-responsive">
                        <table class="table table-striped table-bordered file-export">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('user.index.sl_no'); ?></th>
                                <th><?php echo app('translator')->getFromJson('user.index.name'); ?></th>
                                <th><?php echo app('translator')->getFromJson('user.index.email'); ?></th>
                                <th><?php echo app('translator')->getFromJson('user.index.image'); ?></th>
                                <th><?php echo app('translator')->getFromJson('user.index.contact_details'); ?></th>
                                <th><?php echo app('translator')->getFromJson('user.index.rating'); ?></th>
                                <th><?php echo app('translator')->getFromJson('user.index.status'); ?></th>
                                <th><?php echo app('translator')->getFromJson('user.index.action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$User): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($User->name); ?></td>
                                    <td>
                                        <?php if(Setting::get('DEMO_MODE')==1): ?>
                                            <?php echo e($User->email); ?>

                                        <?php else: ?>
                                            <?php echo e(substr($User->email, 0, 1).'****'.substr($User->email, strpos($User->email, "@"))); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($User->avatar): ?>
                                            <div class="bg-img com-img"
                                                 style="background-image: url(<?php echo e(asset($User->avatar)); ?>);"></div>
                                        <?php else: ?>
                                            No Image
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($User->phone); ?></td>
                                    <td class="star">
                                        <input type="hidden" class="rating" readonly value="3"/>
                                    </td>
                                    <td>
                                        <?php if(Setting::get('DEMO_MODE')==0): ?>
                                            <a href="<?php echo e(route('admin.users.edit', $User->id)); ?>"
                                               class="table-btn btn btn-icon btn-success"><i
                                                        class="fa fa-pencil-square-o"></i></a>
                                            <button class="table-btn btn btn-icon btn-danger"
                                                    form="resource-delete-<?php echo e($User->id); ?>"><i class="fa fa-trash-o"></i>
                                            </button>
                                        <?php endif; ?>
                                        <form id="resource-delete-<?php echo e($User->id); ?>"
                                              action="<?php echo e(route('admin.users.destroy', $User->id)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="50"><?php echo app('translator')->getFromJson('user.index.no_record_found'); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>