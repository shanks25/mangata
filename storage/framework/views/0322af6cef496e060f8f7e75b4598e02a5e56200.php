<?php $__env->startSection('content'); ?>
 <!-- Content Wrapper Starts -->
        <div class="content-wrapper gray-bg">
            <div class="checkout p-40">
                <div class="container-fluid">
                    <!-- Checkout Left Starts -->
                   
                    
                    <div class="cart-left-outer col-md-8 col-sm-12 col-xs-12">
                        <div class="checkout-left">
                            <!-- Delivery Block Starts -->
                            <div class="checkout-left-block delivery-block">
                                <div class="checkout-left-head row m-0">
                                    <div class="pull-left">
                                        <h4>Delivery Address <i class="ion-checkmark-round check"></i></h4>
                                        <p>Multiple addresses in this location</p>
                                    </div>
                                    <div class="pull-right">
                                        <a href="javascript:void(0);" class="change-link">Change</a>
                                    </div>
                                </div>
                                <div class="checkout-left-content delivery-address row">
                                    
                                    <!-- Address Box Ends -->
                                    <?php $add_type = ['home'=> 'home','work'=> 'work','other'=> 'other'];
                                    $delivery_id =0; ?>
                                    <?php $__empty_1 = true; $__currentLoopData = Auth::user()->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php
                                        $delivery_addr_id = $address->id;
                                        if(in_array($address->type, $add_type)){ 
                                            if($address->type=='other'){
                                            }else{
                                                unset($add_type[$address->type]);
                                            }
                                        }
                                    ?>
                                    <!-- Address Box Starts -->
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <a href="javascript:void(0);" data-id="<?php echo e($address->id); ?>" class="address-box address-cmn-box row m-0 update_addr">
                                            <div class="address-box-left pull-left">
                                                <?php if($address->type=='work'): ?>
                                                <i class="ion-ios-briefcase-outline address-icon"></i>
                                                <?php else: ?>
                                                <i class="ion-ios-location-outline address-icon"></i>
                                                <?php endif; ?>
                                            </div>
                                            <div class="address-box-right">
                                                <input type="hidden" class="address_id" value="<?php echo e($address->id); ?>" />
                                                <h6 class="address-tit addr-type"><?php echo e($address->type); ?></h6>
                                                <p class="address-txt addr-map"><?php echo e($address->map_address); ?></p>
                                                <h6 class="address-delivery-time"><?php echo e($Shop->estimated_delivery_time); ?>Mins</h6>
                                                <button class="address-btn">Delivery Here</button>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Address Box Ends -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                              
                                    <?php endif; ?>
                                    <?php //print_r($add_type); ?>
                                    <!-- Address Box Ends -->
                                    <!-- Address Box Starts -->
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <a href="#" class="address-cmn-box add-new-address row m-0" onclick="$('#location-sidebar').asidebar('open')">
                                            <div class="address-box-left pull-left">
                                                <i class="ion-ios-location-outline address-icon"></i>
                                            </div>
                                            <div class="address-box-right">
                                                <h6 class="address-tit">Add New Address</h6>
                                                <!-- <p class="address-txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
                                                <button class="address-btn">Add New</button>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Address Box Ends -->
                                </div>
                                <div class="selected-address">
                                    <h6 class="address-tit addr_type"></h6>
                                    <p class="address-txt addr_map"></p>
                                    <!-- <input type="hidden" id="user_address_id" name="user_address_id" /> -->
                                    <h6 class="address-delivery-time">40Mins</h6>
                                </div>
                            </div>
                            <!-- Delivery Block Ends -->
                            <!-- Payment Block Starts -->
                            <div class="checkout-left-block payment-block">
                                <div class="payment-block-inner">
                                    <div class="checkout-left-head">
                                        <h4 class="m-0">Payment</h4>
                                    </div>
                                    <div class="payment-content row">
                                        <!-- Payment Left Starts -->
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <div class="payment-content-left">
                                                <ul class="nav nav-tabs payment-tabs" role="tablist">
                                                   
                                                 <!--  <li class="active">
                                                        <a href="#cash" aria-controls="card" role="tab" data-toggle="tab" class="payment_mode_type cassh" data-id="cash" ><span><i class="mdi mdi-credit-card"></i></span> Cash</a>
                                                    </li> -->
<li>
                                                        <a href="#wallet" aria-controls="card" role="tab" data-toggle="tab" class="payment_mode_type" data-id="card" ><span><i class="mdi mdi-credit-card"></i></span> Wallet</a>
                                                    </li>

                                                    <li>
                                                        <a href="#card" aria-controls="card" role="tab" data-toggle="tab" class="payment_mode_type" data-id="card" ><span><i class="mdi mdi-credit-card"></i></span> Credit &amp; Debit Cards</a>
                                                    </li>
                                                  
                                                   <!--  <li>
                                                        <a href="#bitcoin" aria-controls="bitcoin" role="tab" data-toggle="tab"><span class="pay-icon"><img src="img/bitcoin.png"></span> Bitcoin</a>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Payment Left Ends -->

                                        <!-- Payment Right Starts -->
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <div class="tab-content payment-content-right">
                                              
                                                <!-- Card Tab Starts -->
                                                <div role="tabpanel" class="tab-pane fade in active" id="wallet">
                                                    Wallet (<?php echo $user_wallet_balance;?>)
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="card">
                                                    
                                                    <div class="cards-list">
                                                        <?php $card_id = 0;?>
                                                        <?php $__empty_1 = true; $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php if(@$card->is_default): ?>
                                                            <?php $card_id = $card->id; ?>
                                                        <!-- Saved Cards Box Starts -->
                                                        <div class="saved-cards-box">
                                                            <!-- Saved Card Box Top Starts -->
                                                            <div class="saved-cards-box-top row m-0">
                                                                <div class="saved-cards-box-left pull-left">
                                                                    <i class="fa fa-cc-visa"></i>
                                                                </div>
                                                                <div class="saved-cards-box-center pull-left">
                                                                    <p class="card-number">XXX XXX XXXX <?php echo e($card->last_four); ?></p>
                                                                    <!-- <p class="valid">Valid Till 10/2022</p> -->
                                                                </div>
                                                            </div>
                                                            <!-- Saved Card Box Top Ends -->
                                                            <!-- Saved Card Box Bottom Starts -->
                                                            <div class="saved-cards-box-btm">
                                                                 <input type="radio" class="form-control cvv default cardpay"  value="<?php echo e($card->id); ?>"  
                                                                 name="payment_method" id="card_<?php echo e($card->id); ?>"/>
                                                                <label class="pay-btn" for="card_<?php echo e($card->id); ?>"> Pay </label>
                                                            </div>
                                                            <!-- Saved Card Box Bottom Ends -->
                                                        </div>
                                                        <!-- Saved Cards Box Ends -->
                                                        <?php else: ?>
                                                            <div class="saved-cards-box">
                                                            <!-- Saved Card Box Top Starts -->
                                                            <div class="saved-cards-box-top row m-0">
                                                                <div class="saved-cards-box-left pull-left">
                                                                    <i class="fa fa-cc-visa"></i>
                                                                </div>
                                                                <div class="saved-cards-box-center pull-left">
                                                                    <p class="card-number">XXX XXX XXXX <?php echo e($card->last_four); ?></p>
                                                                    <!-- <p class="valid">Valid Till 10/2022</p> -->
                                                                </div>
                                                            </div>
                                                            <!-- Saved Card Box Top Ends -->
                                                            <!-- Saved Card Box Bottom Starts -->
                                                            <div class="saved-cards-box-btm">
                                                                
                                                                 <input type="radio" class="form-control cvv" value="<?php echo e($card->id); ?>"  
                                                                 name="payment_method" id="card_<?php echo e($card->id); ?>">
                                                                <label class="pay-btn" for="card_<?php echo e($card->id); ?>"> Pay </label>
                                                            </div>
                                                            <!-- Saved Card Box Bottom Ends -->
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <div><?php echo app('translator')->getFromJson('home.payment.no_card'); ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                     <a href="#" class="add-card-box row m-0" onclick="$('#addcard-sidebar').asidebar('open')">
                                            <div class="add-card-right">
                                                <h6 class="address-tit">Add New card</h6>
                                                        </div>
                                                        <div class="add-card-right">
                                                           
                                        <button class="address-btn add-new">Add New</button>
                                                        </div>
                                                    </a>
                                                </div>
                                                <!-- Card Tab Ends -->
                                                <!-- Netbanking Tab Starts -->
                                              
                                                <!-- Ripple Tab Starts -->
                                                <div role="tabpanel" class="tab-pane fade" id="ripple">
                                                    <div class="crypto">
                                                        <div class="crypto-head">
                                                            <h5 class="bit-coin-tit">1 Ripple = <?php echo e($ripple_response->last); ?> USD</h5>
                                                            <h6 class="bit-coin-txt">You want pay 20Ripple</h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" value="<?php echo e(setting::get('RIPPLE_KEY')); ?>" name="" required>
                                                        </div>
                                                        <div class="crypto-img">
                                                            <h6>Scan QR Code</h6>
                                                            <img src="<?php echo e(Setting::get('RIPPLE_BARCODE')); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Transaction ID</label>
                                                            <input type="text" class="form-control" placeholder="Transaction ID"  name="payment_id" id="transaction_id_ripple" required>
                                                            <div id ="ripple_form_error" class="ripple_error"></div>
                                                        </div>
                                                        <button type="button" onclick="checkpayment('ripple');" class="confirm-btn">Confirm</button>
                                                    </div>
                                                </div>
                                                <!-- Ripple Tab Ends -->
                                                <!-- Ethereum Tab Starts -->
                                                <div role="tabpanel" class="tab-pane fade" id="ethereum">
                                                    <div class="crypto">
                                                        <div class="crypto-head">
                                                            <h5 class="bit-coin-tit">1 Ethereum = <?php echo e($ether_response->result->ethusd); ?> USD</h5>
                                                            <h6 class="bit-coin-txt">You want pay 20 Ethereum</h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" placeholder="<?php echo e(Setting::get('ETHER_KEY')); ?>" name="">
                                                        </div>
                                                        <div class="crypto-img">
                                                            <h6>Scan QR Code</h6>
                                                            <img src="<?php echo e(Setting::get('ETHER_BARCODE')); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Transaction ID</label>
                                                            <input type="text" name="payment_id" id="transaction_id_eather" class="form-control" placeholder="Transaction ID" name="">
                                                            <div id ="eather_form_error" class="ripple_error"></div>
                                                        </div>
                                                    <button type="button" onclick="checkpayment('eather');"  class="confirm-btn">Confirm</button>
                                                    </div>
                                                </div>
                                                <!-- Ethereum Tab Ends -->
                                                <!-- Bitcoin Tab Starts -->
                                                <div role="tabpanel" class="tab-pane fade" id="bitcoin">
                                                    <div class="crypto">
                                                        <div class="crypto-head">
                                                            <h5 class="bit-coin-tit">1 Bitcoin = $40.00</h5>
                                                            <h6 class="bit-coin-txt">You want pay 20 Bitcoin</h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" placeholder="1F1tAaz5x1HUXrCNLbtMDqcw6o5GNn4xqX" name="">
                                                        </div>
                                                        <div class="crypto-img">
                                                            <h6>Scan QR Code</h6>
                                                            <!-- <img src="img/barcode.png"> -->
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Transaction ID</label>
                                                            <input type="text" class="form-control" placeholder="Transaction ID" name="">
                                                        </div>
                                                        <button class="confirm-btn">Confirm</button>
                                                    </div>
                                                </div>
                                                <!-- Bitcoin Tab Ends -->
                                            </div>
                                        </div>
                                        <!-- Payment Right Ends -->
                                    </div>
                                </div>
                            </div>
                            <!-- Payment Block Ends -->
                        </div>
                    </div>
                    <!-- Checkout Left Ends -->
                    <!-- Checkout Right Starts -->
                    <div class="cart check-cart cart-main-page col-md-4 col-sm-12 col-xs-12 p-0">
                        <div class="cart-inner">
                            <!-- Cart Head Starts -->
                            <?php if(count($Cart)>0): ?>
                             <form  action="<?php echo e(url('orders')); ?>" id="order_checkout" method="POST">
                                    <?php echo e(csrf_field()); ?>

                            <div class="cart-head">
                                <h4 class="cart-tit">Cart</h4>
                                <p class="cart-txt">from <a href="<?php echo e(url('/restaurant/details')); ?>?name=<?php echo e($Shop->name); ?>" class="cart-link"><?php echo e($Shop->name); ?></a></p>
                                <p class="cart-head-txt"><?php echo e(count($Cart['carts'])); ?> Items</p>
                            </div>
                            <!-- Cart Head Ends -->
                            <!-- Cart Section Starts -->
                            <div class="cart-section table-responsive">
                                <table class="table table-responsive">
                                    <thead>
                                    </thead>
                                    <tbody>
                                     <?php $tot_gross=0;?>
                                    <?php $__empty_1 = true; $__currentLoopData = $Cart['carts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                         <?php $tot_gross += $item->quantity*$item->product->prices->price;  ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="row m-0">
                                                     <?php if($item->product->food_type=='veg'): ?>
                                                    <img src="<?php echo e(asset('assets/user/img/veg.jpg')); ?>" class="veg-icon">
                                                    <?php else: ?>
                                                    <img src="<?php echo e(asset('assets/user/img/non-veg.jpg')); ?>" class="veg-icon">
                                                    <?php endif; ?>
                                                    <div class="food-menu-details">
                                                        <h5><?php echo e($item->product->name); ?></h5>
                                                         <input type="hidden" value="<?php echo e(@$item->product->prices->price); ?>" name="price" id="product_price_<?php echo e($item->product->id); ?>" />
                                                        <?php if(count($item->cart_addons)>0): ?>
                                                      <a href="#" class="custom-txt add_to_basket" 
                                                        data-id="<?php echo e($item->id); ?>"
                                                        data-productid="<?php echo e($item->product->id); ?>">Customize <i class="ion-chevron-right"></i></a> 
                                                     
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </th>
                                            <td>
                                                <button type="button" class="cart-add-btn">
                                                    <div class="numbers-row" data-id="<?php echo e($item->id); ?>" data-pid="<?php echo e($item->product->id); ?>" >
                                                        <input type="number" min="1" data-price="<?php echo e($item->product->prices->price); ?>" readonly="" name="add-quantity" class="add-sec" id="add-quantity_<?php echo e($item->id); ?>" value="<?php echo e($item->quantity); ?>">
                                                    </div>
                                                </button>
                                            </td>
                                            <td class="text-right">
                                                <p class="total_product_<?php echo e($item->id); ?>"><?php echo e(currencydecimal($item->quantity*$item->product->prices->price)); ?></p>
                                            </td>
                                            <?php $__empty_2 = true; $__currentLoopData = $item->cart_addons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartaddon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <?php //print_r($cartaddon); ?>
                                            <input type="hidden" value="<?php echo e($cartaddon->quantity); ?>" id="cart_addon_<?php echo e($cartaddon->user_cart_id); ?>_<?php echo e($cartaddon->addon_product_id); ?>" />
                                            <?php $tot_gross += $item->quantity*$cartaddon->quantity*$cartaddon->addon_product->price;  ?>
                                           
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                             
                                        <?php endif; ?>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr><td colspan="2">Empty Cart!</td></tr>
                                        <?php endif; ?>
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Item Total</td>
                                            <td></td>
                                            <td class="text-right sub-total"><?php echo e(currencydecimal($tot_gross)); ?></td>
                                            <input type="hidden" id="total_price" value="<?php echo e($tot_gross); ?>"/>
                                            <input type="hidden" id="total_addons_price" value="0"/>
                                            <input type="hidden" id="total_product_price" value="<?php echo e($tot_gross); ?>"/>
                                        </tr>
                                        <tr>
                                            <td> Discount</td>
                                            <td></td>
                                            <td class="text-right">
                                                <?php
                                                    $discount=0;
                                                    $net = $tot_gross;
                                                    if($Shop->offer_percent){
                                                        if($tot_gross > $Shop->offer_min_amount){
                                                           //$discount = roundPrice(($tot_gross*($Shop->offer_percent/100)));
                                                           $discount = number_format(($tot_gross*($Shop->offer_percent/100)),2,'.','');
                                                           //if()
                                                           $net = $tot_gross - $discount;
                                                        }
                                                    }
                                                 ?>
                                               -<?php echo e(currencydecimal($discount)); ?>

                                            </td>
                                        </tr>
                                        <?php
                                                    $discount=0;
                                                    $tax = number_format($net*(Setting::get('tax')/100),2,'.','');
                                                    $net =$net+$tax+Setting::get('delivery_charge');
                                                 ?>
                                        <tr>
                                            <td>Tax(<?php echo e(Setting::get('tax')); ?>%)</td>
                                            <td></td>
                                            <td class="text-right to_tax"><?php echo e(currencydecimal($tax)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Delivery Charges</td>
                                            <td></td>
                                            <td class="text-right"><?php echo e(currencydecimal(Setting::get('delivery_charge'))); ?></td>
                                        </tr>
                                        <tr>
                                            <th>To Pay</th>
                                            <th></th>
                                            <th class="text-right to_pay"><?php echo e(currencydecimal(roundPrice($net))); ?></th>
                                             <input type="hidden" name="amount" id="total_amount_pay" value="<?php echo e(roundPrice($net)); ?>" />
                                             <input type="hidden" id="user_address_id" name="user_address_id" value="" />
                                             <input type="hidden" id="total_payment_mode" value="<?php echo e(Setting::get('payment_mode')); ?>" name="payment_mode" />
                                            <input type="hidden" id="card_id" value="" name="card_id" />
                                            <input type="hidden" id="promocode_id" value="" name="promocode_id" />
                                            <input type="hidden" id="total_transaction_id" name="payment_id" />
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row m-0" style="display: none">
                                <div class="coupon-left pull-left">
                                        <input type="radio"  name="payment_mode_type" class="payment_mode_type cash" value="cash"  ><label for="cash">Cash</label>
                                    </div>
                                    <div class="coupon-right pull-right">
                                         <input type="radio" name="payment_mode_type" class="payment_mode_type card" value="card"  ><label for="card">Card</label>
                                    </div>
                                </div>
                            <a href="#" class="coupon" onclick="$('#coupon-sidebar').asidebar('open')">
                                <div class="row m-0">
                                    <div class="coupon-left pull-left">
                                        Have a coupon code?
                                    </div>
                                    <div class="coupon-right pull-right">
                                        Apply Coupon
                                    </div>
                                </div>
                            </a>
                            <button  type="submit" disabled="true" class="checkout-btn cart-main-btn  btn_checkout">Proceed to Pay</button>
                            <div class="row m-0">
                            <div class="alert alert-danger chkouterrors" style="display: none">
                            </div>
                            </div>
                            <!-- Cart Section Ends -->

                        </form>
                        <?php else: ?>

                        <?php endif; ?>

                        </div>
                    </div>
                    <!-- Checkout Right Ends -->
                    
                </div>
            </div>
        </div>
        <!-- Content Wrapper Ends -->
    </div>
    <!-- Main Warapper Ends -->
  
    <!-- Location Sidebar Ends -->
    <!-- Coupon Sidebar Starts -->
    <div class="aside right-aside coupon-sidebar" id="coupon-sidebar">
        <div class="aside-header">
            <span class="close" data-dismiss="aside"><i class="ion-close-round"></i></span>
            <h5 class="aside-tit">Coupons</h5>
        </div>
        <div class="aside-contents">
            <form class="common-form">
                <div class="input-group">
                    <input type="text" class="form-control" id="couponcode_apply" value="" placeholder="Enter Coupon" readonly>
                    <a href="javascript:void(0);" class="input-group-addon appcupon_apply">Apply</a>
                </div>
                <div class="input-group">
                    <span class="success message" ></span>
                </div>
            </form>
            <!-- Coupons List Starts -->
            <div class="coupons-list">
                <h6 class="avail-coupon-tit">OR USE AVAILABLE COUPONS</h6>
                <!-- Coupon Box Starts -->
                <?php $__empty_1 = true; $__currentLoopData = $Promocodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Promocode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($Promocode->pusage == null): ?>
                <div class="coupon-box">
                    <p class="coupon-name"><?php echo e($Promocode->promo_code); ?></p>
                   <!--  <p class="coupon-txt">Pay via Visa Signature Cards &amp; get additional 10x Reward Points on every  $150 spent. Use Code KIU10X</p> -->
                    <div class="coupon-details">
                        <div class="coupon-det-box row m-0">
                            <div class="col-xs-6 p-l-0">
                                <p class="coupon-det-txt coupon-det-txt1"><!-- Min cart amount --></p>
                            </div>
                            <div class="col-xs-6 p-l-0">
                                <p class="coupon-det-txt coupon-det-txt2"><?php echo e(currencydecimal($Promocode->discount)); ?></p>
                            </div>
                        </div>
                        <div class="coupon-det-box row m-0">
                            <div class="col-xs-6 p-l-0">
                                <p class="coupon-det-txt coupon-det-txt1">Valid till</p>
                            </div>
                            <div class="col-xs-6 p-l-0">
                                <p class="coupon-det-txt coupon-det-txt2">Expires in <?php echo e(date('d-m-Y',strtotime($Promocode->expiration))); ?></p>
                            </div>
                        </div>
                       <!--  <div class="coupon-det-box row m-0">
                            <div class="col-xs-6 p-l-0">
                                <p class="coupon-det-txt coupon-det-txt1">Payment method</p>
                            </div>
                            <div class="col-xs-6 p-l-0">
                                <p class="coupon-det-txt coupon-det-txt2">Wallet</p>
                            </div>
                        </div> -->
                    </div>
                    <a href="javascript:void(0)" data-id="<?php echo e($Promocode->id); ?>" data-code="<?php echo e($Promocode->promo_code); ?>" data-price="<?php echo e($Promocode->discount); ?>" class="apply-coupon  appcupon">Apply Coupon</a>
                </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <?php endif; ?> 
                <!-- Coupon Box Ends -->
                
            </div>
            <!-- Coupons List Ends -->
        </div>
    </div>
    <!-- Coupon Sidebar Ends -->
    <!-- Add Card Starts -->
    <div class="aside right-aside location" id="addcard-sidebar">
        <div class="aside-header">
            <span class="close" data-dismiss="aside"><i class="ion-close-round"></i></span>
            <h5 class="aside-tit">Enter your card details</h5>
        </div>
        <div class="login-content">
                <?php if(Setting::get('payment_mode')=='braintree'): ?>
                    <?php echo $__env->make('user.payment.partial.braintree', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif(Setting::get('payment_mode')=='stripe'): ?>
                    <?php echo $__env->make('user.payment.partial.stripe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php else: ?>
                    <?php echo $__env->make('user.payment.partial.bambora', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            </div>
            <!-- Login Content Ends -->
        </div>
    </div>
    <!-- Add Card Ends -->
    <!-- Custom Modal Starts-->
    <div class="modal fade" id="cart-custom-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(Auth::guest()?url('mycart'):url('addcart')); ?>" method="POST">           
                    <?php echo e(csrf_field()); ?>

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="ion-close-round"></span>
                        </button>
                        <div>
                            <div class="row m-0">
                                <img src="<?php echo e(asset('assets/user/img/veg.jpg')); ?>" class="veg-icon">
                                <div class="food-menu-details custom-head-details">
                                    <h5 class="p_name"></h5>
                                    <p class="p_price"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <!-- Custom Head Starts -->
                       
                        <!-- Custom Head Ends -->
                        <!-- Cusom Content Starts -->
                        <div class="custom-content">
                            <!-- Custom Section Starts -->
                            
                            <!-- Custom Section Ends -->
                            <!-- Custom Section Starts -->
                            <div class="custom-section" id="custom-add-ons">
                                <h5 class="custom-block-tit">Addons <span class="optional">(Optional)</span></h5>
                                <div id="addon_list">
                                        
                                </div>
                                <!-- Custom Block Starts -->
                                
                            </div>
                            <!-- Custom Section Ends -->
                        
                        <!-- Custom Content Ends -->
                        <!-- Custom Section Starts -->
                            <div class="custom-section" id="custom-text-field">
                                <h5 class="custom-block-tit">Note</h5>
                                <textarea class="form-control" name="note" rows="3"></textarea>
                            </div>
                            <!-- Custom Section Ends -->
                            </div>
                    </div>
                    <div class="modal-footer">
                        
                        
                        <div class="">
                            <button class="total-btn row m-0">
                                <span class="pull-left t_price">Total </span>
                                <span class="pull-right">ADD ITEM</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Custom Modal Ends -->
     <!-- Cart Custom Modal Starts-->
    
    <div class="aside-backdrop"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('deliveryscripts'); ?>
<script type="text/javascript">
$('.payment_mode_type').on('click',function(){
    var ctype = $(this).data('id');
    var addrs = $('#user_address_id').val();
    var card_id = $('#card_id').val();
    var p_mode = $('#total_payment_mode').val();
    if(ctype=='card'){
        if(addrs!='' && card_id!=''){
            $('#total_payment_mode').val("<?php echo e(Setting::get('payment_mode')); ?>");
            $('.btn_checkout').prop('disabled',false);
            $('.chkouterrors').hide();
            $('.chkouterrors').html('');
        }else{
            
            $(this).prop('checked',false);
            $('.btn_checkout').prop('disabled',true);
            if(addrs ==''){
                $('.chkouterrors').removeClass('alert-success');
                $('.chkouterrors').addClass('alert-danger');
                $('.chkouterrors').show();
                $('.chkouterrors').html('please select address first');
            }
            if(card_id ==''){
                $('.chkouterrors').removeClass('alert-danger');
                $('.chkouterrors').addClass('alert-success');
                $('.chkouterrors').show();
                $('.chkouterrors').html('please select one card or add new card');
            }
        }
    }
    if(ctype=='cash'){
        if(addrs!=''){
            $('#total_payment_mode').val("");
            $('#card_id').val("");
            $('.cardpay').prop('checked',false); 
            $('.btn_checkout').prop('disabled',false);
            $('.chkouterrors').hide();
            $('.chkouterrors').html('');
        }else{
            $(this).prop('checked',false);
            $('.btn_checkout').prop('disabled',true);
            $('.chkouterrors').removeClass('alert-success');
            $('.chkouterrors').addClass('alert-danger');
            $('.chkouterrors').show();
            $('.chkouterrors').html('please select address first');
        }
    }
})

$('.add_to_basket').click(function(){ 
    var product_id = $(this).data('productid'); 
    var quantity = $('#product_price_'+product_id).val(); 
    var addons = '';
    var cart_id = $(this).data('id'); 
    var qty = 1;
    addons = '';
    if(cart_id){
        qty = $('#add-quantity_'+cart_id).val();
         addons +=' <input type="hidden" value="'+cart_id+'" name="cart_id" >';
    }
    $.ajax({
        url: "<?php echo e(url('/addons/')); ?>/"+product_id,
        type:'GET',
        success: function(data) { 
            
             var p_price = qty*data.prices.price;
            
             addons +=' <input type="hidden" value="'+data.shop_id+'" name="shop_id" >\
                        <input type="hidden" value="'+data.id+'" name="product_id" >\
                        <input type="hidden" value="'+qty+'" name="quantity" class="form-control" placeholder="Enter Quantity" min="1" max="100">\
                        <input type="hidden" value="'+data.name+'" name="name" >\
                        <input type="hidden" value="'+data.prices.price+'" name="price" />';
            $.each( data.addons , function( key, value ) { 
                var chk='';
                if(cart_id){
                    if($('#cart_addon_'+cart_id+'_'+value.id).val()){
                        p_price = p_price+value.price;
                        chk = "checked";
                    }
                }
               addons+='<div class="custom-block">\
                                <div class="row m-0">\
                                    <img src="<?php echo e(asset('assets/user/img/veg.jpg')); ?>" class="veg-icon">\
                                    <div class="food-menu-details custom-details">\
                                        <div class="form-check">\
                                            <input class="form-check-input chkaddon" '+chk+' type="checkbox" name="product_addons['+value.id+']" value="'+value.id+'" id="addons-'+value.id+'"  data-price="'+value.price+'">\
                                            <label class="form-check-label" for="addons-"'+value.id+'">'+value.addon.name+'(<?php echo e(Setting::get('currency')); ?>'+value.price.toFixed(2)+')</label>\
                                             <input type="hidden" value="1" class=" input-number" name="addons_qty['+value.id+']"  />\
                            <input type="hidden" name="addons_price['+value.id+']" value="'+value.price+'" />\
                             <input type="hidden" name="addons_name['+value.id+']" value="'+value.addon.name+'" />\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>';
                
            });
            addons+='<input type="hidden" id="t_price" value="'+p_price+'"  >';
            $('.p_name').html(data.name);
            $('.p_price').html("<?php echo e(Setting::get('currency')); ?>"+p_price.toFixed(2));
            $('.t_price').html("Total <?php echo e(Setting::get('currency')); ?>"+p_price.toFixed(2));
             /*addons+='<div class="row">\
                        <div class="col-md-4">\
                            <label>Note</label>\
                            </div>\
                            <div class="col-md-8">\
                            <textarea id="fullfilled" class="form-control counted" name="note" placeholder="Write Something" rows="5" style="margin-bottom:10px;" >\
                            </textarea>\
                        </div>\
                    </div>';*/
            $('#addon_list').html(addons);
            $.each( data.addons , function( key, value ) {

            });
            $('#cart-custom-modal').modal('show');
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
    
})
$('.cardpay').on('click',function(){
    var id = $(this).val(); 
    $('#card_id').val(id);
    $('#total_payment_mode').val("<?php echo e(Setting::get('payment_mode')); ?>");
    $('.payment_mode_type.card').prop('checked',true);
    $('.btn_checkout').prop('disabled',false);
    $('.chkouterrors').hide();
    $('.chkouterrors').html('');
})
$(document).on('click','.chkaddon',function(){
    var price = $(this).data('price');
    if($(this).is(':checked')){
    var total_price = parseFloat($('#t_price').val()) + parseFloat(price);
    }else{
       var total_price = parseFloat($('#t_price').val()) - parseFloat(price); 
    }
    $('#t_price').val(total_price);
    $('.t_price').html('Total <?php echo e(Setting::get("currency")); ?>'+total_price);
});

  $('.update_addr').on('click',function(){
   $('.addr_map').html($(this).children().find('.addr-map').text());
   $('.addr_type').html($(this).children().find('.addr-type').text());
   $('#user_address_id').val($(this).children().find('.address_id').val());
  })  

$(document).ready(function() {    
$(document).on('click','.inc',function(e){
    e.preventDefault();
    var id = $(this).parent().attr('data-id');  
    var pid = $(this).parent().attr('data-pid');  
    var input = $("input[id='add-quantity_"+id+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        product_price_calculation(id,'plus');
        changeCart(id,pid,currentVal);
    } else {
        input.val(0);
    }
});
$(document).on('click','.dec',function(e){
    e.preventDefault();
    var id = $(this).parent().attr('data-id'); 
    var pid = $(this).parent().attr('data-pid');  
    var input = $("input[id='add-quantity_"+id+"']");
    var currentVal = parseInt(input.val()); 
    if (!isNaN(currentVal)) {
        if(currentVal==0){ 
            changeCart(id,pid,currentVal);
        }else{
        product_price_calculation(id,'minus'); 
        changeCart(id,pid,currentVal);  
        }
    } else { 
        input.val(0);
    }
});

  function product_price_calculation(val,type){

    if(type == 'plus'){
      var qty = $('#add-quantity_'+val).val();

      var price = $('#add-quantity_'+val).data('price');
      var tot_amt = qty*price;
      $('.total_product_'+val).html("<?php echo e(Setting::get('currency')); ?>"+tot_amt.toFixed(2));
      ///
      var total = parseInt(price)+parseInt($('#total_price').val());
      
      var total_product_price = parseInt($('#total_product_price').val())+parseInt(price);
      $('#total_product_price').val(total_product_price);
      var total_addons_price = $('#total_addons_price').val();
      total = parseInt(total_product_price)+qty*parseInt(total_addons_price);
      $('#total_price').val(total); 
      $('.sub-total').html("<?php echo e(Setting::get('currency')); ?>"+total.toFixed(2));
    }else{
      var qty = $('#add-quantity_'+val).val();

      var price = $('#add-quantity_'+val).data('price');
      var tot_amt = qty*price;
      $('.total_product_'+val).html("<?php echo e(Setting::get('currency')); ?>"+tot_amt.toFixed(2));
      ///
      var total = parseInt(price)+parseInt($('#total_price').val());
      
      var total_product_price = parseInt($('#total_product_price').val())-parseInt(price);
      $('#total_product_price').val(total_product_price);
      var total_addons_price = $('#total_addons_price').val();
      total = parseInt(total_product_price)+qty*parseInt(total_addons_price);
      $('#total_price').val(total); 
      $('.sub-total').html("<?php echo e(Setting::get('currency')); ?>"+total.toFixed(2));
    }
}
});
function changeCart(id,pid,qty){
    $.ajax({
        url: "<?php echo e(url('addcart')); ?>",
        type:'POST',
        data:{'cart_id':id,'quantity':qty,'_token':"<?php echo e(csrf_token()); ?>",'product_id':pid},
        success: function(res) { 
            if(qty==0){
            location.href = "<?php echo e(url('restaurant/details?name='.$Shop->name)); ?>";
            }else{
                var net = parseInt($('#total_product_price').val()); 
               var tax = (net*(<?php echo e(Setting::get('tax')); ?>/100)).toFixed(2);
             var net_total = parseInt(net)+parseInt(tax)+parseInt(<?php echo e(Setting::get('delivery_charge')); ?>); 
             $('.to_pay').html("<?php echo e(Setting::get('currency')); ?>"+net_total.toFixed(2));
             $('.to_tax').html("<?php echo e(Setting::get('currency')); ?>"+tax);
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
}
var error = 0;
function checkpayment(type){ 
    if($('#transaction_id+'+type).val() == ''){
        return false;
    }
    var myVar ;
      
        if(type=='eather'){
            var url = "<?php echo e(url('checkEtherPayment')); ?>";
            var amount = (parseFloat($('#total_amount_pay').val())/<?php echo e($ether_response->result->ethusd); ?>).toFixed(6); 
        }
        if(type=='ripple'){
            var url = "<?php echo e(url('checkRipplePayment')); ?>";
            var amount = (parseFloat($('#total_amount_pay').val())/<?php echo e($ripple_response->last); ?>).toFixed(6); 
        }
        if(type=='bitcoin'){
            var url = "<?php echo e(url('checkBitcoinPayment')); ?>";
        }
    $.ajax({
      url: url,
      type: "GET",
      data:{'payment_id':$('#transaction_id_'+type).val(),'amount':amount}
        })
      .done(function(response){ 
            console.log(response);

            if(response.success == 'Ok'){
                $("#"+type+"_form_error").html('Sucesss please proceed to Order');
                $('#loader').hide();
                $('#ripple_ord_btn').prop('disabled',false);
                $('#total_transaction_id').val($('#transaction_id_'+type).val());
                $('#total_payment_mode').val(type);
                $('.default').prop('checked',false);
            }else if(response.error == 'id_not_valid'){
                error =1;
                $('#ord_btn').prop('disabled',true);
                $('#msg').html('');
                $("#"+type+"_form_error").html('Invalid Transaction Id');
            }else if(response.error == 'price_not_match'){
                error =1;
                $('#ord_btn').prop('disabled',true);
                $('#msg').html('');
                $("#"+type+"_form_error").html('Price doesn\'t match');
            }
            else{
                $('#loader').show();
                $('#ord_btn').prop('disabled',true);
                $('#msg').html('Please wait until your Transaction is Processing...');
                myVar = setTimeout(checkpayment, 5000);
            }
            
        })
    .error(function(jqXhr,status){
        if(jqXhr.status === 422) {
            error =1;
            $("#ripple_form_error").html('');
            $("#ripple_form_error ").show();
            var errors = jqXhr.responseJSON;
            console.log(errors);
            $.each( errors , function( key, value ) { 
                $("#ripple_form_error").html(value);
            }); 
        } 
    
        $('#ord_btn').prop('disabled',true);
    })

    
}


$('.appcupon').click(function(){
    var code = $(this).data('code');
    var id = $(this).data('id');
    var price = $(this).data('price');
    $('#couponcode_apply').val(code);
    //$('#promocode_id').val(id);
    $('#couponcode_apply').data('price',price);
    $('#couponcode_apply').data('id',id);
})

$('.appcupon_apply').click(function(){
    if($('#couponcode_apply').val()!=''){
        var promocode_id = $('#couponcode_apply').data('id');
        $.ajax({
            url: "<?php echo e(url('wallet/promocode')); ?>",
            type: "POST",
            data:{'promocode_id':promocode_id,'_token':"<?php echo e(csrf_token()); ?>"}
                })
            .done(function(response){ 
                $('#promocode_id').val(promocode_id);
                 var price = $('#couponcode_apply').data('price');
                 
                 var tot_blnce = (parseFloat($('#total_amount_pay').val())-price);
                 
                $('#total_amount_pay').val(tot_blnce);
                $('.to_pay').html(tot_blnce.toFixed(2))
                $('.message').html('Couponcode Added Successfully');
            })
            .error(function(jqXhr,status){
                if(jqXhr.status === 422) {
                    error =1;
                   /* $("#ripple_form_error").html('');
                    $("#ripple_form_error ").show();*/
                    var errors = jqXhr.responseJSON;
                    console.log(errors);
                    $.each( errors , function( key, value ) { 
                         $('.message').html(value);
                    }); 
                } 
            
                $('#ord_btn').prop('disabled',true);
            });
    }else{
        $('.message').html('Please Select Any Coupon Code');
    }
    
})

/*setTimeout(function(){ 
        if(error ==0){
            checkpayment('');
        }
    }, 5000);*/
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>