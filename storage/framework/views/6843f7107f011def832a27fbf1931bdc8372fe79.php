<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
        <div class="main-menu-content">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li class=" navigation-header"><span>General</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
                </li>
                <li class="<?php if(Request::segment(2)=='home'): ?> active  <?php endif; ?> nav-item">
                    <a href="<?php echo e(route('shop.home')); ?>"><i class="ft-home"></i><span data-i18n="" class="menu-title"><?php echo app('translator')->getFromJson('menu.shop.dashboard'); ?></a>
                </li>
                <li class="<?php if(Request::segment(2)=='orders'): ?> active  <?php endif; ?> nav-item">
                    <a href="<?php echo e(url('shop/orders')); ?>?t=pending"><i class="ft-monitor"></i><span data-i18n="" class="menu-title"><?php echo app('translator')->getFromJson('menu.shop.dispatcher'); ?></span></a>
                </li>
                <li class=" nav-item"><a href="<?php echo e(route('shop.profile.index')); ?>"><i class="fa fa-cutlery"></i><span data-i18n="" class="menu-title"><?php echo app('translator')->getFromJson('menu.shop.restaurant'); ?></span></a>
                    
                </li>
                <?php if(Setting::get('PRODUCT_ADDONS')==1): ?>
                <li class=" nav-item"><a href="#"><i class="fa fa-shopping-bag"></i><span data-i18n="" class="menu-title"><?php echo app('translator')->getFromJson('menu.shop.addons'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('shop.addons.index')); ?>" class="menu-item"><?php echo app('translator')->getFromJson('menu.shop.addons_list'); ?></a></li>
                        <li><a href="<?php echo e(route('shop.addons.index')); ?>" class="menu-item"><?php echo app('translator')->getFromJson('menu.shop.add_addons'); ?></a></li>
                    </ul>
                </li>
                <?php endif; ?>
                 <li class=" nav-item"><a href="#"><i class="fa fa-shopping-bag"></i><span data-i18n="" class="menu-title"><?php echo app('translator')->getFromJson('menu.shop.category'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('shop.categories.index')); ?>" class="menu-item"><?php echo app('translator')->getFromJson('menu.shop.category_list'); ?></a></li>
                        <li><a href="<?php echo e(route('shop.categories.index')); ?>" class="menu-item"><?php echo app('translator')->getFromJson('menu.shop.add_category'); ?></a></li>
                    </ul>
                </li>
                 <li class=" nav-item"><a href="#"><i class="fa fa-shopping-bag"></i><span data-i18n="" class="menu-title"><?php echo app('translator')->getFromJson('menu.shop.product'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('shop.products.index')); ?>" class="menu-item"><?php echo app('translator')->getFromJson('menu.shop.product_list'); ?></a></li>
                        <li><a href="<?php echo e(route('shop.products.create')); ?>" class="menu-item"><?php echo app('translator')->getFromJson('menu.shop.add_product'); ?></a></li>
                    </ul>
                </li>
                <li class=" nav-item">
                    <a href="<?php echo e(route('shop.orders.index', ['list'=>'true'])); ?>"><i class="fa fa-shopping-basket"></i><span data-i18n="" class="menu-title"><?php echo app('translator')->getFromJson('menu.shop.deliveries'); ?></span></a>
                </li>
                <!-- <li class=" nav-item"><a href="#"><i class="fa fa-shopping-bag"></i><span data-i18n="" class="menu-title">Banner</span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('shop.banner.index')); ?>" class="menu-item">Banner</a></li>
                        <li><a href="<?php echo e(route('shop.banner.create')); ?>" class="menu-item">Add Banner</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>