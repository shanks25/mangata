

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?php echo app('translator')->getFromJson('transporter.edit.title'); ?></h3>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('admin.transporters.update', $User->id)); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PATCH')); ?>

                <div class="form-group col-xs-12 mb-2">
                    <label><?php echo app('translator')->getFromJson('transporter.index.name'); ?></label>
                     <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name',$User->name)); ?>" required placeholder="<?php echo app('translator')->getFromJson('transporter.create.name'); ?>" autofocus>

                    <?php if($errors->has('name')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-xs-12 mb-2">
                    <label><?php echo app('translator')->getFromJson('transporter.index.email'); ?></label>
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email',$User->email)); ?>" placeholder="<?php echo app('translator')->getFromJson('transporter.create.email'); ?>" required>

                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>  
                </div>
                <div class="form-group col-xs-12 mb-2">
                    <label><?php echo app('translator')->getFromJson('transporter.index.rating'); ?></label>
                    <input id="rating" type="number" class="form-control" name="rating" value="<?php echo e(old('rating',$User->rating)); ?>" placeholder="<?php echo app('translator')->getFromJson('transporter.create.rating'); ?>" required>

                    <?php if($errors->has('rating')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('rating')); ?></strong>
                        </span>
                    <?php endif; ?>  
                </div>
                <div class="form-group col-xs-12 mb-2">
                    <label><?php echo app('translator')->getFromJson('transporter.create.password'); ?></label>
                    <input id="password" type="password" class="form-control" name="password"   placeholder="<?php echo app('translator')->getFromJson('transporter.create.password'); ?>">

                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-xs-12 mb-2">
                    <label><?php echo app('translator')->getFromJson('transporter.create.confirm_password'); ?></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="<?php echo app('translator')->getFromJson('transporter.create.confirm_password'); ?>" >
                </div>
                
                <div class="form-group col-xs-12 mb-2 contact-repeater">
                    <label><?php echo app('translator')->getFromJson('transporter.create.phone'); ?></label>
                    <div data-repeater-list="repeater-group">
                        <div class="input-group mb-1" data-repeater-item>
                            <input id="phone" type="text" class="form-control" name="phone" value="<?php echo e(old('phone',$User->phone)); ?>" placeholder="<?php echo app('translator')->getFromJson('transporter.create.phone'); ?>" required autofocus>

                            <?php if($errors->has('phone')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('phone')); ?></strong>
                                </span>
                            <?php endif; ?>
                            <span class="input-group-btn" id="button-addon2">
                                <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                            </span>
                        </div>
                    </div>
                   <!--  <button type="button" data-repeater-create class="btn btn-primary">
                        <i class="icon-plus4"></i> Add new phone number
                    </button> -->
                </div>
                <div class="form-group col-xs-12 mb-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app('translator')->getFromJson('transporter.create.address'); ?></label>
                            <input id="pac-input" type="text" class="form-control" name="address"  required placeholder="Address" value="<?php echo e(old('address',$User->address)); ?>"  />
                            <input type="hidden" id="latitude" name="latitude" value="<?php echo e(old('latitude')); ?>" readonly required>
                            <input type="hidden" id="longitude" name="longitude" value="<?php echo e(old('longitude')); ?>" readonly required>
                            <?php if($errors->has('home_address')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('home_address')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label><?php echo app('translator')->getFromJson('transporter.create.profile_image'); ?></label>
                    
                           <input type="file" accept="image/*" name="avatar" class="dropify form-control" id="avatar" aria-describedby="fileHelp" >

                            <?php if($errors->has('document')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('document')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="map" style="height:400px;"></div>
                    </div>
                    
                </div>
                <div class="form-group col-xs-12 mb-2 contact-repeater">
                    <label><?php echo app('translator')->getFromJson('transporter.create.status'); ?></label>
                    <div data-repeater-list="repeater-group">
                        <div class="input-group mb-1" data-repeater-item>
                            <select name="status" class="form-control">
                                 <option value=""  >NO CHANGE</option>
                                <option value="unsettled" <?php if($User->status == 'unsettled'): ?> selected <?php endif; ?> > <?php echo app('translator')->getFromJson('transporter.create.unsettle'); ?></option>
                                <option value="offline"  <?php if($User->status == 'offline'): ?> selected <?php endif; ?> > <?php echo app('translator')->getFromJson('transporter.create.settle'); ?></option>
                            </select>

                            <?php if($errors->has('status')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('status')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group col-xs-12 mb-2">
                    <textarea rows="5" class="form-control" name="Address" placeholder="Address"></textarea>
                </div> -->
                <div class="col-xs-12 mb-2">
                    <a href="<?php echo e(route('admin.transporters.index')); ?>" class="btn btn-warning mr-1">
                        <i class="ft-x"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/dropify/dist/css/dropify.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/admin/plugins/dropify/dist/js/dropify.min.js')); ?>"></script>
<script type="text/javascript">
    $('.dropify').dropify();
</script>
<script>
    var map;
    var input = document.getElementById('pac-input');
    var latitude = document.getElementById('latitude');
    var longitude = document.getElementById('longitude');
    var address = document.getElementById('address');

    function initMap() {

        var userLocation = new google.maps.LatLng(
                <?php echo e($User->latitude); ?>,
                <?php echo e($User->longitude); ?>

            );

        map = new google.maps.Map(document.getElementById('map'), {
            center: userLocation,
            zoom: 15
        });

        var service = new google.maps.places.PlacesService(map);
        var autocomplete = new google.maps.places.Autocomplete(input);
        var infowindow = new google.maps.InfoWindow();

        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow({
            content: "Shop Location",
        });

        var marker = new google.maps.Marker({
            map: map,
            draggable: true,
            anchorPoint: new google.maps.Point(0, -29)
        });

        marker.setVisible(true);
        marker.setPosition(userLocation);
        infowindow.open(map, marker);

        google.maps.event.addListener(map, 'click', updateMarker);
        google.maps.event.addListener(marker, 'dragend', updateMarker);

        function updateMarker(event) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'latLng': event.latLng}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        input.value = results[0].formatted_address;
                        updateForm(event.latLng.lat(), event.latLng.lng(), results[0].formatted_address);
                    } else {
                        alert('No Address Found');
                    }
                } else {
                    alert('Geocoder failed due to: ' + status);
                }
            });

            marker.setPosition(event.latLng);
            map.setCenter(event.latLng);
        }

        autocomplete.addListener('place_changed', function(event) {
            marker.setVisible(false);
            var place = autocomplete.getPlace();

            if (place.hasOwnProperty('place_id')) {
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }
                updateLocation(place.geometry.location);
            } else {
                service.textSearch({
                    query: place.name
                }, function(results, status) {
                    if (status == google.maps.places.PlacesServiceStatus.OK) {
                        updateLocation(results[0].geometry.location, results[0].formatted_address);
                        input.value = results[0].formatted_address;
                    }
                });
            }
        });

        function updateLocation(location) {
            map.setCenter(location);
            marker.setPosition(location);
            marker.setVisible(true);
            infowindow.open(map, marker);
            updateForm(location.lat(), location.lng(), input.value);
        }

        function updateForm(lat, lng, addr) {
            console.log(lat,lng, addr);
            latitude.value = lat;
            longitude.value = lng;
            address.value = addr;
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(Setting::get('GOOGLE_MAP_KEY')); ?>&libraries=places&callback=initMap" async defer></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>