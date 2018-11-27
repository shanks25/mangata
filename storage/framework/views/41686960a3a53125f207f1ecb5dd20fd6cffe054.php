

<?php $__env->startSection('content'); ?>
    <?php $shop = $myorder = [];?>
    <div class="card">
        <ul class="nav nav-tabs row m-0 common-tab">
            <div class="col-sm-3 p-0">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.orders.index')); ?>?t=pending"
                       class="nav-link <?php if(Request::get('t')=='pending'): ?> active  <?php endif; ?>"><?php echo app('translator')->getFromJson('order.dispatcher.pending_title'); ?></a>
                </li>
            </div>
            <div class="col-sm-3 p-0">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.orders.index')); ?>?t=accepted"
                       class="nav-link <?php if(Request::get('t')=='accepted'): ?> active  <?php endif; ?>"><?php echo app('translator')->getFromJson('order.dispatcher.accept_title'); ?></a>
                </li>
            </div>
            <div class="col-sm-3 p-0">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.orders.index')); ?>?t=ongoing"
                       class="nav-link <?php if(Request::get('t')=='ongoing'): ?> active  <?php endif; ?>"><?php echo app('translator')->getFromJson('order.dispatcher.ongoing_title'); ?></a>
                </li>
            </div>
            <div class="col-sm-3 p-0">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.orders.index')); ?>?t=cancelled"
                       class="nav-link <?php if(Request::get('t')=='cancelled'): ?> active  <?php endif; ?>"><?php echo app('translator')->getFromJson('order.dispatcher.cancel_title'); ?></a>
                </li>
            </div>
        </ul>
        <div class="card-header">
            <?php if(Request::get('t')=='pending'): ?>
                <h3 class="card-title"><?php echo app('translator')->getFromJson('order.dispatcher.order_pending'); ?></h3>
            <?php endif; ?>
            <?php if(Request::get('t')=='accepted'): ?>
                <h3 class="card-title"><?php echo app('translator')->getFromJson('order.dispatcher.order_accept'); ?></h3>
            <?php endif; ?>
            <?php if(Request::get('t')=='ongoing'): ?>
                <h3 class="card-title"><?php echo app('translator')->getFromJson('order.dispatcher.order_ongoing'); ?></h3>
            <?php endif; ?>
            <?php if(Request::get('t')=='cancelled'): ?>
                <h3 class="card-title"><?php echo app('translator')->getFromJson('order.dispatcher.order_cancel'); ?></h3>
            <?php endif; ?>
        </div>
        <?php if(Request::get('t')=='pending'): ?>
            <div class="row">
                <form action="<?php echo e(url('admin/orders?t=pending')); ?>" method="GET" class="popup-form">
                    <div class="col-md-6">
                        <input type="hidden" name="t" class="form-control " value="pending">
                        <input type="text" name="delivery_date" class="form-control datepicker" placeholder="Date"
                               readonly>
                    </div>
                    <div class="col-md-6">
                        <button class="btn-success">Search</button>
                    </div>
                </form>
                <input type="hidden" name="order_track_id" id="order_track_id"/>
            </div>
    <?php endif; ?>
    <!-- Pending Order List Starts -->
        <div class="dispatcher row m-0">
            <!-- Dispatcher Left Starts -->
            <div class="col-md-7">
                <div class="dis-left" id="container">
                <?php if(Request::get('t')=='pending'): ?>
                    <?php
                    if (@Request::get('delivery_date')) {
                        $cur_date = \Carbon\Carbon::parse(Request::get('delivery_date'));
                        $last_date = \Carbon\Carbon::parse(Request::get('delivery_date'))->addDay();
                        $dataorder = $Orders->whereBetween('delivery_date', [$cur_date, $last_date])->orderBy('delivery_date', 'ASC')->incoming();
                    } else {
                        $dataorder = $Orders->orderBy('delivery_date', 'ASC')->incoming();
                    }
                    ?>
                    <!-- Pending Order Block Starts -->
                        <?php $__empty_1 = true; $__currentLoopData = $dataorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                            $shop[$Order->shop->id] = $Order->shop;
                            $myorder[$Order->shop->id][] = $Order->id;
                            $today = \Carbon\Carbon::tomorrow();
                            if ($Order->delivery_date >= $today) {
                                $order_now = 1;
                            } else {
                                $order_now = 0;
                            }
                            //dd($Orders);?>

                            <div class="card card-inverse pending-block row m-0 <?php if($order_now == 1): ?>  bg-primary <?php elseif($Order->status == 'RECEIVED'): ?> bg-danger  <?php else: ?> bg-success <?php endif; ?>">
                                <div class="card-block">
                                    <div class="col-sm-3 card-top text-xs-center">
                                        <div class="pending-dp-img bg-img"
                                             style="background-image: url(<?php echo e(asset($Order->user->avatar ? : 'avatar.png')); ?>);"></div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-btm pending-btm">
                                            <p class="card-txt"><b>#<?php echo e($Order->id); ?></b></p>
                                            <p class="card-txt"><?php echo e($Order['user']['name']); ?></p>
                                            <p class="card-txt"><?php echo e($Order['user']['phone']); ?></p>
                                        </div>
                                        <div class="card-btm row m-0">
                                            <button class="btn <?php if($order_now == 1): ?>  btn-primary <?php elseif($Order->status == 'RECEIVED'): ?> btn-danger   <?php else: ?> btn-success <?php endif; ?> btn-darken-3 orderlist"
                                                    data-id="<?php echo e($Order->id); ?>">Order List
                                            </button>
                                            <?php if($Order->status == 'RECEIVED'): ?>
                                                <?php if($order_now == 0): ?>
                                                    <?php if(Setting::get('manual_assign')==1): ?>
                                                        <a href="<?php echo e(route('admin.orders.show', $Order->id)); ?>?t=pending&p=auto"
                                                           class="btn btn-danger btn-darken-3"><?php echo app('translator')->getFromJson('order.dispatcher.assign'); ?></a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('admin.orders.show', $Order->id)); ?>?t=pending"
                                                           class="btn btn-danger btn-darken-3"><?php echo app('translator')->getFromJson('order.dispatcher.assign'); ?></a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <span class="tag batch"><?php echo app('translator')->getFromJson('order.dispatcher.waiting'); ?></span>
                                                <?php endif; ?>
                                            <?php elseif($Order->dispute == 'CREATED'): ?>
                                                <span class="tag batch"><?php echo app('translator')->getFromJson('order.dispatcher.dispute'); ?></span>
                                            <?php else: ?>
                                                <span class="tag batch"><?php echo app('translator')->getFromJson('order.dispatcher.incoming_request'); ?></span>

                                            <?php endif; ?>

                                            <a href="<?php echo e(url('admin/chat?order_id='.$Order->id)); ?>"
                                               class="btn btn-danger btn-darken-3" target="_blank">Chat</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="delete-block">
                                    <!-- <a href="#" class="del-icon"><i class="ft-trash-2"></i></a> -->
                                    <form action="<?php echo e(route('admin.orders.update', $Order->id)); ?>"
                                          id="assign-<?php echo e($Order->id); ?>" class="form-horizontal" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field("PATCH")); ?>

                                        <input type="hidden" name="status" value="CANCELLED">
                                        <button class="btn <?php if($Order->status == 'CANCELLED'): ?> btn-success  <?php else: ?> btn-danger <?php endif; ?> btn-darken-3 del-icon">
                                            <i class="ft-trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-xs-12">
                                <h4><?php echo app('translator')->getFromJson('order.dispatcher.order_not_found'); ?></h4>
                            </div>
                        <?php endif; ?>
                    <!-- Pending Order Block Ends -->
                    <?php elseif(Request::get('t')=='accepted'): ?>

                    <!-- Pending Order Block Starts -->
                        <?php $__empty_1 = true; $__currentLoopData = $Orders->assigned(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                            $shop[$Order->shop->id] = $Order->shop;
                            $myorder[$Order->shop->id][] = $Order->id;
                            //dd($Orders);?>
                            <div class="card card-inverse pending-block row m-0 bg-danger">
                                <div class="card-block">
                                    <div class="col-sm-3 card-top text-xs-center">
                                        <div class="pending-dp-img bg-img"
                                             style="background-image: url(<?php echo e(asset($Order['user']['avatar'] ? : 'avatar.png')); ?>);"></div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-btm pending-btm">
                                            <p class="card-txt"><b>#<?php echo e($Order->id); ?></b></p>
                                            <p class="card-txt"><?php echo e(@$Order->transporter->name); ?></p>
                                            <p class="card-txt"><?php echo e(@$Order->transporter->phone); ?></p>

                                        </div>
                                        <div class="card-btm row m-0">
                                            <button class="btn btn-danger btn-darken-3 orderlist"
                                                    data-id="<?php echo e($Order->id); ?>">Order List
                                            </button>
                                            <?php if($Order->status=='PROCESSING'): ?>
                                                <span class="tag batch"><?php echo app('translator')->getFromJson('order.dispatcher.packed'); ?></span>
                                            <?php else: ?>
                                                <span class="tag batch"><?php echo app('translator')->getFromJson('order.dispatcher.assigned'); ?></span>
                                            <?php endif; ?>
                                            <a href="<?php echo e(url('admin/chat?order_id='.$Order->id)); ?>"
                                               class="btn btn-danger btn-darken-3" target="_blank">Chat</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="delete-block">
                                    <form action="<?php echo e(route('admin.orders.update', $Order->id)); ?>"
                                          id="assign-<?php echo e($Order->id); ?>" class="form-horizontal" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field("PATCH")); ?>

                                        <input type="hidden" name="status" value="CANCELLED">
                                        <button class="btn <?php if($Order->status == 'CANCELLED'): ?> btn-success  <?php else: ?> btn-danger <?php endif; ?> btn-darken-3 del-icon">
                                            <i class="ft-trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-xs-12">
                                <h4><?php echo app('translator')->getFromJson('order.dispatcher.order_not_found'); ?></h4>
                            </div>
                        <?php endif; ?>
                    <!-- Pending Order Block Ends -->
                    <?php elseif(Request::get('t')=='ongoing'): ?>

                    <!-- Pending Order Block Starts -->
                        <?php $__empty_1 = true; $__currentLoopData = $Orders->ongoing(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                            $shop[$Order->shop->id] = $Order->shop;
                            $myorder[$Order->shop->id][] = $Order->id;
                            //dd($Orders);?>
                            <div class="card card-inverse pending-block row m-0 bg-danger">
                                <div class="card-block">
                                    <div class="col-sm-3 card-top text-xs-center">
                                        <div class="pending-dp-img bg-img"
                                             style="background-image: url(<?php echo e(asset($Order['user']['avatar'] ? : 'avatar.png')); ?>);"></div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-btm pending-btm">
                                            <p class="card-txt"><b>#<?php echo e($Order->id); ?></b></p>
                                            <p class="card-txt"><?php echo e($Order['transporter']['name']); ?></p>
                                            <p class="card-txt"><?php echo e($Order['transporter']['phone']); ?></p>

                                        </div>
                                        <div class="card-btm row m-0">
                                            <button class="btn btn-danger btn-darken-3 orderlist"
                                                    data-id="<?php echo e($Order->id); ?>">Order List
                                            </button>
                                            <?php if($Order->status=='PROCESSING'): ?>
                                                <form action="<?php echo e(route('admin.orders.update', $Order->id)); ?>"
                                                      id="assign-<?php echo e($Order->id); ?>" method="POST">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field("PATCH")); ?>

                                                    <input type="hidden" name="status" value="REACHED">
                                                    <button class="btn <?php if($Order->status == 'RECEIVED'): ?> btn-success  <?php else: ?> btn-danger <?php endif; ?> btn-darken-3">
                                                        <?php echo app('translator')->getFromJson('order.dispatcher.reached'); ?>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                            <?php if($Order->status=='REACHED'): ?>
                                                <form action="<?php echo e(route('admin.orders.update', $Order->id)); ?>"
                                                      id="assign-<?php echo e($Order->id); ?>" method="POST">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field("PATCH")); ?>

                                                    <input type="hidden" name="status" value="PICKEDUP">
                                                    <button class="btn <?php if($Order->status == 'RECEIVED'): ?> btn-success  <?php else: ?> btn-danger <?php endif; ?> btn-darken-3">
                                                        <?php echo app('translator')->getFromJson('order.dispatcher.packup'); ?>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                            <?php if($Order->status=='PICKEDUP'): ?>
                                                <form action="<?php echo e(route('admin.orders.update', $Order->id)); ?>"
                                                      id="assign-<?php echo e($Order->id); ?>" method="POST">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field("PATCH")); ?>

                                                    <input type="hidden" name="status" value="ARRIVED">
                                                    <button class="btn <?php if($Order->status == 'RECEIVED'): ?> btn-success  <?php else: ?> btn-danger <?php endif; ?> btn-darken-3">
                                                        <?php echo app('translator')->getFromJson('order.dispatcher.arrived'); ?>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                            <?php if($Order->status=='ARRIVED'): ?>
                                                <form action="<?php echo e(route('admin.orders.update', $Order->id)); ?>"
                                                      id="assign-<?php echo e($Order->id); ?>" method="POST">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field("PATCH")); ?>

                                                    <input type="hidden" name="status" value="COMPLETED">
                                                    <button class="btn <?php if($Order->status == 'RECEIVED'): ?> btn-success  <?php else: ?> btn-danger <?php endif; ?> btn-darken-3">
                                                        <?php echo app('translator')->getFromJson('order.dispatcher.arrived'); ?>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                            <a href="<?php echo e(url('admin/chat?order_id='.$Order->id)); ?>"
                                               class="btn btn-danger btn-darken-3" target="_blank">Chat</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="delete-block">
                                    <form action="<?php echo e(route('admin.orders.update', $Order->id)); ?>"
                                          id="assign-<?php echo e($Order->id); ?>" class="form-horizontal" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field("PATCH")); ?>

                                        <input type="hidden" name="status" value="CANCELLED">
                                        <button class="btn <?php if($Order->status == 'CANCELLED'): ?> btn-success  <?php else: ?> btn-danger <?php endif; ?> btn-darken-3 del-icon">
                                            <i class="ft-trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-xs-12">
                                <h4><?php echo app('translator')->getFromJson('order.dispatcher.order_not_found'); ?></h4>
                            </div>
                        <?php endif; ?>
                    <!-- Pending Order Block Ends -->

                    <?php else: ?>

                    <!-- Pending Order Block Starts -->
                        <?php $__empty_1 = true; $__currentLoopData = $Orders->cancelled(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                            $shop[$Order->shop->id] = $Order->shop;
                            $myorder[$Order->shop->id][] = $Order->id;
                            //dd($Orders);?>
                            <div class="card card-inverse pending-block row m-0 bg-danger">
                                <div class="card-block">
                                    <div class="col-sm-3 card-top text-xs-center">
                                        <div class="pending-dp-img bg-img"
                                             style="background-image: url(<?php echo e(asset($Order['user']['avatar'] ? : 'avatar.png')); ?>);"></div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-btm pending-btm">
                                            <p class="card-txt"><b>#<?php echo e($Order->id); ?></b></p>
                                            <p class="card-txt"><?php echo e($Order['user']['name']); ?></p>
                                            <p class="card-txt"><?php echo e($Order['user']['phone']); ?></p>

                                        </div>
                                        <div class="card-btm row m-0">
                                            <button class="btn btn-danger btn-darken-3 orderlist"
                                                    data-id="<?php echo e($Order->id); ?>">Order List
                                            </button>
                                            <a href="<?php echo e(url('admin/chat?order_id='.$Order->id)); ?>" target="_blank"
                                               class="btn btn-danger btn-darken-3">Chat</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="delete-block">
                                    <a href="#" class="del-icon"><i class="ft-trash-2"></i></a>
                                </div> -->
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-xs-12">
                                <h4><?php echo app('translator')->getFromJson('order.dispatcher.order_not_found'); ?></h4>
                            </div>
                        <?php endif; ?>
                    <!-- Pending Order Block Ends -->

                    <?php endif; ?>
                </div>
            </div>
            <!-- Dispatcher Left Ends -->
            <!-- Dispatcher Left Ends -->
            <audio id="beep-one" controls preload="auto" style="display:none">
                <source src="<?php echo e(asset('assets/audio/beep.mp3')); ?>" controls></source>
                <source src="<?php echo e(asset('assets/audio/beep.ogg')); ?>" controls></source>
                Your browser isn't invited for super fun audio time.
            </audio>
            <!-- Dispatcher Right Starts -->
            <!-- Dispatcher Right Starts -->
            <div class="col-md-5">
                <?php if(count($shop)>0): ?>
                    <div id="basic-map1" class="dis-right"></div>
                <?php else: ?>
                    <div id="basic-map" class="dis-right"></div>
                <?php endif; ?>
            </div>
            <!-- Dispatcher Right Ends -->
        </div>
        <!-- Pending Order List Ends -->
    </div>
    <!-- Order List Modal Starts -->
    <div class="modal fade text-xs-left" id="order-list">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="myModalLabel1">Order List </h2>
                    <!-- <div><p id="order_timer"></p></div> -->
                </div>
                <div class="modal-body">
                    <div class="row m-0">
                        <dl class="order-modal-top">
                            <div class="row m-0">
                                <dt class="col-sm-3 order-txt p-0">Order ID</dt>
                                <dd class="col-sm-9 order-txt orderid"></dd>
                            </div>
                            <div class="row m-0">
                                <dt class="col-sm-3 order-txt p-0">Restaurant Name</dt>
                                <dd class="col-sm-9 order-txt rest_name"><span>: </span> Burger King</dd>
                            </div>
                            <div class="row m-0">
                                <dt class="col-sm-3 order-txt p-0">Customer Name</dt>
                                <dd class="col-sm-9 order-txt cust_name"><span>: </span> William Hawings</dd>
                            </div>
                            <div class="row m-0">
                                <dt class="col-sm-3 order-txt p-0">Address</dt>
                                <dd class="col-sm-9 order-txt address">
                                    <span>: </span> 20B, Northeasrt Street,
                                    <br> Newuork City,
                                    <br> United States.
                                </dd>
                            </div>
                            <div class="row m-0">
                                <dt class="col-sm-3 order-txt p-0">Phone Number</dt>
                                <dd class="col-sm-9 order-txt cust_phone"><span>: </span> +12 445 8878 989</dd>
                            </div>
                            <div class="row m-0">
                                <dt class="col-sm-3 order-txt p-0">Delivery Date</dt>
                                <dd class="col-sm-9 order-txt cust_delivery_date"></dd>
                            </div>
                            <div class="row m-0">
                                <dt class="col-sm-3 order-txt p-0">Note</dt>
                                <dd class="col-sm-9 order-txt cust_order_note"></dd>
                            </div>

                            <div class="row m-0">
                                <dt class="col-sm-3 order-txt p-0">Total Amount</dt>
                                <dd class="col-sm-9 order-txt tot_amt"><span>: </span> $1600</dd>
                                <br/>
                                <br/>
                            </div>
                            <div class="row m-0">
                                <dt class="col-sm-3 order-txt p-0 ">Status</dt>
                                <dt class="col-sm-9 order-txt ">Time</dt>
                            </div>
                            <div class="row m-0" id="order_status_list">
                                <dt class="col-sm-3 order-txt p-0">INCOMING</dt>
                                <dd class="col-sm-9 order-txt "> --</dd>
                            </div>
                        </dl>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Note</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Cost</th>
                                </tr>
                                </thead>
                                <tbody class="cartstbl">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Discount</th>
                                    <th class="discount"> <?php echo e(Setting::get("currency")); ?> 1600</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Delivery Charge</th>
                                    <th class="delivery_charge"> <?php echo e(Setting::get("currency")); ?> 1600</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Tax</th>
                                    <th class="tax"> <?php echo e(Setting::get("currency")); ?> 1600</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Total</th>
                                    <th class="tot_amt"> <?php echo e(Setting::get("currency")); ?> 1600</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Order List Modal Ends -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/timeTo.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/user/css/bootstrap-datetimepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.time-to.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/user/js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script type="text/javascript">
        $(function () {
            $('.datepicker').datetimepicker({
                weekStart: 1,
                todayBtn: 0,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0,
                format: 'yyyy-mm-dd',
                startDate: new Date()
            });
        });

        $(document).on("click", ".orderlist", function () {
            var order_id = $(this).data('id');
            var order_date;
            $.ajax({
                url: "<?php echo e(url('admin/orders')); ?>/" + order_id,
                success: function (result) {
                    $('#order_timer').timeTo({
                        timeTo: order_date,
                        theme: "black",
                        displayCaptions: true,
                        fontSize: 30,
                        captionSize: 10
                    });
                    order_date = new Date(new Date(result.Order.created_at));
                    $('#order-list').modal('show');
                    $('.orderid').html('<span>: </span>' + result.Order.id);
                    $('.rest_name').html('<span>: </span>' + result.Order.shop.name);
                    $('.cust_name').html('<span>: </span>' + result.Order.user.name);
                    $('.cust_phone').html('<span>: </span>' + result.Order.user.phone);
                    if (result.Order.delivery_date) {
                        $('.cust_delivery_date').html('<span>: </span>' + result.Order.delivery_date);
                    } else {
                        $('.cust_delivery_date').html('<span>: </span>' + result.Order.created_at);
                    }
                    if (result.Order.note) {
                        $('.cust_order_note').html('<span>: </span>' + result.Order.note);
                    } else {
                        $('.cust_order_note').html('<span>: -- </span>');
                    }
                    $('.address').html('<span>: </span>' + result.Order.address.map_address);
                    $('.tot_amt').html('<span>: </span> <?php echo e(Setting::get("currency")); ?>' + result.Order.invoice.net.toFixed(2));
                    $('.discount').html("<span>: </span> <?php echo e(Setting::get('currency')); ?>" + result.Order.invoice.discount.toFixed(2));
                    $('.delivery_charge').html("<span>: </span> <?php echo e(Setting::get('currency')); ?>" + result.Order.invoice.delivery_charge.toFixed(2));
                    $('.tax').html("<span>: </span> <?php echo e(Setting::get('currency')); ?>" + result.Order.invoice.tax.toFixed(2));
                    var statuslist = '';
                    $.each(result.Order.ordertiming, function (key, value) {
                        statuslist += '<dd class="col-sm-3 order-txt p-0">' + value.status + '</dd>\
                <dd class="col-sm-9 order-txt "> ' + value.created_at + '</dd>';
                    });
                    $('#order_status_list').html(statuslist);
                    var table = '';
                    console.log(result.Cart);
                    $.each(result.Cart, function (key, value) {
                        table += '<tr>';
                        if (value.product.images.length > 0) {
                            table += '<td><div class="bg-img order-img" style="background-image: url(' + value.product.images[0].url + ');"></div></td>';
                        } else {
                            table += '<td></td>';
                        }
                        table += '<td>' + value.product.name + '</td><td>' + value.note + '</td><td><?php echo e(Setting::get('currency')); ?>' + value.product.prices.price.toFixed(2) + '</td><td>' + value.quantity + '</td><td><?php echo e(Setting::get('currency')); ?>' + (value.quantity * value.product.prices.price).toFixed(2) + '</td></tr>';
                        $.each(value.cart_addons, function (key, valuee) {
                            console.log(valuee.quantity);
                            table += "<tr>\
                            <td class='text-left'>\
                                <h5>" + valuee.addon_product.addon.name + "</h5>\
                                <p>(Addons)</p>\
                            </td>\
                            <td>\
                                <strong><?php echo e(Setting::get('currency')); ?>" + valuee.addon_product.price.toFixed(2) + "</strong>\
                            </td>\
                            <td>" + value.quantity + "X" + valuee.quantity + "</td>\
                            <td>\
                                <p><?php echo e(Setting::get('currency')); ?>" + (value.quantity * valuee.addon_product.price * valuee.quantity).toFixed(2) + "</p>\
                            </td>\
                        </tr>";
                        });

                    });
                    $('.cartstbl').html(table);
                }
            });
        });


        function initialize() {

            var fenway = {lat: 42.345573, lng: -71.098326};
            var map = new google.maps.Map(document.getElementById('basic-map1'), {
                center: fenway,
                zoom: 14
            });
            var panorama = new google.maps.StreetViewPanorama(
                document.getElementById('map'), {
                    position: fenway,
                    pov: {
                        heading: 34,
                        pitch: 10
                    }
                });
            map.setStreetView(panorama);

        }

        function ongoingInitialize(trip) {
            map = new google.maps.Map(document.getElementById('basic-map1'), {
                center: {lat: 0, lng: 0},
                zoom: 2,
            });

            var bounds = new google.maps.LatLngBounds();

            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29),
                icon: '/assets/img/marker-start.png'
            });

            var markerSecond = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29),
                icon: '/assets/img/marker-end.png'
            });
            source = new google.maps.LatLng(trip.shop.latitude, trip.shop.longitude);
            destination = new google.maps.LatLng(trip.address.latitude, trip.address.longitude);

            marker.setPosition(source);
            markerSecond.setPosition(destination);

            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true, preserveViewport: true});
            directionsDisplay.setMap(map);

            directionsService.route({
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            }, function (result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    console.log('8888' + result);
                    directionsDisplay.setDirections(result);

                    marker.setPosition(result.routes[0].legs[0].start_location);
                    markerSecond.setPosition(result.routes[0].legs[0].end_location);
                }
            });

            if (trip.transporter) {
                var markerProvider = new google.maps.Marker({
                    map: map,
                    icon: "/assets/img/marker-car.png",
                    anchorPoint: new google.maps.Point(0, -29)
                });

                provider = new google.maps.LatLng(trip.transporter.latitude, trip.transporter.longitude);
                markerProvider.setVisible(true);
                markerProvider.setPosition(provider);
                console.log('Provider Bounds', markerProvider.getPosition());
                bounds.extend(markerProvider.getPosition());
            }

            bounds.extend(marker.getPosition());
            bounds.extend(markerSecond.getPosition());
            map.fitBounds(bounds);
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(Setting::get('GOOGLE_MAP_KEY')); ?>&callback=initialize"
            type="text/javascript"></script>
    <script type="text/javascript">

        function assignorder() {
            $.ajax({
                url: "<?php echo e(url('admin/orders?t=pending')); ?>&p=auto&ajax=1&auto=1",
                success: function (result) {
                    setTimeout(function () {
                        assignorder();
                    }, 3000);
                }
            });
        }

        assignorder();
    </script>
    <script>
        $(document).ready(function () {
            function disableBack() {
                window.history.forward()
            }

            window.onload = disableBack();
            window.onpageshow = function (evt) {
                if (evt.persisted) disableBack()
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.3/react.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.3/JSXTransformer.js"></script>

    <script type="text/jsx">
        var total_order = 0;
        var curstatus = '';
        ;
        var beepOne = $("#beep-one")[0];
        var dataitems = [];
        var MainComponent = React.createClass({
            getInitialState: function () {
                return {data: [], currency: "<?php echo e(Setting::get('currency')); ?>"};
            },
            componentDidMount: function () {
                $.ajax({
                    url: "<?php echo e(url('admin/orders?t='.Request::get('t'))); ?>&q=1",
                    type: "GET"
                })
                    .done(function (response) {
                        console.log(response);
                        dataitems = response;
                        this.setState({
                            data: response
                        });

                    }.bind(this));

                setInterval(this.checkRequest, 5000);
            },
            checkRequest: function () {
                $.ajax({
                    url: "<?php echo e(url('admin/orders?t='.Request::get('t'))); ?>&q=1",
                    type: "GET"
                })
                    .done(function (response) {
                        dataitems = response;
                        if (total_order == 0) {
                            total_order = response.length;
                        }
                        if (total_order < response.length) {
                            beepOne.play();
                            total_order = response.length;
                        }
                        this.setState({
                            data: response
                        });

                    }.bind(this));
            },
            render: function () {
                var listItems = this.state.data.map(function (item) {
                    var message = item.status;
                    $(document).on("click", '#btn-info_' + item.id + '', function () {
                        ongoingInitialize(item);
                        $('#order_track_id').val(item.id);
                    });
                    if ($('#order_track_id').val() == item.id) {
                        if (curstatus != item.status) {
                            $('#btn-info_' + item.id + '').trigger('click');
                            curstatus = item.status;
                        }
                    }
                    var cancel_div = <div className="delete-block">
                        <form action={`<?php echo e(url('admin/orders/')); ?>/${item.id}`} id="assign-item.id"
                              className="form-horizontal" method="POST">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                            <input type="hidden" name="_method" value="PATCH"/>
                            <input type="hidden" name="status" value="CANCELLED"/>
                            <button className="btn  btn-danger  btn-darken-3 del-icon">
                                <i className="ft-trash-2"></i>
                            </button>
                        </form>
                    </div>;
                    if (item.status == 'RECEIVED') {
                        var message = "";
                        var bgcol = "card card-inverse pending-block row m-0  bg-danger  ";
                        var btncol = "btn   btn-danger    btn-darken-3 orderlist";
                                <?php if(Setting::get('manual_assign')==1): ?>
                        var assign = '';
                        var message = "<?php echo e(trans('order.dispatcher.waiting')); ?>";
                        var assign1 = <a href={`<?php echo e(url('admin/orders/')); ?>/${item.id}?t=pending&p=auto`}
                                         className="btn btn-danger btn-darken-3"><?php echo e(trans("order.dispatcher.assign")); ?></a>;
                                <?php else: ?>
                        var assign = <a href={`<?php echo e(url('admin/orders/')); ?>/${item.id}?t=pending`}
                                        className="btn btn-danger btn-darken-3"><?php echo e(trans("order.dispatcher.assign")); ?></a>;
                        <?php endif; ?>
                    } else if (item.status == 'READY') {
                        var bgcol = "card card-inverse pending-block row m-0  bg-primary  ";
                        var btncol = "btn   btn-primary    btn-darken-3 orderlist";
                        var assign = '';
                        var message = "<?php echo e(trans('order.dispatcher.waiting')); ?>";
                    } else if (item.status == 'PROCESSING') {
                        var message = "<?php echo e(trans('order.dispatcher.packed')); ?>";
                        var bgcol = "card card-inverse pending-block row m-0  bg-primary  ";
                        var btncol = "btn   btn-primary    btn-darken-3 orderlist";
                        var assign = '';
                    } else if (item.status == 'CANCELLED') {
                        var message = "";
                        var bgcol = "card card-inverse pending-block row m-0  bg-primary  ";
                        var btncol = "btn   btn-primary    btn-darken-3 orderlist";
                        var assign = '';
                        var cancel_div = "";
                    } else {
                        var bgcol = "card card-inverse pending-block row m-0  bg-success  ";
                        var btncol = "btn   btn-success    btn-darken-3 orderlist";
                        var assign = '';
                        if (item.status == 'ORDERED') {
                            var message = "<?php echo e(trans('order.dispatcher.incoming_request')); ?>";
                        }
                        if (item.status == 'ASSIGNED') {
                            var message = "<?php echo e(trans('order.dispatcher.assigned')); ?>";
                        }
                    }
                    if (item.dispute == 'CREATED') {
                        var message = "<?php echo e(trans('order.dispatcher.dispute')); ?>";
                        var assign = '';
                    }
                    if (item.dispute == 'CREATED' && item.status == 'CANCELLED') {
                        var message = "";
                        var assign = '';
                    }
                    return (
                        <div key={item.id} className={bgcol} id={`btn-info_${item.id}`}>
                            <div className="card-block">
                                <div className="col-sm-3 card-top text-xs-center">
                                    <div className="pending-dp-img bg-img">
                                        <img src={item.user.avatar} className="pending-dp-img bg-img"
                                             styles="height:50px;width:50px"/>
                                    </div>
                                </div>
                                <div className="col-sm-9">
                                    <div className="card-btm pending-btm">
                                        <p className="card-txt"><b>#{item.id}</b></p>
                                        <p className="card-txt">{item.user.name}</p>
                                        <p className="card-txt">{item.user.phone}</p>
                                    </div>
                                    <div className="card-btm row m-0">
                                        <button className={btncol} data-id={item.id}>Order List</button>
                                        <?php if(Setting::get('manual_assign')==1): ?>
                                        <span>{assign}</span>
                                        <?php else: ?>
                                        <span>{assign}</span>
                                        <?php endif; ?>
                                        <span className="tag batch">{message}</span>
                                        <a href={`chat?order_id=${item.id}`} className="btn btn-danger btn-darken-3"
                                           target="_blank">Chat</a>
                                    </div>
                                </div>
                            </div>
                            {cancel_div}
                        </div>
                    );
                });

                return (
                    <div>
                        {listItems}
                    </div>
                );
            }
        });


        React.render(<MainComponent/>, document.getElementById("container"));
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>