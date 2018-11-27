
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">

            <form role="form" method="POST" action="<?php echo e(route('shop.profile.update', $Shop->id)); ?>" enctype="multipart/form-data" onkeypress="return disableEnterKey(event);">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PATCH')); ?>


                <input type="hidden" id="latitude" name="latitude" value="<?php echo e(old('latitude', $Shop->latitude)); ?>" readonly required>
                <input type="hidden" id="longitude" name="longitude" value="<?php echo e(old('longitude', $Shop->longitude)); ?>" readonly required>

                <h4 class="m-t-0 header-title">
                    <b><?php echo app('translator')->getFromJson('shop.edit.title'); ?></b>
                </h4>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name"><?php echo app('translator')->getFromJson('form.name'); ?></label>

                            <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name', $Shop->name)); ?>" required autofocus>

                            <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('name')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email"><?php echo app('translator')->getFromJson('form.email'); ?></label>

                            <input id="email" type="text" class="form-control" name="email" value="<?php echo e(old('email', $Shop->email)); ?>" required autofocus>

                            <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('cuisine_id') ? ' has-error' : ''); ?>">
                            <label for="parent_id"><?php echo app('translator')->getFromJson('form.cuisine'); ?></label>
                            <?php $shop_cusines = $Shop->cuisines->pluck('id','id')->all();  ?>
                            <select class="form-control" multiple id="cuisine_id" name="cuisine_id[]">
                                <?php $__currentLoopData = \App\Cuisine::list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Index=>$Cuisine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($Cuisine->id); ?>" <?php if(in_array($Cuisine->id,$shop_cusines)): ?> selected <?php endif; ?> ><?php echo e($Cuisine->name); ?></option>   
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <?php if($errors->has('cuisine_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('cuisine_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                            <label for="phone"><?php echo app('translator')->getFromJson('form.phone'); ?></label>

                            <input id="phone" type="text" class="form-control" name="phone" value="<?php echo e(old('phone', $Shop->phone)); ?>" required autofocus>

                            <?php if($errors->has('phone')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('phone')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password"><?php echo app('translator')->getFromJson('form.password'); ?></label>

                            <input id="password" type="password" class="form-control" name="password">

                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm"><?php echo app('translator')->getFromJson('form.confirm_password'); ?></label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>

                        <div class="form-group <?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <label for="parent_id"><?php echo app('translator')->getFromJson('form.status'); ?></label>
                            <select class="form-control"  id="status" name="status">
                                <option value="onboarding" <?php if(@$Shop->status=='onboarding'): ?> selected="selected" <?php endif; ?> >Onboarding</option>   
                                <option value="active" <?php if(@$Shop->status=='active'): ?> selected="selected" <?php endif; ?> >Active</option> 
                            </select>

                            <?php if($errors->has('status')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('status')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <?php $array = $Shop->timings->toArray(); ?>

                         <div class="form-group">
                            <label for="password-confirm"><?php echo app('translator')->getFromJson('form.everyday'); ?></label>

                            <input id="everyday" type="checkbox"  class="form-control" name="everyday" value="1"  <?php if($Shop->timings[0]->day == 'ALL'): ?> checked  <?php endif; ?> >
                        </div>

                       

                         <?php $__currentLoopData = $Days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dky => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php  $key='';
                         $keys = array_search($dky,array_column($array, 'day'));  ?>
                        <div    <?php if($dky == 'ALL'): ?> 
                                    class = "row everyday" 
                                        <?php if($Shop->timings[$keys]->day != 'ALL'): ?>
                                            style="display:none";
                                        <?php endif; ?>
                                <?php else: ?> 
                                    class = "row singleday"  
                                        <?php if($Shop->timings[$keys]->day == 'ALL'): ?>
                                            style="display:none";
                                        <?php endif; ?>
                                <?php endif; ?>  >
                            <div class="col-xs-4">
                                <div class="form-group<?php echo e($errors->has('hours_opening') ? ' has-error' : ''); ?>">
                                    <label for="hours_opening"><?php echo e($day); ?></label>

                                    
                                        <input type="checkbox" class="chk form-control" name="day[<?php echo e($dky); ?>]" value="<?php echo e($dky); ?>" <?php if(@$Shop->timings[$keys]->day == $dky): ?> checked <?php endif; ?> >
                                    
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group<?php echo e($errors->has('hours_opening') ? ' has-error' : ''); ?>">
                                    <label for="hours_opening"><?php echo app('translator')->getFromJson('form.hours_opening'); ?></label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_opening[<?php echo e($dky); ?>]" <?php if(@$Shop->timings[$keys]->day==$dky): ?>
                                        value="<?php echo e(@$Shop->timings[$keys]->start_time); ?>" 
                                        <?php else: ?> 
                                        value="00:00" 
                                        <?php endif; ?> required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group <?php echo e($errors->has('hours_closing') ? ' has-error' : ''); ?>">
                                    <label for="hours_closing"><?php echo app('translator')->getFromJson('form.hours_closing'); ?></label>

                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="hours_closing[<?php echo e($dky); ?>]" <?php if(@$Shop->timings[$keys]->day==$dky): ?>
                                        value="<?php echo e(@$Shop->timings[$keys]->end_time); ?>"timings                                        <?php else: ?> 
                                        value="00:00" 
                                        <?php endif; ?> required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="form-group<?php echo e($errors->has('avatar') ? ' has-error' : ''); ?>">
                            <label for="avatar"><?php echo app('translator')->getFromJson('admin.shops.create.image'); ?></label>

                            <input type="file" accept="image/*" name="avatar" class="dropify" id="avatar" aria-describedby="fileHelp" <?php if($Shop->avatar): ?> data-default-file="<?php echo e(asset($Shop->avatar)); ?>" <?php endif; ?>>

                            <?php if($errors->has('avatar')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('avatar')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('default_banner') ? ' has-error' : ''); ?>">
                            <label for="avatar"><?php echo app('translator')->getFromJson('shop.create.banner'); ?></label>

                            <input type="file" accept="image/*" name="default_banner" class="dropify" id="default_banner" aria-describedby="fileHelp" <?php if($Shop->default_banner): ?> data-default-file="<?php echo e(asset($Shop->default_banner)); ?>" <?php endif; ?>>

                            <?php if($errors->has('default_banner')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('default_banner')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group<?php echo e($errors->has('pure_veg') ? ' has-error' : ''); ?>">
                                    <label for="parent_id"><?php echo app('translator')->getFromJson('form.pure_veg'); ?></label>
                                    <label class="radio-inline">
                                        <input type="radio" value="no" <?php if($Shop->pure_veg==0): ?>  checked <?php endif; ?> name="pure_veg">No
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="yes" name="pure_veg" <?php if($Shop->pure_veg==1): ?>  checked <?php endif; ?> >Yes
                                    </label>

                                    <?php if($errors->has('pure_veg')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('pure_veg')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group<?php echo e($errors->has('offer_min_amount') ? ' has-error' : ''); ?>">
                                    <label for="offer_min_amount"><?php echo app('translator')->getFromJson('form.Min_Amount'); ?></label>
                                    <input tabindex="2" id="offer_min_amount" class="form-control controls" type="number" placeholder="Enter Min Amount For Offer" name="offer_min_amount" value="<?php echo e(old('offer_min_amount', $Shop->offer_min_amount)); ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group<?php echo e($errors->has('offer_percent') ? ' has-error' : ''); ?>">
                                    <label for="offer_percent"><?php echo app('translator')->getFromJson('form.offer_percent'); ?></label>
                                    <input tabindex="2" id="offer_percent" class="form-control controls" type="number" placeholder="Enter amount in Percent" name="offer_percent" value="<?php echo e(old('offer_percent', $Shop->offer_percent)); ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group<?php echo e($errors->has('estimated_delivery_time') ? ' has-error' : ''); ?>">
                                    <label for="estimated_delivery_time"><?php echo app('translator')->getFromJson('form.estimated_delivery_time'); ?></label>
                                    <input tabindex="2" id="estimated_delivery_time" class="form-control controls" type="number" placeholder="Enter Max Delivery Time" name="estimated_delivery_time" value="<?php echo e(old('estimated_delivery_time', $Shop->estimated_delivery_time)); ?>">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                    <label for="description"><?php echo app('translator')->getFromJson('form.description'); ?></label>
                                    <textarea class="form-control"  placeholder="Enter Description" id="description" name="description" required><?php echo e(old('description',$Shop->description)); ?></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group<?php echo e($errors->has('maps_address') ? ' has-error' : ''); ?>">
                                    <label for="maps_address"><?php echo app('translator')->getFromJson('form.location'); ?></label>
                                    <input tabindex="2" id="pac-input" class="form-control controls" type="text" placeholder="Enter Shop Location" name="maps_address" value="<?php echo e(old('maps_address', $Shop->maps_address)); ?>">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group form-group-default required m-t-5">
                                    <label><?php echo app('translator')->getFromJson('form.address'); ?></label>
                                    <textarea class="form-control" placeholder="Enter Address" id="address" name="address" required><?php echo e(old('address', $Shop->address)); ?></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div id="map" style="height:400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 mb-2">
                    <a href="<?php echo e(route('shop.profile.index')); ?>" class="btn btn-warning mr-1">
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
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/clockpicker/dist/bootstrap-clockpicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/dropify/dist/css/dropify.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/admin/plugins/clockpicker/dist/bootstrap-clockpicker.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/admin/plugins/dropify/dist/js/dropify.min.js')); ?>"></script>
<script type="text/javascript">
    function disableEnterKey(e)
    {
        var key;
        if(window.e)
            key = window.e.keyCode; // IE
        else
            key = e.which; // Firefox

        if(key == 13)
            return e.preventDefault();
    }
    $('.clockpicker').clockpicker({
        donetext: "Done"
    });
    $('.dropify').dropify();
    $('#everyday').change(function() {
        if($(this).is(":checked")) {
            $('.everyday').show();
            $('.singleday').hide();
            $('.singleday .chk').prop('checked',false);
            $('.everyday .chk').prop('checked',true);
        }else{
            $('.everyday').hide();
            $('.singleday').show();
            $('.everyday .chk').prop('checked',false);
            $('.singleday .chk').prop('checked',true);
        }
    });

   /**/
</script>
<script>
    var map;
    var input = document.getElementById('pac-input');
    var latitude = document.getElementById('latitude');
    var longitude = document.getElementById('longitude');
    var address = document.getElementById('address');

    function initMap() {

        var userLocation = new google.maps.LatLng(
                <?php echo e($Shop->latitude); ?>,
                <?php echo e($Shop->longitude); ?>

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
<?php echo $__env->make('shop.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>