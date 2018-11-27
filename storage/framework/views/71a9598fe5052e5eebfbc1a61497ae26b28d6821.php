

<?php $__env->startSection('content'); ?>
 <div class="card">
    <div class="card-header">
        <h4 class="card-title">Deliveries</h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <form>
            <input type="hidden" name="list" value="true" />
            <input type="hidden" name="all" value="<?php echo e(Request::get('all')); ?>" />
            <div class="form-group col-xs-12 mb-2">
                <div class="form-group col-xs-6 ">
                    <label>Restaurant</label>
                    <select id="user_name" name="sp" class="form-control">
                         <option value=""   >Select</option>
                        <?php $__empty_1 = true; $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($id); ?>"  <?php if(Request::get('sp')==$id): ?> selected  <?php endif; ?>  ><?php echo e($name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group col-xs-6 ">
                    <label>Delivery People</label>
                    <select id="user_name" name="dp" class="form-control">
                         <option value=""   >Select</option>
                        <?php $__empty_1 = true; $__currentLoopData = $Providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($id); ?>"  <?php if(Request::get('sp')==$id): ?> selected  <?php endif; ?>  ><?php echo e($name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group col-xs-12 mb-2">
                <div class="form-group col-xs-6 ">
                    <label>Status</label>
                    <select id="user_name" name="st" class="form-control">
                        <option value=""   >Select</option>
                        <option value="completed"  <?php if(Request::get('st')=='completed'): ?> selected  <?php endif; ?>  >Completed</option>        
                        <option value="cancelled"  <?php if(Request::get('st')=='cancelled'): ?> selected  <?php endif; ?>  >Cancelled</option>
                    </select>
                </div>
                <div class="form-group col-xs-6 ">
                    <label>Payment Method</label>
                    <select id="user_name" name="pm" class="form-control">
                         <option value=""   >Select</option>
                        <option value="cash" <?php if(Request::get('pm')=='cash'): ?> selected  <?php endif; ?>  >Cash</option>
                        <option value="wallet" <?php if(Request::get('pm')=='wallet'): ?> selected  <?php endif; ?>  >Wallet</option>
                        <option value="card" <?php if(Request::get('pm')=='card'): ?> selected  <?php endif; ?>  >Credit Card</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-xs-12 ">
                <div class="form-group col-xs-6 ">
                    <label>Start Date</label>
                    <input type="text" id="date" required  readonly name="start_date" value="<?php echo e(Request::get('start_date')); ?>" class="form-control datepicker"/>
                </div>
                <div class="form-group col-xs-6 ">
                    <label>End Date</label>
                    <input type="text" id="date" required  readonly name="end_date" value="<?php echo e(Request::get('end_date')); ?>" class="form-control datepicker"/>
                </div>
            </div>
            <button class="pull-right btn btn-success">Search</button>
            </form>
        </div>
        <?php $total_earning = $total_gross = $total_delivery = 0; ?>
        <div class="card-block card-dashboard table-responsive">
            <div><a href="<?php echo e((Request::getPathInfo() .'?'. (Request::getQueryString().'&exl=1'))); ?>"  class="btn btn-primary">Export As Excel</a></div>
            <br/>
            <table class="table table-striped table-bordered file-export">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Customer Name</th>
                        <th>Delivery People</th>
                        <th>Restaurant</th>
                        <th>Address</th>
                        <th>Cost</th>
                        <th>Status</th>
                        <th>Order List</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $Orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Index => $Order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php $total_earning +=$Order->invoice->net;
                          $total_gross +=$Order->invoice->gross;
                          $total_delivery +=$Order->invoice->delivery_charge;
                     ?>
                    <tr>
                        <td><?php echo e($Index + 1); ?></td>
                        <td><?php echo e($Order->user->name); ?></td>
                        <td>
                            <?php echo e(@$Order->transporter->name); ?>

                        </td>
                        <td><?php echo e(@$Order->shop->name); ?></td>
                        <td><?php echo e(@$Order->address->building); ?></td>
                        <td><?php echo e(Setting::get('currency')); ?><?php echo e(@$Order->invoice->net); ?></td>
                        <td><span class="tag <?php if($Order->status=='COMPLETED'): ?> tag-success 
                        <?php elseif($Order->status=='CANCELLED'): ?> tag-danger <?php else: ?> tag-primary  <?php endif; ?>
                        "><?php echo e($Order->status); ?></span></td>
                        <td>
                            <button class="btn btn-primary btn-darken-3 tab-order orderlist" data-id="<?php echo e($Order->id); ?>" >Order List</button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-block">
        <h3>Total Earning:- </h3>
        <?php if(count($Orders)>0): ?>
        <?php 

            $total_food_commision = $total_gross*(Setting::get('COMMISION_OVER_FOOD')/100);
            $total_delivery_commision = $total_delivery*(Setting::get('COMMISION_OVER_DELIVERY_FEE')/100);
        ?>
            <div class="row m-0">
                <dt class="col-sm-3 order-txt p-0">Total Earning</dt>
                <dd class="col-sm-9 order-txt "><span>: <?php echo e(currencydecimal($total_earning)); ?></span></dd>
            </div>
            <div class="row m-0">
                <dt class="col-sm-3 order-txt p-0">Commision from Food Items</dt>
                <dd class="col-sm-9 order-txt "><span>: <?php echo e(currencydecimal($total_food_commision)); ?></span> </dd>
            </div>
            <div class="row m-0">
                <dt class="col-sm-3 order-txt p-0">Commision from Delivery Charge</dt>
                <dd class="col-sm-9 order-txt "><span>: <?php echo e(currencydecimal($total_delivery_commision)); ?></span> </dd>
            </div>
            <div class="row m-0">
                <dt class="col-sm-3 order-txt p-0">Total Commision </dt>
                <dd class="col-sm-9 order-txt "><span>: <?php echo e(currencydecimal($total_food_commision+$total_delivery_commision)); ?></span> </dd>
            </div>
        <?php endif; ?>
        </div>
    </div>
</div>


<!-- Order List Modal Starts -->
<div class="modal fade text-xs-left" id="order-list">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal-title" id="myModalLabel1">Order List</h2>
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
                            <dt class="col-sm-3 order-txt p-0">Shop Rating</dt>
                            <dd class="col-sm-9 order-txt rate_shop"></dd>
                        </div>
                        <div class="row m-0">
                            <dt class="col-sm-3 order-txt p-0">Delivery boy rating</dt>
                            <dd class="col-sm-9 order-txt rate_deliveryboy"></dd>
                        </div>
                        <div class="row m-0">
                            <dt class="col-sm-3 order-txt p-0">Total Amount</dt>
                            <dd class="col-sm-9 order-txt tot_amt"><span>: </span> $1600</dd>
                            <br/>
                            <br/>
                        </div>
                        <div class="row m-0" >
                            <dt class="col-sm-3 order-txt p-0 status-title">Status</dt>
                            <dt class="col-sm-9 order-txt ">Time</dt>
                        </div>
                         <div class="row m-0" id="order_status_list">
                            <dt class="col-sm-3 order-txt p-0">INCOMING</dt>
                            <dd class="col-sm-9 order-txt ">  <?php echo e(date("Y-m-d H:i:s")); ?></dd>
                        </div>
                        <hr/>
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
                                    <th></th>
                                    <th>Discount</th>
                                    <th class="discount"> <?php echo e(Setting::get("currency")); ?> 1600</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Delivery Charge</th>
                                    <th class="delivery_charge"> <?php echo e(Setting::get("currency")); ?> 1600</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Tax</th>
                                    <th class="tax"> <?php echo e(Setting::get("currency")); ?> 1600</th>
                                </tr>
                                <tr>
                                    <th></th>
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
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/js/jquery.time-to.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
$('.orderlist').on('click',function(){ 
    var order_id = $(this).data('id');
    var order_date;
    $.ajax({
        url: "<?php echo e(url('admin/orders')); ?>/"+order_id,
        success: function(result){
            $('#order_timer').timeTo({
                timeTo: order_date,
                theme: "black",
                displayCaptions: true,
                fontSize: 30,
                captionSize: 10
            });
            order_date = new Date(new Date(result.Order.created_at));
            $('.orderid').html('<span>: </span>'+result.Order.id);
            $('.rest_name').html('<span>: </span>'+result.Order.shop.name);
            $('.cust_name').html('<span>: </span>'+result.Order.user.name);
            $('.cust_phone').html('<span>: </span>'+result.Order.user.phone);
             if(result.Order.reviewrating){
                if(result.Order.reviewrating.shop_rating){
                    var rate = '<div class="rating">';
                        for(var i=1;i<=result.Order.reviewrating.shop_rating;i++){
                        rate+='<i class="fa fa-star" aria-hidden="true"></i>';
                        }
                        for(var i=1;i<=(5-result.Order.reviewrating.shop_rating);i++){
                        rate+='<i class="fa fa-star-o" aria-hidden="true"></i>';
                        }
                        rate+='</div>';
                    $('.rate_shop').html('<span>: </span>'+rate);
                }else{
                    $('.rate_shop').html('<span>: -- </span>'); 
                }
            }else{
               $('.rate_shop').html('<span>: -- </span>'); 
            }
            if(result.Order.reviewrating){
                if(result.Order.reviewrating.transporter_rating){
                    var rate = '<div class="rating">';
                        for(var i=1;i<=result.Order.reviewrating.transporter_rating;i++){
                        rate+='<i class="fa fa-star" aria-hidden="true"></i>';
                        }
                        for(var i=1;i<=(5-result.Order.reviewrating.transporter_rating);i++){
                        rate+='<i class="fa fa-star-o" aria-hidden="true"></i>';
                        }
                        rate+='</div>';
                    $('.rate_deliveryboy').html('<span>: </span>'+rate);
                }else{
                    $('.rate_deliveryboy').html('<span>: -- </span>');
                }
            }else{
               $('.rate_deliveryboy').html('<span>: -- </span>'); 
            }
            if(result.Order.delivery_date){
                $('.cust_delivery_date').html('<span>: </span>'+result.Order.delivery_date);
            }else{
                $('.cust_delivery_date').html('<span>: </span>'+result.Order.created_at);
            }
            if(result.Order.note){
                $('.cust_order_note').html('<span>: </span>'+result.Order.note);
            }else{
               $('.cust_order_note').html('<span>: -- </span>'); 
            }
            $('.address').html('<span>: </span>'+result.Order.address.map_address);
            $('.tot_amt').html("<span>: </span> <?php echo e(Setting::get('currency')); ?>"+result.Order.invoimaps_addressce.net);
            $('.discount').html("<span>: </span> <?php echo e(Setting::get('currency')); ?>"+result.Order.invoice.discount);
            $('.delivery_charge').html("<span>: </span> <?php echo e(Setting::get('currency')); ?>"+result.Order.invoice.delivery_charge);
            $('.tax').html("<span>: </span> <?php echo e(Setting::get('currency')); ?>"+result.Order.invoice.tax);
            $('#order-list').modal('show');
            var statuslist='';
            $.each( result.Order.ordertiming, function( key, value ) {
                statuslist+='<dd class="col-sm-3 order-txt p-0">'+value.status+'</dd>\
                <dd class="col-sm-9 order-txt "> '+value.created_at+'</dd>';
            });
            $('#order_status_list').html(statuslist);
            var table = '';
            console.log(result.Cart);
            $.each( result.Cart, function( key, value ) {
            table +='<tr>';
               if(value.product.images.length>0){
                table +='<td><div class="bg-img order-img" style="background-image: url('+value.product.images[0].url+');"></div></td>';
                }
                table +='<td>'+value.product.name+'</td><td>'+value.note+'</td><td><?php echo e(Setting::get('currency')); ?>'+value.product.prices.price.toFixed(2)+'</td><td>'+value.quantity+'</td><td><?php echo e(Setting::get('currency')); ?>'+(value.quantity*value.product.prices.price).toFixed(2)+'</td></tr>';
                    $.each(value.cart_addons, function( key, valuee ) { console.log(valuee.quantity);
                            table +="<tr>\
                            <td class='text-left'>\
                                <h5>"+valuee.addon_product.addon.name+"</h5>\
                                <p>(Addons)</p>\
                            </td>\
                            <td>\
                                <strong><?php echo e(Setting::get('currency')); ?>"+valuee.addon_product.price.toFixed(2)+"</strong>\
                            </td>\
                            <td>"+value.quantity+"X"+valuee.quantity+"</td>\
                            <td>\
                                <p><?php echo e(Setting::get('currency')); ?>"+(value.quantity*valuee.addon_product.price*valuee.quantity).toFixed(2)+"</p>\
                            </td>\
                        </tr>";  
                     });
                
            });
            $('.cartstbl').html(table);
        }
    });
});
$('.datepicker').datepicker();
</script> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>