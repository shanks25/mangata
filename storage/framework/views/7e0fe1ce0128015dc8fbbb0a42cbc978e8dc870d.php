

<?php $__env->startSection('content'); ?>
 <div class="card">
    <div class="card-header">
        <?php if(Setting::get('DEMO_MODE')==1): ?>
        <div class="col-md-12" style="height:50px;color:red;">
            ** Demo Mode : No Permission to Edit and Delete.
        </div>
        <?php endif; ?>
        <h4 class="card-title">Notice Board</h4>
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
                        <th>Delivery Boy Name</th>
                        <th>Notice</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $NoticeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Index => $Notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php //print"<pre>";print_r($Order); exit;?>
                    <tr>
                        <td><?php echo e($Index + 1); ?></td>
                        <td><?php echo e(@$Notice->transporter->name); ?></td>
                        <td>
                            <?php echo @$Notice->notice; ?>

                        </td>
                        <td><?php echo e(@$Notice->created_at); ?></td>
                        <td>
                            <?php if(Setting::get('DEMO_MODE')==0): ?>
                             <a href="<?php echo e(route('admin.notice.edit', $Notice->id)); ?>" class="table-btn btn btn-icon btn-success"><i class="fa fa-pencil-square-o"></i></a>
                            <!-- <button  class="table-btn btn  btn-danger" onclick="return confirm('Do You want To Remove This Notice?');" form="resource-delete-<?php echo e($Notice->id); ?>" >Remove</button> -->
                            <?php endif; ?>
                            <form id="resource-delete-<?php echo e($Notice->id); ?>" action="<?php echo e(route('admin.notice.destroy',$Notice->id)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('DELETE')); ?>

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