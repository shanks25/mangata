

<?php $__env->startSection('content'); ?>
<div class="login bg-img" style="background-image: url(<?php echo e(asset('assets/img/login-bg.jpg')); ?>);">
        <div class="login-overlay"></div>
        <div class="login-content">
            
            <div class="login-content-inner">
                <div class="login-head">
                    <h1 class=""><?php echo e(Setting::get('site_title')); ?></h1>
                    <h3>Login to Your Account</h3>
                    <?php echo $__env->make('include.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/shop/login')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label>Email</label>
                         <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail Address" value="<?php echo e(old('email')); ?>" autofocus>
                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" placeholder="Password" name="password">
                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <button class="btn btn-primary btn-block">Login</button>
                    <a href="<?php echo e(url('/shop/password/reset')); ?>" class="forgot-link">Forgot Password?</a>
                    <a href="<?php echo e(url('/shop/register')); ?>" style="margin-left: 170px;" class="forgot-link">Signup</a>
                </form>
            </div>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>