<?php $__env->startSection('content'); ?>
 <!-- Content Wrapper Starts -->
        <div class="content-wrapper">
            <!-- Intro Banner Starts -->
            <div class="intro-banner-outer section">
                <div class="container">
                    <div class="intro-slide">
                        <?php $__empty_1 = true; $__currentLoopData = $BannerImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <!-- Intro Box Starts -->
                            <?php if($Shop->status == 'active'): ?>
                        <a href="<?php echo e(url('/restaurant/details')); ?>?name=<?php echo e($Shop->shop->name); ?>" class="intro-box">
                            <div class="intro-banner-img bg-img" style="background-image: url(<?php echo e($Shop->url); ?>);"></div>
                        </a>
                            <?php endif; ?>
                        <!-- Intro Box Ends -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <!-- Intro Box Starts -->
                        <a href="" class="intro-box">
                            <div class="intro-banner-img bg-img" style="background-image: url(<?php echo e(asset('assets/user/img/banner-2.jpg')); ?>);"></div>
                        </a>
                        <!-- Intro Box Ends -->
                        <?php endif; ?>
                        
                        
                    </div>
                </div>
            </div>
            <!-- Intro Banner Ends -->
             <!-- Food Section Starts -->
            <div class="food-section-outer">
                <div class="container">
                    <div class="food-section row" id="filter-menu">
                        <!-- Food Section Left Starts -->
                        <div class="food-sec-left col-md-3 col-sm-4 col-xs-12">
                            <!-- Restaurant Filters Starts -->
                            <div class="restaurant-filters">
                                <!-- Restaurant Filter Box Starts -->
                                <a href="#popular" class="res-filter-box filter-scroll-menu active">
                                    <span class="res-filter-icon"><i class="ion-fireball"></i></span>
                                    <span class="res-filter-txt">
                                        <h6 class="res-filter-name">Popular</h6>
                                        <p class="res-filter-option">
                                        <?php @$Popularity = @$Shops_popular->Popularity(); ?>
                                        <?php echo e(count($Popularity)); ?> Options</p>
                                    </span>
                                </a>
                                <!-- Restaurant Filter Box Ends -->
                                <!-- Restaurant Filter Box Starts -->
                                <a href="#fast" class="res-filter-box filter-scroll-menu">
                                    <span class="res-filter-icon"><i class="ion-ios-timer-outline"></i></span>
                                    <span class="res-filter-txt">
                                        <h6 class="res-filter-name">Super Fast Delivery</h6>
                                        <p class="res-filter-option">
                                         <?php @$Fastdelivery = @$Shops_superfast->Fastdelivery(); ?>
                                        <?php echo e(count(@$Fastdelivery)); ?> Options</p>
                                    </span>
                                </a>
                                <!-- Restaurant Filter Box Ends -->
                                <!-- Restaurant Filter Box Starts -->
                                <a href="#offers" class="res-filter-box filter-scroll-menu">
                                    <span class="res-filter-icon"><i class="fa fa-gift"></i></span>
                                    <span class="res-filter-txt">
                                        <h6 class="res-filter-name">Offers Around You</h6>
                                        <p class="res-filter-option">
                                        <?php @$Offers = @$Shops_offers->Offers(); ?>
                                        <?php echo e(count(@$Offers)); ?> Options</p>
                                    </span>
                                </a>
                                <!-- Restaurant Filter Box Ends -->
                                <!-- Restaurant Filter Box Starts -->
                                <a href="#vegetarian" class="res-filter-box filter-scroll-menu">
                                    <span class="res-filter-icon"><i class="fa fa-envira"></i></span>
                                    <span class="res-filter-txt">
                                        <h6 class="res-filter-name">Vegetarian Options</h6>
                                        <p class="res-filter-option">
                                        <?php @$vegiterian = @$Shops_vegiterian->Veg(); ?>
                                        <?php echo e(count(@$$vegiterian)); ?> Options</p>
                                    </span>
                                </a>
                                <!-- Restaurant Filter Box Ends -->
                                <!-- Restaurant Filter Box Starts -->
                                <a href="#whats-new" class="res-filter-box filter-scroll-menu">
                                    <span class="res-filter-icon"><i class="ion-android-restaurant"></i></span>
                                    <span class="res-filter-txt">
                                        <h6 class="res-filter-name">What's New</h6>
                                        <p class="res-filter-option">
                                        <?php @$whats_new = @$Shops_new->Newshop(); ?>
                                         <?php echo e(count($whats_new)); ?> Options</p>
                                    </span>
                                </a>
                                <!-- Restaurant Filter Box Ends -->
                                <!-- Restaurant Filter Box Starts -->
                                <a href="#see-all" class="res-filter-box filter-scroll-menu">
                                    <span class="res-filter-icon"><i class="ion-arrow-down-c"></i></span>
                                    <span class="res-filter-txt">
                                        <h6 class="res-filter-name">See All</h6>
                                        <p class="res-filter-option"><?php echo e($restaurants->count()); ?> Restaurants</p>
                                    </span>
                                </a>
                                <!-- Restaurant Filter Box Ends -->
                            </div>
                            <!-- Restaurant Filters Ends -->
                        </div>
                        <!-- Food Section Left Ends -->
                        <!-- Food Section Right Starts -->
                        <div class="food-sec-right col-md-9 col-sm-8 col-xs-12">
                            <!-- Restaurant Filter List Starts -->
                            <div class="res-filter-list-section" id="popular">
                                <!-- Restaurant Filter Head Starts -->
                                <div class="res-filter-list-head">
                                    <h5>Popular</h5>
                                </div>

                                 <div class="restaurant-list row">
                                <!-- Restaurant Filter Head Ends -->
                                <?php $__empty_1 = true; $__currentLoopData = @$Popularity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <!-- Restaurant List Starts -->
                               
                                    <!-- Restaurant List Box Starts -->
                                    <a href="<?php echo e(url('/restaurant/details')); ?>?name=<?php echo e($Shop->name); ?>" class="food-item-box col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <div class="food-img bg-img" style="background-image: url(<?php echo e($Shop->avatar); ?>);"></div>
                                        <div class="food-details">
                                            <h6 class="food-det-tit"><?php echo e($Shop->name); ?></h6>
                                            <p class="food-det-txt"><?php echo e($Shop->description); ?></p>
                                            <div class="food-other-details row">
                                                <div class="col-xs-3 p-r-0">
                                                    <span class="food-rating"><i class="ion-android-star"></i> <?php echo e($Shop->rating); ?></span>
                                                </div>
                                                <div class="col-xs-3 text-center">
                                                    <span class="food-deliver-time food-list-txt"><?php echo e($Shop->estimated_delivery_time); ?>Mins</span>
                                                </div>
                                                <!-- <div class="col-xs-6 text-right">
                                                    <span class="food-quantity-price food-list-txt">$100 for two</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Restaurant List Box Starts -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div>No Record Found!</div>
                                    <?php endif; ?>
                                    
                                </div>
                                <!-- Restaurant List Ends -->
                            </div>
                            <!-- Restaurant Filter List Ends -->
                            <!-- Restaurant Filter List Starts -->
                            <div class="res-filter-list-section" id="fast">
                                <!-- Restaurant Filter Head Starts -->
                                <div class="res-filter-list-head">
                                    <h5>Super Fast Delivery</h5>
                                </div>
                                <!-- Restaurant Filter Head Ends -->
                                <!-- Restaurant List Starts -->
                                <div class="restaurant-list row">
                                 <?php $__empty_1 = true; $__currentLoopData = @$Fastdelivery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <!-- Restaurant List Box Starts -->
                                    <a href="<?php echo e(url('/restaurant/details')); ?>?name=<?php echo e($Shop->name); ?>" class="food-item-box col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <div class="food-img bg-img" style="background-image: url(<?php echo e($Shop->avatar); ?>);"></div>
                                        <div class="food-details">
                                            <h6 class="food-det-tit"><?php echo e($Shop->name); ?></h6>
                                            <p class="food-det-txt"><?php echo e($Shop->description); ?></p>
                                            <div class="food-other-details row">
                                                <div class="col-xs-3 p-r-0">
                                                    <span class="food-rating"><i class="ion-android-star"></i> <?php echo e($Shop->rating); ?></span>
                                                </div>
                                                <div class="col-xs-3 text-center">
                                                    <span class="food-deliver-time food-list-txt"><?php echo e($Shop->estimated_delivery_time); ?>Mins</span>
                                                </div>
                                                <!-- <div class="col-xs-6 text-right">
                                                    <span class="food-quantity-price food-list-txt">$100 for two</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Restaurant List Box Starts -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                      <div>No Record Found!</div>
                                    <?php endif; ?>
                                   
                                </div>
                                <!-- Restaurant List Ends -->
                            </div>
                            <!-- Restaurant Filter List Ends -->
                            <!-- Restaurant Filter List Starts -->
                            <div class="res-filter-list-section" id="offers">
                                <!-- Restaurant Filter Head Starts -->
                                <div class="res-filter-list-head">
                                    <h5>Offers Around You</h5>
                                </div>
                                <!-- Restaurant Filter Head Ends -->
                                <!-- Restaurant List Starts -->
                                <div class="restaurant-list row">
                                <?php $__empty_1 = true; $__currentLoopData = @$Offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <!-- Restaurant List Box Starts -->
                                    <a href="<?php echo e(url('/restaurant/details')); ?>?name=<?php echo e($Shop->name); ?>" class="food-item-box col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <div class="food-img bg-img" style="background-image: url(<?php echo e($Shop->avatar); ?>);"></div>
                                        <div class="food-details">
                                            <h6 class="food-det-tit"><?php echo e($Shop->name); ?></h6>
                                            <p class="food-det-txt"><?php echo e($Shop->description); ?></p>
                                            <div class="food-other-details row">
                                                <div class="col-xs-3 p-r-0">
                                                    <span class="food-rating"><i class="ion-android-star"></i> <?php echo e($Shop->rating); ?></span>
                                                </div>
                                                <div class="col-xs-3 text-center">
                                                    <span class="food-deliver-time food-list-txt"><?php echo e($Shop->estimated_delivery_time); ?>Mins</span>
                                                </div>
                                               <!--  <div class="col-xs-6 text-right">
                                                    <span class="food-quantity-price food-list-txt">$100 for two</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Restaurant List Box Starts -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div>No Record Found!</div>
                                    
                                <?php endif; ?>
                                    
                                </div>
                                <!-- Restaurant List Ends -->
                            </div>
                            <!-- Restaurant Filter List Ends -->
                            <!-- Restaurant Filter List Starts -->
                            <div class="res-filter-list-section" id="vegetarian">
                                <!-- Restaurant Filter Head Starts -->
                                <div class="res-filter-list-head">
                                    <h5>Vegetarian Options</h5>
                                </div>
                                <!-- Restaurant Filter Head Ends -->
                                <!-- Restaurant List Starts -->
                                <div class="restaurant-list row">
                                <?php $__empty_1 = true; $__currentLoopData = @$vegiterian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <!-- Restaurant List Box Starts -->
                                    <a href="<?php echo e(url('/restaurant/details')); ?>?name=<?php echo e($Shop->name); ?>" class="food-item-box col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <div class="food-img bg-img" style="background-image: url(<?php echo e($Shop->avatar); ?>);"></div>
                                        <div class="food-details">
                                            <h6 class="food-det-tit"><?php echo e($Shop->name); ?></h6>
                                            <p class="food-det-txt"><?php echo e($Shop->description); ?></p>
                                            <div class="food-other-details row">
                                                <div class="col-xs-3 p-r-0">
                                                    <span class="food-rating"><i class="ion-android-star"></i> <?php echo e($Shop->rating); ?></span>
                                                </div>
                                                <div class="col-xs-3 text-center">
                                                    <span class="food-deliver-time food-list-txt"><?php echo e($Shop->estimated_delivery_time); ?>Mins</span>
                                                </div>
                                                <!-- <div class="col-xs-6 text-right">
                                                    <span class="food-quantity-price food-list-txt">$100 for two</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Restaurant List Box Starts -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                   <div>No Record Found!</div>
                                <?php endif; ?>
                                   
                                </div>
                                <!-- Restaurant List Ends -->
                            </div>
                            <!-- Restaurant Filter List Ends -->
                            <!-- Restaurant Filter List Starts -->
                            <div class="res-filter-list-section" id="whats-new">
                                <!-- Restaurant Filter Head Starts -->
                                <div class="res-filter-list-head">
                                    <h5>What's New</h5>
                                </div>
                                <!-- Restaurant Filter Head Ends -->
                                <!-- Restaurant List Starts -->
                                <div class="restaurant-list row">
                                <?php $__empty_1 = true; $__currentLoopData = @$whats_new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <!-- Restaurant List Box Starts -->
                                    <a href="<?php echo e(url('/restaurant/details')); ?>?name=<?php echo e($Shop->name); ?>" class="food-item-box col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <div class="food-img bg-img" style="background-image: url(<?php echo e($Shop->avatar); ?>);"></div>
                                        <div class="food-details">
                                            <h6 class="food-det-tit"><?php echo e($Shop->name); ?></h6>
                                            <p class="food-det-txt"><?php echo e($Shop->description); ?></p>
                                            <div class="food-other-details row">
                                                <div class="col-xs-3 p-r-0">
                                                    <span class="food-rating"><i class="ion-android-star"></i> <?php echo e($Shop->rating); ?></span>
                                                </div>
                                                <div class="col-xs-3 text-center">
                                                    <span class="food-deliver-time food-list-txt"><?php echo e($Shop->estimated_delivery_time); ?>Mins</span>
                                                </div>
                                                <!-- <div class="col-xs-6 text-right">
                                                    <span class="food-quantity-price food-list-txt">$100 for two</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Restaurant List Box Starts -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div>No Record Found!</div>
                                <?php endif; ?>
                                    
                                </div>
                                <!-- Restaurant List Ends -->
                            </div>
                            <!-- Restaurant Filter List Ends -->
                        </div>
                        <!-- Food Section Right Ends -->
                    </div>
                </div>
            </div>
            <!-- Food Section Ends -->
             <!-- All Restaurant List Starts -->
            <div class="all-restaurant-list col-md-12 col-sm-12 col-xs-12" id="see-all">
                <div class="container-fluid">
                    <div class="all-res-tit">
                        <h4><i class="ion-arrow-down-c"></i> All Restaurant</h4>
                    </div>
                    <div class="all-res-list-inner">
                        <div class="all-res-head row m-0">
                            <div class="all-res-head-left col-md-3 p-0">
                                <h4 class="all-res-head-tit"><a href="#filter-menu"><i class="ion-arrow-up-c up-filter"></i></a> <?php echo e(count($restaurants)); ?> Restaurants</h4>
                            </div>
                            <div class="all-res-head-right col-md-9 p-0 text-right">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active">
                                        <a href="#relevance" aria-controls="relevance" role="tab" data-toggle="tab">Relevance</a>
                                    </li>
                                   
                                    <li>
                                        <a href="#delivery-time" aria-controls="delivery-time" role="tab" data-toggle="tab">Delivery Time</a>
                                    </li>
                                    <li>
                                        <a href="#rating" aria-controls="rating" role="tab" data-toggle="tab">Rating</a>
                                    </li>
                                    <li>
                                        <a href="#" class="filter-item" onclick="$('#filter-sidebar').asidebar('open')">Filter <i class="fa fa-filter filter-icon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content all-res-tab-content">
                            <!-- Relevance Tab Contetnt Starts -->
                            <div role="tabpanel" class="tab-pane fade in active" id="relevance">
                                <div class="row">
                                <?php $__empty_1 = true; $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <!-- Restaurant List Box Starts -->
                                    <a href="<?php echo e(url('/restaurant/details')); ?>?name=<?php echo e($Shop->name); ?>" class="food-item-box col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="food-img bg-img" style="background-image: url(<?php echo e($Shop->avatar); ?>);"></div>
                                        <div class="food-details">
                                            <h6 class="food-det-tit"><?php echo e($Shop->name); ?></h6>
                                            <p class="food-det-txt"><?php echo e($Shop->description); ?></p>
                                            <div class="food-other-details row">
                                                <div class="col-xs-3 p-r-0">
                                                    <span class="food-rating"><i class="ion-android-star"></i> <?php echo e($Shop->rating); ?></span>
                                                </div>
                                                <div class="col-xs-3 text-center">
                                                    <span class="food-deliver-time food-list-txt"><?php echo e($Shop->estimated_delivery_time); ?>Mins</span>
                                                </div>
                                               <!--  <div class="col-xs-6 text-right">
                                                    <span class="food-quantity-price food-list-txt">$100 for two</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Restaurant List Box Starts -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div>No Record Found!</div>
                                <?php endif; ?>
                                   
                                </div>
                            </div>
                            <!-- Relevance Tab Content Ends -->
                            <!-- Cost for Two Tab Contetnt Starts -->
                            <div role="tabpanel" class="tab-pane fade" id="cost-for-two">
                                <div class="row">
                                <?php $__empty_1 = true; $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <!-- Restaurant List Box Starts -->
                                    <a href="<?php echo e(url('/restaurant/details')); ?>?name=<?php echo e($Shop->name); ?>" class="food-item-box col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="food-img bg-img" style="background-image: url(<?php echo e($Shop->avatar); ?>);"></div>
                                        <div class="food-details">
                                            <h6 class="food-det-tit"><?php echo e($Shop->name); ?></h6>
                                            <p class="food-det-txt"><?php echo e($Shop->description); ?></p>
                                            <div class="food-other-details row">
                                                <div class="col-xs-3 p-r-0">
                                                    <span class="food-rating"><i class="ion-android-star"></i> <?php echo e($Shop->rating); ?></span>
                                                </div>
                                                <div class="col-xs-3 text-center">
                                                    <span class="food-deliver-time food-list-txt"><?php echo e($Shop->estimated_delivery_time); ?>Mins</span>
                                                </div>
                                                <!-- <div class="col-xs-6 text-right">
                                                    <span class="food-quantity-price food-list-txt">$100 for two</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Restaurant List Box Starts -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div>No Record Found!</div>
                                <?php endif; ?>
                                    
                                </div>
                            </div>
                            <!-- Cost for Two Tab Content Ends -->
                            <!-- Delivery Time Tab Contetnt Starts -->
                            <div role="tabpanel" class="tab-pane fade" id="delivery-time">
                                <div class="row">
                                <?php $__empty_1 = true; $__currentLoopData = $deliverytimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <!-- Restaurant List Box Starts -->
                                    <a href="<?php echo e(url('/restaurant/details')); ?>?name=<?php echo e($Shop->name); ?>" class="food-item-box col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="food-img bg-img" style="background-image: url(<?php echo e($Shop->avatar); ?>);"></div>
                                        <div class="food-details">
                                            <h6 class="food-det-tit"><?php echo e($Shop->name); ?></h6>
                                            <p class="food-det-txt"><?php echo e($Shop->description); ?></p>
                                            <div class="food-other-details row">
                                                <div class="col-xs-3 p-r-0">
                                                    <span class="food-rating"><i class="ion-android-star"></i> <?php echo e($Shop->rating); ?></span>
                                                </div>
                                                <div class="col-xs-3 text-center">
                                                    <span class="food-deliver-time food-list-txt"><?php echo e($Shop->estimated_delivery_time); ?>Mins</span>
                                                </div>
                                                <!-- <div class="col-xs-6 text-right">
                                                    <span class="food-quantity-price food-list-txt">$100 for two</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Restaurant List Box Starts -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div>No Record Found!</div>
                                <?php endif; ?>
                                   
                                </div>
                            </div>
                            <!-- Delivery Time Tab Content Ends -->
                            <!-- Rating Tab Contetnt Starts -->
                            <div role="tabpanel" class="tab-pane fade" id="rating">
                                <div class="row">
                                <?php $__empty_1 = true; $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <!-- Restaurant List Box Starts -->
                                    <a href="<?php echo e(url('/restaurant/details')); ?>?name=<?php echo e($Shop->name); ?>" class="food-item-box col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="food-img bg-img" style="background-image: url(<?php echo e($Shop->avatar); ?>);"></div>
                                        <div class="food-details">
                                            <h6 class="food-det-tit"><?php echo e($Shop->name); ?></h6>
                                            <p class="food-det-txt"><?php echo e($Shop->description); ?></p>
                                            <div class="food-other-details row">
                                                <div class="col-xs-3 p-r-0">
                                                    <span class="food-rating"><i class="ion-android-star"></i><?php echo e($Shop->rating); ?></span>
                                                </div>
                                                <div class="col-xs-3 text-center">
                                                    <span class="food-deliver-time food-list-txt"><?php echo e($Shop->estimated_delivery_time); ?>Mins</span>
                                                </div>
                                               <!--  <div class="col-xs-6 text-right">
                                                    <span class="food-quantity-price food-list-txt">$100 for two</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Restaurant List Box Starts -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div>No Record Found!</div>
                                <?php endif; ?>
                                   
                                </div>
                            </div>
                            <!-- Rating Tab Content Ends -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- All Restaurant List Starts -->
        </div>
        <!-- Content Wrapper Ends -->
    </div>
    <!-- Main Warapper Ends -->
    <!-- Filters Starts -->
    <div class="aside right-aside coupon-sidebar" id="filter-sidebar">
        <div class="aside-header">
            <span class="close" data-dismiss="aside"><i class="ion-close-round"></i></span>
            <h5 class="aside-tit">Filters</h5>
        </div>
        <form  action="" >
            
            <?php if(Request::has('search_loc')): ?>
             <input type="hidden"   value="<?php echo e(Request::get('search_loc')); ?>" name="search_loc" />
             <?php endif; ?>
             <input type="hidden"   value="<?php echo e(Setting::get('search_distance')); ?>" name="range" />
            <?php if(Request::has('latitude')): ?>
             <input type="hidden"   value="<?php echo e(Request::get('latitude')); ?>" name="latitude" />
            <?php endif; ?>
            <?php if(Request::has('longitude')): ?>
             <input type="hidden"   value="<?php echo e(Request::get('longitude')); ?>" name="longitude" />
            <?php endif; ?>
        <div class="aside-contents">
            <div class="filters-sidebar">
                <!-- Filter Section Starts -->
                <div class="filters-section">
                    <h6>Show Restaurants With</h6>
                    <!-- Filter Box Starts -->
                    <div class="filter-box row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check">
                                <input type="checkbox" name="offer" <?php if(Request::get('offer')==1): ?> checked <?php endif; ?> value="1" class="form-check-input" id="filter-1">
                                <label class="form-check-label" for="filter-1">Offers</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check">
                                <input type="checkbox" name="pure_veg" <?php if(Request::get('pure_veg')==1): ?> checked <?php endif; ?>  value="1" class="form-check-input" id="filter-1">
                                <label class="form-check-label" for="filter-1">Pure Veg</label>
                            </div>
                        </div>
                    </div>
                    <!-- Filter Box Ends -->
                </div>
                <!-- Filter Section Ends -->
                <!-- Filter Section Starts -->
                <div class="filters-section">
                    <h6>Cusine</h6>
                    <!-- Filter Box Starts -->
                    <div class="filter-box row">
                        <?php $selcusine = Request::get('cuisine'); ?>
                        <?php $__empty_1 = true; $__currentLoopData = $Cuisines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$Cuisine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check">
                                <input type="checkbox" name="cuisine[<?php echo e($key); ?>]" <?php if(@$selcusine[$key]==$Cuisine->id): ?> checked <?php endif; ?>  value="<?php echo e($Cuisine->id); ?>" class="form-check-input" id="filter-<?php echo e($Cuisine->id); ?>">
                                <label class="form-check-label" for="filter-<?php echo e($Cuisine->id); ?>"><?php echo e($Cuisine->name); ?></label>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                       
                    </div>
                    <!-- Filter Box Ends -->
                </div>
                <!-- Filter Section Ends -->
            </div>
        </div>
        <!-- Filter Footer Starts -->
        <div class="filter-footer aside-footer">
            <a href="#" class="clear-btn">Clear</a>
            <button type="submit" class="show-btn" data-dismiss="aside">Show Restaurants</button>
        </div>
        <!-- Filter Footer Ends -->
        </form>
    </div>
    <!-- Filters Ends -->
    
    <div class="aside-backdrop"></div>
    <!-- Sidebar Section Ends -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<style>
    .pac-container {
        z-index: 100000000 !important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>