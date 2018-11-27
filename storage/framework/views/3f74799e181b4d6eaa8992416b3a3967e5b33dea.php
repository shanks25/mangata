<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(Setting::get('site_title')); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo e(Setting::get('site_favicon', asset('favicon.ico'))); ?>">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/fonts/feather/style.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/fonts/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/fonts/flag-icon-css/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/vendors/css/extensions/pace.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/vendors/css/extensions/unslider.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/vendors/css/weather-icons/climacons.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/fonts/meteocons/style.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/vendors/css/charts/morris.css')); ?>">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/bootstrap-extended.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/app.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/colors.min.css')); ?>">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/core/menu/menu-types/vertical-menu.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/core/menu/menu-types/vertical-overlay-menu.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/fonts/simple-line-icons/style.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/core/colors/palette-gradient.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/pages/timeline.min.css')); ?>">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <!-- END Custom CSS-->
    <?php echo $__env->yieldContent('styles'); ?>
    <script>
        window.Sentikart = <?php echo json_encode(['csrfToken' => csrf_token(), 'map' => 'false']); ?>;
    </script>
</head>

<body>
    <?php echo $__env->yieldContent('content'); ?>
            
   <!-- BEGIN VENDOR JS-->
    <script src="<?php echo e(asset('assets/admin/vendors/js/vendors.min.js')); ?>" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <?php echo $__env->yieldContent('scripts'); ?>

    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>" type="text/javascript"></script>
</body>
</html>
