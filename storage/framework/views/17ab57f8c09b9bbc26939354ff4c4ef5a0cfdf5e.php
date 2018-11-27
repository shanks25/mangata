<div class="profile-left col-md-3 col-sm-12 col-xs-12">
    <ul class="nav nav-tabs payment-tabs" role="tablist">
        <li <?php if(Request::segment(1)=='orders'): ?> class="active"  <?php endif; ?>>
            <a href="<?php echo e(url('/orders')); ?>"><span><i class="mdi mdi-shopping"></i></span> Orders</a>
        </li>
        <li <?php if(Request::segment(1)=='offers'): ?> class="active"  <?php endif; ?>>
            <a href="<?php echo e(url('/offers')); ?>"><span><i class="mdi mdi-percent"></i></span>Offers</a>
        </li>
        <li <?php if(Request::segment(1)=='favourite'): ?> class="active"  <?php endif; ?>>
            <a href="<?php echo e(url('/favourite')); ?>"><span><i class="mdi mdi-heart"></i></span> Favourites</a>
        </li>
        <li <?php if(Request::segment(1)=='payments'): ?> class="active"  <?php endif; ?>>
            <a href="<?php echo e(url('/payments')); ?>"><span><i class="mdi mdi-credit-card"></i></span> Payments</a>
        </li>
        <li <?php if(Request::segment(1)=='useraddress'): ?> class="active"  <?php endif; ?>>
            <a href="<?php echo e(url('/useraddress')); ?>"><span><i class="mdi mdi-map-marker-outline"></i></span> Addresses</a>
        </li>
    </ul>
</div>