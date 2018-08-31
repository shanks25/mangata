<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests\MakePaymentRequest;
use App\Http\Requests\StoreCardRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BamboraController extends Controller
{
    //
    private $merchant_id = '';
    private $api_key = '';
    private $api_version = 'v1';
    private $platform = 'api';

    private $beanstream;
    private $payment_data;

    public $complete = TRUE; //set to FALSE for PA


    public function __construct()
    {
        $this->beanstream = new \Beanstream\Gateway($this->merchant_id, $this->api_key, $this->platform, $this->api_version);
    }


    public function makePayment(MakePaymentRequest $request)
    {

        $user = Auth::user();

        if ($request->card_id) {
            $card = Card::where('user_id', $user->id)->where('id', $request->card_id)->first();
        } else {
            $card = Card::where('user_id', $user->id)->where('is_default', 1)->first();
        }

        if ($card) {

            $this->payment_data = array(
                'order_number' => 'ORD' . rand(),
                'amount' => $request->payable,
                'payment_method' => 'card',
                'card' => array(
                    'name' => $card->name,
                    'number' => $card->number,
                    'expiry_month' => $card->exp_month,
                    'expiry_year' => $card->exp_year,
                    'cvd' => $card->cvc
                )
            );

            //Try to submit a Card Payment
            $result = $this->beanstream->payments()->makeCardPayment($this->payment_data, $this->complete);


        }

    }


}
