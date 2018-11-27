

<?php $__env->startSection('content'); ?>
    <!-- File export table -->
    <div class="row file">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo app('translator')->getFromJson('transporter.index.title'); ?></h4>
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
                                <th>Document Type</th>
                                <th>Status</th>
                                <th><?php echo app('translator')->getFromJson('transporter.index.action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $transporterDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transporterDoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($transporterDoc->id); ?></td>
                                    <td><?php echo e($transporterDoc->document->name); ?></td>
                                    <td><?php echo e($transporterDoc['status']); ?></td>
                                    <td>

                                        <a href="<?php echo e(route('admin.transporters.docs.edit', $transporterDoc->id)); ?>"
                                           class="table-btn btn btn-icon btn-success"><i
                                                    class="fa fa-pencil-square-o"></i>
                                        </a>

                                        
                                        
                                        
                                        

                                        
                                        
                                        
                                        
                                        
                                        
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td cols="50">No document uploaded.</td>
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