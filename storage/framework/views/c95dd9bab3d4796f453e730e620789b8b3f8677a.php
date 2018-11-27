

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Product</h3>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">

            <form role="form" method="POST" action="<?php echo e(route('shop.products.store')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="shop" value="<?php echo e(Auth::user()->id); ?>" />
                <div class="row">
                    <div class="col-md-6">
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

                        <div class="form-group<?php echo e($errors->has('category') ? ' has-error' : ''); ?>">
                            <label for="category">Category</label>

                            <select class="form-control" id="category" name="category">
                                
                                <?php $__currentLoopData = Request::user()->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($Category->id); ?>" ><?php echo e($Category->name); ?></option>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                            </select>
                            <?php if($errors->has('category')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('category')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
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

                        <div class="form-group<?php echo e($errors->has('product_position') ? ' has-error' : ''); ?>">
                            <label for="status"><?php echo app('translator')->getFromJson('inventory.product.product_position'); ?></label>

                            <input type="number" class="form-control" id="product_position" name="product_position"/>
                                

                            <?php if($errors->has('product_position')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('product_position')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                            <label for="image">Image</label>

                            <input type="file" accept="image/*" required name="image[]" class="dropify form-control" id="image" aria-describedby="fileHelp">

                            <?php if($errors->has('image')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('image')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('featured') ? ' has-error' : ''); ?>">
                            <label for="featured"><?php echo app('translator')->getFromJson('inventory.product.featured'); ?></label>
                            <input type="checkbox" class="form-control" id="featured" name="featured"/>
                            <label for="featured"><?php echo app('translator')->getFromJson('inventory.product.featured_position'); ?></label>
                            <input type="number" min="0" class="form-control" value="1" id="featured_position" name="featured_position"/>
                          

                            <?php if($errors->has('featured')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('featured')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('featured_image') ? ' has-error' : ''); ?>">
                            <label for="image"><?php echo app('translator')->getFromJson('inventory.product.featured_image'); ?></label>
                            <p><?php echo app('translator')->getFromJson('inventory.product.featured_image_note'); ?></p>

                            <input type="file" accept="image/*" required name="featured_image" class="dropify form-control" id="featured_image" aria-describedby="fileHelp">

                            <?php if($errors->has('featured_image')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('featured_image')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <h4 class="m-t-0 header-title">
                            <b>Pricing</b>
                        </h4>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                            <label for="price">Price</label>

                            <input id="price" type="text" class="form-control" name="price" value="<?php echo e(old('price')); ?>" required autofocus>

                            <?php if($errors->has('price')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('price')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('discount') ? ' has-error' : ''); ?>" style="display:none">
                            <label for="discount">Discount</label>

                            <input id="discount" type="text" class="form-control" name="discount" value="<?php echo e(old('discount', 0)); ?>" required autofocus>

                            <?php if($errors->has('discount')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('discount')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('discount_type') ? ' has-error' : ''); ?>" style="display:none">
                            <label for="discount_type">Discount Type</label>

                            <select class="form-control" id="discount_type" name="discount_type">
                                <option value="percentage">Percentage</option>
                                <option value="amount">Amount</option>
                            </select>

                            <?php if($errors->has('discount_type')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('discount_type')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <!-- <div class="form-group<?php echo e($errors->has('currency') ? ' has-error' : ''); ?>">
                            <label for="currency">Currency</label>

                            <select class="form-control" id="currency" name="currency">
                                <option value="₹">₹ - Rupee</option>
                                <option value="$">$ - Dollars</option>
                                <option value="£">£ - Sterling Pounds</option>
                            </select>

                            <?php if($errors->has('currency')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('currency')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div> -->

                       
                        <?php if(Setting::get('PRODUCT_ADDONS')==1): ?>
                        <div class="form-group<?php echo e($errors->has('addons') ? ' has-error' : ''); ?>">
                            <label for="addons"><?php echo app('translator')->getFromJson('inventory.product.addons'); ?></label>
                            <?php $__empty_1 = true; $__currentLoopData = $Addons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <p><input type="checkbox" name="addons[]" value="<?php echo e($addon->id); ?>"><?php echo e($addon->name); ?></p>
                            <p>Price</p>
                            <p><input type="text" class="form-control" name="addons_price[]" value="0"></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                            <?php if($errors->has('addons')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('addons')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-xs-12 mb-2">
                    <a href="<?php echo e(route('shop.products.index')); ?>" class="btn btn-warning mr-1">
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