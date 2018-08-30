<form id="payment-form" action="{{ route('card.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-body">
        <div class="row no-margin" id="card-payment">
            <div class="form-group col-md-12 col-sm-12">
                <label>@lang('user.card.fullname')</label>
                <input data-stripe="name" autocomplete="off" required type="text" class="form-control"
                       placeholder="@lang('user.card.fullname')">
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label>@lang('user.card.card_no')</label>
                <input data-stripe="number" type="text" onkeypress="return isNumberKey(event);" required
                       autocomplete="off" maxlength="16" class="form-control" placeholder="@lang('user.card.card_no')">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label>@lang('user.card.month')</label>
                <input type="text" onkeypress="return isNumberKey(event);" maxlength="2" required autocomplete="off"
                       class="form-control" data-stripe="exp-month" placeholder="MM">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label>@lang('user.card.year')</label>
                <input type="text" onkeypress="return isNumberKey(event);" maxlength="2" required autocomplete="off"
                       data-stripe="exp-year" class="form-control" placeholder="YY">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label>@lang('user.card.cvv')</label>
                <input type="text" data-stripe="cvc" onkeypress="return isNumberKey(event);" required autocomplete="off"
                       maxlength="4" class="form-control" placeholder="@lang('user.card.cvv')">
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="login-btn">@lang('user.card.add_card')</button>
    </div>
</form>