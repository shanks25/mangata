@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@lang('transporter.edit.title')</h3>
        </div>
        <div class="card-body collapse in">
            <div class="card-block">
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ route('admin.transporters.document.update', $transporter->id , $transporterDoc->id) }}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group col-xs-12 mb-2 contact-repeater">
                        <label>@lang('transporter.create.status')</label>
                        <div data-repeater-list="repeater-group">
                            <div class="input-group mb-1" data-repeater-item>
                                <img src="{{ public_path('storage' . $transporterDoc->url) }}">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group col-xs-12 mb-2">
                        <textarea rows="5" class="form-control" name="Address" placeholder="Address"></textarea>
                    </div> -->
                    <div class="col-xs-12 mb-2">
                        <a href="{{ route('admin.transporters.docs.index') }}" class="btn btn-warning mr-1">
                            <i class="ft-x"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Approve
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection