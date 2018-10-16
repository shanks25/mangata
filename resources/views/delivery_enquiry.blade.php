@extends('user.layouts.app')

@section('content')
    <div class="container margin_60_35">

        <br>
        <h5>Become a Courier</h5>
        <h6>Earn extra income in your spare time</h6>
        <p>Get paid weekly. Work peak days to maximize your earnings.</p>
        <br>

        <h6>Flexible schedule</h6>
        <p>Choose hours that work for you. Take time off, or work extra when it suits you.</p>
        <br>

        <h6>Know Where You're Going</h6>
        <p>See earnings, pickup and drop off locations for each order before you accept the assignment.</p>
        <br>
        <h6>Fast Support</h6>
        <p>Work with a dedicated Courier Support team, ready to chat whenever you need them.</p>

        <br>
        <br>

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

                            <div class="form-group row">
                                <label class="col-sm-2">Profile Image:</label>
                                <div class="col-sm-5">
                                    <input type="file" accept="image/*" name="avatar" class="dropify form-control"
                                           id="avatar" aria-describedby="fileHelp">

                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                             </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                @foreach (\App\Document::all() as $document)
                                    <label class="col-sm-2">Upload Documents:</label>
                                    <div class="col-sm-5">
                                        <input type="file" accept="image/*" name="{{ 'doc_' . $document->id }}"
                                               class="dropify form-control"
                                               id="{{ 'doc_' . $document->id }}" aria-describedby="fileHelp">

                                        @if ($errors->has('doc_' . $document->id))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('doc_' . $document->id) }}</strong>
                                             </span>
                                        @endif

                                    </div>
                                @endforeach
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
