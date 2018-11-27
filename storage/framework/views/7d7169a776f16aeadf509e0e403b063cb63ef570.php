

<?php $__env->startSection('content'); ?>
    <!-- File export table -->
    <div class="row file">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo app('translator')->getFromJson('transporter.index.enquiry'); ?></h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a href="<?php echo e(route('admin.transporters.create')); ?>"
                                   class="btn btn-primary add-btn btn-darken-3"><?php echo app('translator')->getFromJson('transporter.index.add_transporter'); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard table-responsive">
                        <table class="table table-striped table-bordered file-export">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('transporter.index.sl_no'); ?></th>
                                <th><?php echo app('translator')->getFromJson('transporter.index.name'); ?></th>
                                <th><?php echo app('translator')->getFromJson('transporter.index.email'); ?></th>
                                <th><?php echo app('translator')->getFromJson('transporter.index.address'); ?></th>
                                <th><?php echo app('translator')->getFromJson('transporter.index.contact_details'); ?></th>
                                <th><?php echo app('translator')->getFromJson('transporter.index.image'); ?></th>
                                <th><?php echo app('translator')->getFromJson('transporter.index.rating'); ?></th>
                                <th><?php echo app('translator')->getFromJson('transporter.index.tips'); ?></th>
                                <th><?php echo app('translator')->getFromJson('transporter.index.earning'); ?></th>
                                <th><?php echo app('translator')->getFromJson('transporter.index.status'); ?></th>
                                <th><?php echo app('translator')->getFromJson('transporter.index.action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$User): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($User->name); ?></td>
                                    <td>
                                        <?php if(Setting::get('DEMO_MODE')==0): ?>
                                            <?php echo e($User->email); ?>

                                        <?php else: ?>
                                            <?php echo e(substr($User->email, 0, 1).'****'.substr($User->email, strpos($User->email, "@"))); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($User->address); ?></td>
                                    <td><?php echo e($User->phone); ?></td>
                                    <td>
                                        <?php if($User->avatar): ?>
                                            <div class="bg-img com-img"
                                                 style="background-image: url(<?php echo e(asset($User->avatar)); ?>);"></div>
                                        <?php else: ?>
                                            No Image
                                        <?php endif; ?>
                                    </td>

                                    <td class="star">
                                        <?php for ($i = 1; $i <= $User->rating; $i++) {
                                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        }
                                        for ($i = 1; $i <= (5 - $User->rating); $i++) {
                                            echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                                        }
                                        ?>
                                    </td>

                                    <td> 10</td>
                                    <td> 10</td>

                                    <td>
                                        <?php if($User->is_active): ?>
                                            <a class="table-btn btn btn-icon btn-danger"
                                               href="<?php echo e(route('admin.transporter.disable', $User->id)); ?>">
                                                <i class="fa fa-times-circle"></i>
                                            </a>
                                        <?php else: ?>
                                            <a class="table-btn btn btn-icon btn-success"
                                               href="<?php echo e(route('admin.transporter.enable', $User->id)); ?>">
                                                <i class="fa fa-check-circle"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <a class="table-btn btn btn-icon btn-danger"
                                           href="<?php echo e(route('admin.transporters.docs.index', $User->id)); ?>">Documents
                                        </a>

                                        <?php if($User->status =='unsettled'): ?>
                                            <button class="table-btn btn btn-icon btn-danger"
                                                    form="resource-settle-<?php echo e($User->id); ?>">Unsettle
                                            </button>

                                            <form id="resource-settle-<?php echo e($User->id); ?>"
                                                  action="<?php echo e(route('admin.transporters.update', $User->id)); ?>"
                                                  method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('PATCH')); ?>

                                                <input type="hidden" name="settle" value="1"/>
                                            </form>
                                        <?php endif; ?>

                                        <a href="<?php echo e(route('admin.transporters.edit', $User->id)); ?>"
                                           class="table-btn btn btn-icon btn-success"><i
                                                    class="fa fa-pencil-square-o"></i></a>

                                        <button class="table-btn btn btn-icon btn-danger"
                                                form="resource-delete-<?php echo e($User->id); ?>"><i class="fa fa-trash-o"></i>
                                        </button>

                                        <form id="resource-delete-<?php echo e($User->id); ?>"
                                              action="<?php echo e(route('admin.transporters.destroy', $User->id)); ?>"
                                              method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                        </form>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td cols="50">No enquiry today</td>
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