<?php $__env->startSection('content'); ?>
<?php //dd($Orders); ?>
  <!-- Content Wrapper Starts -->
        <div class="content-wrapper">
            <div class="profile blue-bg">
                <!-- Profile Head Starts -->
                 <?php echo $__env->make('user.layouts.partials.user_common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- Profile Head Ends -->
                <!-- Profile Content Starts -->
                <div class="profile-content">
                    <div class="container-fluid">
                        <!-- Profile Inner Starts -->
                        <div class="profile-inner row">
                            <!-- Profile Left Starts -->
                            <?php echo $__env->make('user.layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <!-- Profile Left Ends -->
                            <!-- Profile Right Starts -->
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <div class="profile-right">
                                    <div class="profile-right-head">
                                        <h4>Past Orders</h4>
                                    </div>
                                     <?php $__empty_1 = true; $__currentLoopData = $Orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Index => $Order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <!-- Order Box Starts -->
                                    <?php //dd($Order); ?>
                                    <div class="order-box">
                                        <!-- Order Box Top Starts -->
                                        <a href="javascript:void(0);" class="order-box-top row itemlist" data-id="<?php echo e($Order->id); ?>" >
                                            <!-- Order Box Section Left Starts -->
                                            <div class="order-box-sec-left col-md-2 col-sm-3 col-xs-12">
                                                <div class="order-img bg-img" style="background-image: url(<?php echo e($Order->shop->avatar); ?>);"></div>
                                            </div>
                                            <!-- Order Box Section Left Ends -->
                                            <!-- Order Box Section Center Starts -->
                                            <div class="order-box-sec-center col-md-6 col-sm-6 col-xs-12">
                                                <div class="order-details-sec">
                                                    <h6 class="hotel-tit"><?php echo e($Order->shop->name); ?></h6>
                                                    <p class="hotel-address"><?php echo e($Order->shop->maps_address); ?></p>
                                                    <p class="order-details">
                                                        <span>Order <?php echo e($Order->id); ?>| <?php echo e($Order->updated_at); ?> </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- Order Box Section Center Starts -->
                                            <!-- Order Box Section Right Starts -->
                                            <div class="order-box-sec-right col-md-4 col-sm-4 col-xs-12">
                                                <p class="deliver-txt">Delivered on <?php echo e($Order->updated_at); ?></p>
                                            </div>
                                            <!-- Order Box Section Right Ends -->
                                        </a>
                                        <!-- Order Box Top Ends -->
                                        <!-- Order Box Bottom Starts -->
                                        <div class="order-box-btm row">
                                            <!-- Order Box Bottom Left Starts -->
                                            <div class="order-box-btm-left col-md-9 col-sm-9 col-xs-12">
                                                <p class="order-list">
                                                     <?php $__empty_2 = true; $__currentLoopData = $Order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Index => $Item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                    <span><?php echo e($Item->product->name); ?> x <?php echo e($Item->quantity); ?>, </span>
                                                   
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                    <?php endif; ?>
                                                </p>
                                                <div>
                                                    <form action ="<?php echo e(url('/reorder')); ?>" method="POST">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" value="<?php echo e($Order->id); ?>" name="order_id" />
                                                    <input type="hidden" value="<?php echo e($Order->address->id); ?>" name="user_address_id" />
                                                    <button class="reorder-btn">Reorder</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Order Box Bottom Left Ends -->
                                            <!-- Order Box Bottom Right Starts -->
                                            <div class="order-box-btm-left col-md-3 col-sm-3 col-xs-12 text-right">
                                                <p class="total-txt">Total <?php echo e(currencydecimal($Order->invoice->net)); ?></p>
                                                <?php if($Order->status=='COMPLETED'): ?>
                                                    <?php if(!$Order->has('reviewrating')): ?>

                                                         <a href="javascript:void(0)" data-id="<?php echo e($Order->id); ?>" data-imgshop="<?php echo e(@$Order->shop->avatar); ?>" data-imgboy="<?php echo e(@$Order->transporter->avatar); ?>" data-shopname="<?php echo e(@$Order->shop->name); ?>" data-boyname="<?php echo e(@$Order->transporter->name); ?>" data-rateshop="0"  data-rateboy="0"  class="rate-btn  ratingreview" >Ratings</a>
                                                    <?php else: ?>
                                                        <?php if(@$Order->reviewrating->shop_id == 0 || @$Order->reviewrating->transporter_id == 0): ?>
                                                             <a href="javascript:void(0)" data-id="<?php echo e($Order->id); ?>" data-imgshop="<?php echo e(@$Order->shop->avatar); ?>" data-imgboy="<?php echo e(@$Order->transporter->avatar); ?>" data-shopname="<?php echo e(@$Order->shop->name); ?>" data-boyname="<?php echo e(@$Order->transporter->name); ?>" data-rateshop="<?php echo e(@$Order->reviewrating->shop_id?:0); ?>"  data-rateboy="<?php echo e(@$Order->reviewrating->transporter_id?:0); ?>"  class="rate-btn  ratingreview" >Ratings</a>

                                                        <?php endif; ?>
                                                   
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                            <!-- Order Box Bottom Right Ends -->
                                        </div>
                                        <!-- Order Box Bottom Ends -->
                                    </div>
                                    <!-- Order Box Ends -->
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div>No Order Found!</div>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                            <!-- Profile Right Ends -->
                        </div>
                        <!-- Profile Inner Ends -->
                    </div>
                </div>
                <!-- Profile Content Ends -->
            </div>
        </div>
        <!-- Content Wrapper Ends -->


         <!-- Invoice Starts -->
    <div class="aside right-aside location" id="invoice-sidebar">
        <div class="aside-header">
            <span class="close" data-dismiss="aside"><i class="ion-close-round"></i></span>
            <h5 class="aside-tit">Invoice</h5>
        </div>
        <div class="aside-contents">
            <div class="invoice">
                <!-- Invoice Location Starts -->
                <div class="invoice-location">
                    <!-- Invoice Box Starts -->
                    <div class="invoice-box row">
                        <div class="invoice-box-left icon-left pull-left">
                            <i class="ion-ios-location-outline"></i>
                        </div>
                        <div class="invoice-box-right icon-right">
                            <span>From</span>
                            <h6 class="icon-tit">Pizza Hut</h6>
                            <p class="icon-txt">Dry Hollow Rd, Cokeville, WY 83114, USA</p>
                        </div>
                    </div>
                    <!-- Invoice Box Ends -->
                    <!-- Invoice Box Starts -->
                    <div class="invoice-box row">
                        <div class="invoice-box-left icon-left pull-left">
                            <i class="ion-ios-location-outline"></i>
                        </div>
                        <div class="invoice-box-right icon-right">
                            <span>To</span>
                            <h6 class="icon-tit">Pizza Hut</h6>
                            <p class="icon-txt">Dry Hollow Rd, Cokeville, WY 83114, USA</p>
                        </div>
                    </div>
                    <!-- Invoice Box Ends -->
                </div>
                <!-- Invoice Location Ends -->
                <!-- Deliver Status Starts -->
                <div class="deliver-status row  delivery_status">
                    
                </div>
                <!-- Deliver Status Ends -->
                <!-- Invoice Order Items Starts -->
                <div class="invoice-order-items">
                    <h6 class="invoice-table-tit"> Items</h6>
                    <table class="table table-responsive">
                        <thead>
                        </thead>
                        <tbody class="item_list_sec">
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Item Total</td>
                                <td class="text-right itemtotal">$100</td>
                                <td></td>
                                 <td></td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td class="text-right tax">$10</td>
                                <td></td>
                                 <td></td>
                            </tr>
                            <tr>
                                <td>Delivery Charges</td>
                                <td class="text-right deliverycharge">$10</td>
                                <td></td>
                                 <td></td>
                            </tr>
                            <tr>
                                <th>To Pay</th>
                                <th class="text-right topay">$200</th>
                                <td></td>
                                 <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- Invoice Order Items Ends -->
            </div>
        </div>
    </div>

  
    <!-- Invoice Sidebar Ends -->

      <!-- Ratings Starts -->
    <div class="aside right-aside location" id="ratings-sidebar">
        <div class="aside-header">
            <span class="close" data-dismiss="aside"><i class="ion-close-round"></i></span>
            <h5 class="aside-tit">Rating &amp; Reviews</h5>
        </div>
        <div class="aside-contents">
            <div class="ratings">
                <!-- Rate Box Starts -->
                <div class="rate-box  shoprate">
                    <form  method="post"  action="<?php echo e(url('rating')); ?>" >
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="order_id" value="" class="orderid" />
                                <input type="hidden" name="type" value="shop" />
                    <h6 class="rate-tit">Rate this restaurant</h6>
                    <div class="row">
                        <!-- Order Box Section Left Starts -->
                        <div class="order-box-sec-left col-md-4 col-sm-4 col-xs-12">
                            <div class="order-img bg-img shop_img" style="background-image: url(img/food-1.jpg);"></div>
                        </div>
                        <!-- Order Box Section Left Ends -->
                        <!-- Order Box Section Center Starts -->
                        <div class="order-box-sec-center col-md-8 col-sm-8 col-xs-12">
                            <div class="order-details-sec">
                                <h6 class="hotel-tit shop_name">Pizza Hut</h6>
                                <input type="hidden" class="rating" name="rating">
                                <textarea class="form-control" name="comment" rows="2"></textarea>
                                <button class="rate-sub-btn">Submit</button>
                            </div>
                        </div>
                        <!-- Order Box Section Center Starts -->
                    </div> 
                    </form>                       
                </div>
                <!-- Rate Box Starts -->
                <!-- Rate Box Starts -->
                <div class="rate-box  boyrate">
                    <form  method="post"  action="<?php echo e(url('rating')); ?>" >
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="order_id" value="" class="orderid" />
                                <input type="hidden" name="type" value="transporter" />
                    <h6 class="rate-tit">Rate Delivery Boy</h6>
                    <div class="row">
                        <!-- Order Box Section Left Starts -->
                        <div class="order-box-sec-left col-md-4 col-sm-4 col-xs-12">
                            <div class="order-img bg-img del_boy_img" style="background-image: url(img/profile.jpg);"></div>
                        </div>
                        <!-- Order Box Section Left Ends -->
                        <!-- Order Box Section Center Starts -->
                        <div class="order-box-sec-center col-md-8 col-sm-8 col-xs-12">
                            <div class="order-details-sec">
                                <h6 class="hotel-tit del_boy_name">John Smith</h6>
                                <input type="hidden" class="rating" name="rating">
                                <textarea class="form-control" name="comment" rows="2"></textarea>
                                <button class="rate-sub-btn">Submit</button>
                            </div>
                        </div>
                        <!-- Order Box Section Center Starts -->
                    </div> 
                    </form>                       
                </div>
                <!-- Rate Box Starts -->
            </div>
        </div>
    </div>
      <?php echo $__env->make('user.layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
  <link href="<?php echo e(asset('assets/user/css/star.rating.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <script src="<?php echo e(asset('assets/user/js/star.rating.min.js')); ?>"></script>
<script type="text/javascript" >
 $('.itemlist').on('click',function(){
        var id = $(this).data('id');
        $('#invoice-sidebar').asidebar('open');
         $.ajax({
                url: "<?php echo e(url('orders')); ?>/"+id,
                type:'GET',
                success: function(data) { 
                    var item_list=""; var item_list_order = ""; var delivery_status ='';
                    if($.isEmptyObject(data.error)){
                        $('.deliverycharge').html("<?php echo e(Setting::get('currency')); ?>"+data.invoice.delivery_charge);
                        $('.tax').html("<?php echo e(Setting::get('currency')); ?>"+data.invoice.tax);
                        $('.topay').html("<?php echo e(Setting::get('currency')); ?>"+data.invoice.payable);
                        $('.itemtotal').html("<?php echo e(Setting::get('currency')); ?>"+data.invoice.gross);
                        if(data.status=='COMPLETED'){
                            delivery_status='<div class="deliver-status-left icon-left pull-left">\
                            <i class="ion-checkmark-round green-color"></i>\
                            </div>\
                            <div class="deliver-status-right icon-right">\
                                <p class="icon-txt">Delivered on '+data.updated_at+'</p>\
                                <p class="icon-txt">By '+data.transporter.name+'</p>\
                            </div>';
                            $('.delivery_status').html(delivery_status);
                        }
                        item_list_order +=' <div class="invoice-box row">\
                        <div class="invoice-box-left icon-left pull-left">\
                            <i class="ion-ios-location-outline"></i>\
                        </div>\
                        <div class="invoice-box-right icon-right">\
                            <span>From</span>\
                            <h6 class="icon-tit">'+data.shop.name+'</h6>\
                            <p class="icon-txt">'+data.shop.maps_address+'</p>\
                        </div>\
                    </div>\
                    <div class="invoice-box row">\
                        <div class="invoice-box-left icon-left pull-left">\
                            <i class="ion-ios-location-outline"></i>\
                        </div>\
                        <div class="invoice-box-right icon-right">\
                            <span>To</span>\
                            <h6 class="icon-tit">'+data.user.name+'</h6>\
                            <p class="icon-txt">'+data.address.maps_address+'</p>\
                        </div>\
                    </div>';
                     $('.invoice-location').html(item_list_order);
                        $.each( data.items, function( key, value ) {
                   
                            item_list +="<tr>\
                                <td class='text-left'>\
                                 <div class='food-menu-details'>\
                                    <h5>"+value.product.name+"</h5>\
                                    <p>"+value.product.description+"</p>\
                                    </div>\
                                </td>\
                                <td>"+value.quantity+"</td>\
                                <td>\
                                    <strong><?php echo e(Setting::get('currency')); ?> "+value.product.prices.price.toFixed(2)+"</strong>\
                                </td>\
                                <td>\
                                    <p><?php echo e(Setting::get('currency')); ?> "+(value.product.prices.price*value.quantity).toFixed(2)+"</p>\
                                </td>\
                            </tr>";
                                 $.each(value.cart_addons, function( key, valuee ) { console.log(valuee.quantity);
                                        item_list +="<tr>\
                                        <td class='text-left'>\
                                            <figure class='thumb_menu_list'><img src='<?php echo e(asset("assets/user/img/menu-thumb-15.jpg")); ?>' alt='thumb'></figure>\
                                            <h5>"+valuee.addon_product.addon.name+"</h5>\
                                            <p>(Addons)</p>\
                                        </td>\
                                        <td>"+value.quantity+"X"+valuee.quantity+"</td>\
                                        <td>\
                                            <strong><?php echo e(Setting::get('currency')); ?> "+valuee.addon_product.price.toFixed(2)+"</strong>\
                                        </td>\
                                        <td>\
                                            <p><?php echo e(Setting::get('currency')); ?> "+(value.quantity*valuee.addon_product.price*valuee.quantity).toFixed(2)+"</p>\
                                        </td>\
                                    </tr>";  
                                });


                        });
                        $('.item_list_sec').html(item_list);
                    }
                },
                error:function(jqXhr,status){ 
                    if( jqXhr.status === 422 ) {
                        $(".print-error-msg").show();
                        var errors = jqXhr.responseJSON; 

                        $.each( errors , function( key, value ) { 
                            $(".print-error-msg").find("ul").append('<li>'+value[0]+'</li>');
                        });
                    } 
                }
            });
        $('#product-list').modal('show');
    });
$('.ratingreview').on('click',function(){
        var id = $(this).data('id');
        $('.orderid').val(id);
        var img_shop = $(this).data('imgshop');
        $('.shop_img').css('background-image','url(' + img_shop + ')');
        var img_transporter = $(this).data('imgboy');
        $('.del_boy_img').css('background-image','url(' + img_transporter + ')');
        var shop_name = $(this).data('shopname');
        $('.shop_name').html(shop_name);
        var boy_name = $(this).data('boyname');
        $('.del_boy_name').html(boy_name);
        if($(this).data('rateshop')!=0){
            $('.shoprate').hide();
        }
        if($(this).data('rateboy')!=0){
            $('.boyrate').hide();
        }
        $('#ratings-sidebar').asidebar('open');
});
</script>
<script src=https://cdn.pubnub.com/sdk/javascript/pubnub.4.0.11.min.js></script>
 <?php $__empty_1 = true; $__currentLoopData = $Orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Index => $Order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<?php $user_id = $Order->user->id; ?>
<script type="text/javascript">
    var total_chat = 0;
    var chatRequestId = 0;
    var chatUserId = 0;
    var chatload = 0;
    var initialized = false;
    var socketClient;
    initChat();
    updateChatParam(<?php echo e($Order->id); ?>, <?php echo e($user_id); ?>);

    function updateChatParam(pmrequestid, pmuserid) {
        console.log('Chat Params', pmrequestid, pmuserid);
        chatRequestId = pmrequestid;
        chatUserId = pmuserid;
        if(initialized == false) {
            socketClient.channel = pmrequestid;
            socketClient.initialize();
            socketClient.channel = pmrequestid;
            socketClient.pubnub.subscribe({channels:[socketClient.channel]});
            initialized = true;            
        }  
    }
    function initChat(){
        chatBox = document.getElementById('chat-box');
        chatInput = document.getElementById('chat-input');
        chatSend = document.getElementById('chat-send');
        chatSockets = function () {}
        chatSockets.prototype.initialize = function() { 
            this.pubnub = new PubNub({ 
                publishKey : '<?php echo e(Setting::get('PUBNUB_PUB_KEY')); ?>',
                subscribeKey : '<?php echo e(Setting::get('PUBNUB_SUB_KEY')); ?>'
            });
            console.log('Connect Channel', this.channel);
            this.pubnub.addListener({
                message: function(data) {  //beepOne.play();
                    console.log("New Message :: "+JSON.stringify(data));
                    if(data.message){
                        total_chat++;
                        console.log(total_chat);
                        $('#chat_<?php echo e($Order->id); ?>').html(total_chat);
                    }
                }
            });
        }

       

        socketClient = new chatSockets();

       

    }
</script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>