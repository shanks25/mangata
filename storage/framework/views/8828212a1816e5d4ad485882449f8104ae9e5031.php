

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Category</h3>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <form role="form" method="POST" action="<?php echo e(route('shop.categories.store')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <label for="name">Name</label>

                    <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                    <?php if($errors->has('name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('name')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>

                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <label for="description">Description</label>

                    <textarea class="form-control" id="description" name="description" rows="3" required><?php echo e(old('description')); ?></textarea>

                    <?php if($errors->has('description')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('description')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group<?php echo e($errors->has('shop_id') ? ' has-error' : ''); ?>">
                    <label for="parent_id">Shop: <?php if(Auth::user()->id): ?> <?php echo e(\App\Shop::find(Auth::user()->id)->name); ?> <?php endif; ?></label>
                    <input name="shop_id" type="hidden" value="<?php echo e(Auth::user()->id); ?>" />
                    <?php if($errors->has('shop_id')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('shop_id')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                 <?php if(Setting::get('SUB_CATEGORY',0)): ?>
                 <div class="form-group<?php echo e($errors->has('parent_id') ? ' has-error' : ''); ?>">
                    <label for="parent_id">Parent</label>

                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="0">None</option>
                        <?php $__empty_1 = true; $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <option value="<?php echo e($Category->id); ?>"><?php echo e($Category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <option value="0">None</option>
                        <?php endif; ?>
                    </select>

                    <?php if($errors->has('parent_id')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('parent_id')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                    <label for="status">Status</label>

                    <select class="form-control" id="status" name="status">
                        <option value="enabled">Enabled</option>
                        <option value="disabled">Disabled</option>
                    </select>

                    <?php if($errors->has('status')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('status')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('position') ? ' has-error' : ''); ?>">
                    <label for="status"><?php echo app('translator')->getFromJson('inventory.category.position'); ?></label>
                    <input type="number" class="form-control" value="" id="position" name="position"/>
                        <?php if($errors->has('position')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('position')); ?></strong>
                            </span>
                        <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                    <label for="image">Image</label>

                    <input type="file" accept="image/*" name="image" class="dropify" id="image" aria-describedby="fileHelp">

                    <?php if($errors->has('image')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('image')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                 <div class="col-xs-12 mb-2">
                    <a href="<?php echo e(route('shop.categories.index')); ?>" class="btn btn-warning mr-1">
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
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/multiselect/css/multi-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/dropify/dist/css/dropify.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/admin/plugins/multiselect/js/jquery.multi-select.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/admin/plugins/dropify/dist/js/dropify.min.js')); ?>"></script>
<script type="text/javascript">
    $('#categories').multiSelect({ selectableOptgroup: true });
    $('.dropify').dropify();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>