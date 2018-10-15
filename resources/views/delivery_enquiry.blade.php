@extends('user.layouts.app')

@section('content')
    <div class="container margin_60_35">
        <div class="row">
            <div class="profile-left-col col-md-3 ">

            </div>
            <!--End col-md -->
            <div class="profile-right-col col-md-9 white_bg">

                <div class="profile-right white_bg">
                    <h3 class="prof-tit">@lang('home.delivery_boy.title')</h3>
                    <div class="prof-content">
                        <form action="{{url('/enquiry-delivery')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-sm-2">@lang('home.delivery_boy.name')</label>
                                <div class="col-sm-5">
                                    <input type="text" name="name" class="form-control" value="">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">@lang('home.delivery_boy.email')</label>
                                <div class="col-sm-5">
                                    <input type="email" name="email" class="form-control" value="">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2">@lang('home.delivery_boy.phone')</label>
                                <div class="col-sm-5">
                                    <input type="text" name="phone" class="form-control" value="">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2">@lang('home.delivery_boy.address')</label>
                                <div class="col-sm-5">
                                    <textarea name="address" class="form-control"></textarea>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-xs-12 mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input id="pac-input" type="text" class="form-control" name="address" required
                                               placeholder="Address" value="{{old('address')}}"/>
                                        <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}"
                                               readonly required>
                                        <input type="hidden" id="longitude" name="longitude"
                                               value="{{ old('longitude') }}" readonly required>
                                        @if ($errors->has('home_address'))
                                            <span class="help-block">
                                <strong>{{ $errors->first('home_address') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Profile Image:</label>

                                        <input type="file" accept="image/*" name="avatar" class="dropify form-control"
                                               id="avatar" aria-describedby="fileHelp">

                                        @if ($errors->has('document'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('document') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="map" style="height:400px;"></div>
                                </div>
                            </div>


                            <button class="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
@endsection
