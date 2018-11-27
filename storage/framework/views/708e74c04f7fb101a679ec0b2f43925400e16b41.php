<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" navigation-header"><span>General</span><i data-toggle="tooltip" data-placement="right"
                                                                  data-original-title="General" class=" ft-minus"></i>
            </li>
            <li class="<?php if(Request::segment(2)=='home'): ?> active  <?php endif; ?> nav-item">
                <a href="<?php echo e(route('admin.home')); ?>"><i class="ft-home"></i><span data-i18n=""
                                                                                 class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.dashboard'); ?>
                </a>
            </li>
            <li class="<?php if(Request::segment(2)=='orders'): ?> active  <?php endif; ?> nav-item">
                <a href="<?php echo e(route('admin.orders.index')); ?>?t=pending"><i class="ft-monitor"></i><span data-i18n=""
                                                                                                      class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.dispatcher'); ?></span></a>
            </li>
            <?php if(@Auth::user()->hasRole('Admin')): ?>
                <li class="nav-item <?php if(Request::segment(2)=='disputes'): ?> active  <?php endif; ?>  has-open">
                    <a href="#">
                        <i class="fa fa-handshake-o"></i>
                        <span data-i18n="" class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.dispute'); ?></span>
                    </a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(url('admin/disputes/user')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.user_dispute'); ?></a></li>
                        <li><a href="<?php echo e(url('admin/disputes/deliverypeople')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.db_dispute'); ?></a></li>
                        <li><a href="<?php echo e(url('admin/disputes/shop')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.shop_dispute'); ?></a></li>
                        <li><a href="<?php echo e(url('admin/disputehelp')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.help_dispute'); ?></a></li>

                    </ul>
                </li>
                <li class="<?php if(Request::segment(2)=='shops'): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                class="fa fa-cutlery"></i><span data-i18n=""
                                                                class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.restaurant'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('admin.shops.index')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.list_restaurant'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.shope.enquiry')); ?>"
                               class="menu-item">Shop Enquiry Request</a></li>
                        <li><a href="<?php echo e(route('admin.shops.create')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.add_restaurant'); ?></a></li>
                    </ul>
                </li>
                <li class="<?php if(Request::segment(2)=='transporters'): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                class="fa fa-users"></i><span data-i18n=""
                                                              class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.delivery_boy'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('admin.transporters.index')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.list_delivery_boy'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.transporters.enquiry')); ?>"
                               class="menu-item">Delivery People Enquiry</a></li>

                        <li><a href="<?php echo e(route('admin.transporters.create')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.add_delivery_boy'); ?></a></li>
                        <li><a href="<?php echo e(url('admin/transporters-shift')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.list_delivery_boy_shift'); ?></a></li>
                    </ul>
                </li>
                <li class="<?php if(Request::segment(2)=='dispute-user'): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                class="fa fa-users"></i><span data-i18n=""
                                                              class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.dispute_manager'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('admin.dispute-user.index')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.list_dispute_manager'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.dispute-user.create')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.add_dispute_manager'); ?></a></li>
                    </ul>
                </li>
                <li class="<?php if(Request::segment(2)=='cuisines'): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                class="fa fa-shopping-bag"></i><span data-i18n=""
                                                                     class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.cuisines'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('admin.cuisines.index')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.list_cuisines'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.cuisines.create')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.add_cuisines'); ?></a></li>
                    </ul>
                </li>
                <li class="<?php if(Request::segment(2)=='promocodes'): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                class="fa fa-shopping-bag"></i><span data-i18n=""
                                                                     class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.promocode'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('admin.promocodes.index')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.list_promocode'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.promocodes.create')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.add_promocode'); ?></a></li>
                    </ul>
                </li>
                <li class="<?php if(Request::segment(2)=='documents'): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                class="fa fa-shopping-bag"></i>
                        <span data-i18n="" class="menu-title">Documents</span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('admin.documents.index')); ?>"
                               class="menu-item">List Documents</a></li>
                        <li><a href="<?php echo e(route('admin.documents.create')); ?>"
                               class="menu-item">Create Document</a></li>
                    </ul>
                </li>
                <li class="<?php if(Request::segment(2)=='banner'): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                class="fa fa-shopping-bag"></i><span data-i18n=""
                                                                     class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.resturant_banner'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('admin.banner.index')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.list_resturant_banner'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.banner.create')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.add_resturant_banner'); ?></a></li>
                    </ul>
                </li>
                <li class="<?php if(Request::segment(2)=='notice'): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                class="fa fa-shopping-bag"></i><span data-i18n=""
                                                                     class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.notice_board'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('admin.notice.index')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.list_notice_board'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.notice.create')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.add_notice_board'); ?></a></li>
                        <li><a href="<?php echo e(url('admin/send/push')); ?>" class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.custom_push'); ?></a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if(Request::segment(2)=='users'): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                class="fa fa-shopping-bag"></i><span data-i18n=""
                                                                     class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.customer'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('admin.users.index')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.list_customer'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.users.create')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.add_customer'); ?></a></li>
                    </ul>
                </li>

                <li class="<?php if(Request::segment(2)=='users'): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                class="fa fa-shopping-bag"></i><span data-i18n=""
                                                                     class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.pages'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('admin.about')); ?>" class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.about'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.faq')); ?>" class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.faq'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.privacy')); ?>" class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.privacy'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.contact')); ?>" class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.contact'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.terms')); ?>" class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.terms'); ?></a></li>
                    </ul>
                </li>
                <li class="<?php if(Request::segment(2)==''): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                class="fa fa-shopping-bag"></i><span data-i18n=""
                                                                     class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.lead'); ?></span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo e(route('admin.leadres')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.list_restuarant'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.enquiry_delivery')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.list_transporters'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.newsletter')); ?>"
                               class="menu-item"><?php echo app('translator')->getFromJson('menu.admin.list_newsletter'); ?></a></li>
                    </ul>
                </li>



                <li class="<?php if(@Request::get('list')==true): ?> active  <?php endif; ?> nav-item">
                    <a href="<?php echo e(route('admin.orders.index', ['list'=>'true'])); ?>"><i
                                class="fa fa-shopping-basket"></i><span data-i18n=""
                                                                        class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.delivery'); ?></span></a>
                </li>


                <?php if(in_array(url('/'),['http://foodie.appoets.co'])): ?>
                    <li class="<?php if(Request::segment(2)=='demoapp'): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                    class="fa fa-shopping-bag"></i><span data-i18n=""
                                                                         class="menu-title">Manage App</span></a>
                        <ul class="menu-content">
                            <li><a href="<?php echo e(route('admin.demoapp.index')); ?>" class="menu-item">App List</a></li>
                            <li><a href="<?php echo e(route('admin.demoapp.create')); ?>" class="menu-item">Add Demo</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if(Setting::get('DEMO_MODE') == 0): ?>
                    <li class=" nav-item">
                        <a href="<?php echo e(route('admin.translation.index')); ?>"><i class="fa fa-shopping-basket"></i><span
                                    data-i18n="" class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.translation'); ?></span></a>
                    </li>
                    <li class="<?php if(Request::segment(2)=='settings'): ?> active  <?php endif; ?> nav-item"><a href="#"><i
                                    class="fa fa-cog"></i><span data-i18n=""
                                                                class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.setting'); ?></span></a>
                        <ul class="menu-content">
                            <li><a href="<?php echo e(route('admin.settings')); ?>">
                                    <i class="fa fa-cog"></i>
                                    <span data-i18n=""
                                          class="menu-title"><?php echo app('translator')->getFromJson('menu.admin.site_setting'); ?>
                                </a></li>

                        </ul>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>