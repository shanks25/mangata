

<?php $__env->startSection('content'); ?>
<?php $first_transporter=0; ?>
    <div class="card">
        <ul class="nav nav-tabs row m-0 common-tab">
            <div class="col-sm-3 p-0">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.orders.index')); ?>?t=pending" class="nav-link <?php if(Request::get('t')=='pending'): ?> active  <?php endif; ?>">Pending Orders</a>
                </li>
            </div>
            <div class="col-sm-3 p-0">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.orders.index')); ?>?t=accepted" class="nav-link <?php if(Request::get('t')=='accepted'): ?> active  <?php endif; ?>">Accepted Orders</a>
                </li>
            </div>
            <div class="col-sm-3 p-0">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.orders.index')); ?>?t=ongoing" class="nav-link <?php if(Request::get('t')=='ongoing'): ?> active  <?php endif; ?>">Ongoing Orders</a>
                </li>
            </div>
            <div class="col-sm-3 p-0">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.orders.index')); ?>?t=cancelled" class="nav-link <?php if(Request::get('t')=='cancelled'): ?> active  <?php endif; ?>">Cancelled Orders</a>
                </li>
            </div>
        </ul>
        <div class="card-header">
            <h3 class="card-title">Available Delivery Peoples</h3>
        </div>
        <!-- Pending Order List Starts -->
        <div class="dispatcher row m-0">
            <!-- Dispatcher Left Starts -->
            <div class="col-md-7">
                <div class="dis-left">
                    <?php $__empty_1 = true; $__currentLoopData = $Transporters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx=>$Transporter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                     <!-- Pending Order Block Starts -->
                     <?php if($indx==0){ $first_transporter = $Transporter->id; } ?>
                         <div class="card card-inverse pending-block row m-0 bg-primary">
                            <div class="card-block">
                                <div class="col-sm-3 card-top text-xs-center">
                                    <div class="pending-dp-img bg-img" style="background-image: url(<?php echo e(asset( $Transporter->avatar ? : 'avatar.png')); ?>);"></div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="card-btm pending-btm">
                                        <p class="card-txt"><?php echo e($Transporter->name); ?></p>
                                        <p class="card-txt"> --
                                        </p>
                                        <p class="card-txt"><?php echo e($Transporter->phone); ?></p>
                                    </div>
                                    <div class="card-btm row m-0">
                                        <form action="<?php echo e(route('admin.orders.update', $Order->id)); ?>" id="assign-<?php echo e($Transporter->id); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field("PATCH")); ?>

                                            <input type="hidden" name="transporter_id" value="<?php echo e($Transporter->id); ?>">
                                            <input type="hidden" name="status" value="ASSIGNED">
                                            <button class="btn btn-primary btn-darken-3">
                                                Assign
                                            </button>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div>
                            <h4>No providers around!</h4>
                        </div>
                    <?php endif; ?>
                    <!-- Pending Order Block Ends -->
                </div>
            </div>
            <!-- Dispatcher Left Ends -->
            <!-- Dispatcher Right Starts -->
            <div class="col-md-5">
                <div id="basic-map1" class="dis-right"></div>
            </div>
            <!-- Dispatcher Right Ends -->
        </div>
        <!-- Pending Order List Ends -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style type="text/css">
	.media-object.img-circle {
		width: 64px;
		height: 64px;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!--for map -->
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAP_KEY')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/admin/vendors/js/charts/gmaps.min.js')); ?>" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
<script src="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/js/scripts/charts/gmaps/maps.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<script>

    var locations = [
        <?php $__empty_1 = true; $__currentLoopData = @$Transporters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx => $addr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            ["<?php echo e($addr->name); ?>", <?php echo e($addr->latitude); ?>, <?php echo e($addr->longitude); ?>, "<?php echo e($addr->id); ?>"],
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
    ];

    function initialize() {

        var myOptions = {
          center: new google.maps.LatLng(33.890542, 151.274856),
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP

        };
        var map = new google.maps.Map(document.getElementById("basic-map1"),
            myOptions);

        setMarkers(map,locations)

    }



    function setMarkers(map,locations){

        var marker, i

        for (i = 0; i < locations.length; i++)
         {  

         var loan = locations[i][0]
         var lat = locations[i][1]
         var long = locations[i][2]
         var add =  locations[i][3]

         latlngset = new google.maps.LatLng(lat, long);

          var marker = new google.maps.Marker({  
                  map: map, title: loan , position: latlngset  
                });
                map.setCenter(marker.getPosition())


                var content = '<a href="javascript:void(0)" data-id="'+add+'" class="assignorder" > ' + loan +  '</a>';    

          var infowindow = new google.maps.InfoWindow()

        google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
                return function() {
                   infowindow.setContent(content);
                   infowindow.open(map,marker);
                };
            })(marker,content,infowindow)); 

          }
    }
initialize();
$(document).on('click','.assignorder',function(){
    var id= $(this).data('id');
    $('#assign-'+id).submit();
});

<?php if(@Request::get('p')): ?> 
    <?php if($first_transporter!=0): ?>
        $('#assign-'+<?php echo e($first_transporter); ?>).submit();
    <?php endif; ?>
<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>