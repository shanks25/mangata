

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Transporter Documents</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-body collapse in">
            <div class="card-block card-dashboard table-responsive">
                <table class="table table-striped table-bordered file-export">
                    <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Document Name</th>
                        <th>Document Type</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php //print"<pre>";print_r($Order); exit;?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e(@$document->name); ?></td>
                            <td>
                                <?php echo @$document->type; ?>

                            </td>
                            <td><?php echo e(@$document->created_at); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.documents.edit', $document->id)); ?>"
                                   class="table-btn btn btn-icon btn-success"><i class="fa fa-pencil-square-o"></i></a>

                                <form id="resource-delete-<?php echo e($document->id); ?>"
                                      action="<?php echo e(route('admin.documents.destroy', $document->id)); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                    <button class="table-btn btn  btn-danger"
                                            onclick="return confirm('Do You want To Remove This Document?');"
                                            form="resource-delete-<?php echo e($document->id); ?>">Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>