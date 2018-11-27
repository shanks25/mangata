

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit User</h3>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('admin.users.update', $User->id)); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PATCH')); ?>

                <div class="form-group col-xs-12 mb-2">
                     <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name',$User->name)); ?>" required placeholder="Name" autofocus>

                    <?php if($errors->has('name')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-xs-12 mb-2">
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email',$User->email)); ?>" placeholder="E-Mail" required>

                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>  
                </div>
                <div class="form-group col-xs-12 mb-2">
                    <input id="password" type="password" class="form-control" name="password"   placeholder="Password">

                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-xs-12 mb-2">
                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" >
                </div>
                <div class="form-group col-xs-12 mb-2">
                    <input type="file" accept="image/*" name="avatar" class="dropify form-control" id="avatar" aria-describedby="fileHelp" >
                    <?php if($errors->has('avatar')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('avatar')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-xs-12 mb-2 contact-repeater">
                    <div data-repeater-list="repeater-group">
                        <div class="input-group mb-1" data-repeater-item>
                            <input id="phone" type="text" class="form-control" name="phone" value="<?php echo e(old('phone',$User->phone)); ?>" placeholder="Phone Number" required autofocus>

                            <?php if($errors->has('phone')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('phone')); ?></strong>
                                </span>
                            <?php endif; ?>
                            <span class="input-group-btn" id="button-addon2">
                                <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                            </span>
                        </div>
                    </div>
                   <!--  <button type="button" data-repeater-create class="btn btn-primary">
                        <i class="icon-plus4"></i> Add new phone number
                    </button> -->
                </div>
                <!-- <div class="form-group col-xs-12 mb-2">
                    <textarea rows="5" class="form-control" name="Address" placeholder="Address"></textarea>
                </div> -->
                <div class="col-xs-12 mb-2">
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-warning mr-1">
                        <i class="ft-x"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/dropify/dist/css/dropify.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/admin/plugins/dropify/dist/js/dropify.min.js')); ?>"></script>
<script type="text/javascript">
    $('.dropify').dropify();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>