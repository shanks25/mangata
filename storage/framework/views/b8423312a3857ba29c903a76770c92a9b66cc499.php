

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
                <h4 class="card-title">Dispute Manager</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a href="<?php echo e(route('admin.dispute-user.create')); ?>" class="btn btn-primary add-btn btn-darken-3">Add Dispute Manager</a></li>
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
                                <th>Email</th>
                                <th>Contact Deatils</th>
                                <th>Ratings</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Indx => $User): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <td><?php echo e($Indx+1); ?></td>
                                    <td><?php echo e($User->name); ?></td>
                                    <td>
                                    <?php if(Setting::get('DEMO_MODE')==1): ?>
                                    <?php echo e($User->email); ?>

                                    <?php else: ?>
                                    <?php echo e(substr($User->email, 0, 1).'****'.substr($User->email, strpos($User->email, "@"))); ?>

                                    <?php endif; ?>
                                    </td>
                                    <td><?php echo e($User->phone); ?></td>
                                    <td class="star">
                                        <input type="hidden" class="rating" readonly value="3"/>
                                    </td>
                                    <td>
                                        <?php if(Setting::get('DEMO_MODE')==0): ?>
                                            <a href="<?php echo e(route('admin.dispute-user.edit', $User->id)); ?>" class="table-btn btn btn-icon btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                            <button   class="table-btn btn btn-icon btn-danger" form="resource-delete-<?php echo e($User->id); ?>" ><i class="fa fa-trash-o"></i></button>
                                        <?php endif; ?>
                                        <form id="resource-delete-<?php echo e($User->id); ?>" action="<?php echo e(route('admin.dispute-user.destroy', $User->id)); ?>" method="POST">
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
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>