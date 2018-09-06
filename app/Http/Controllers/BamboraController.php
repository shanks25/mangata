<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests\MakePaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BamboraController extends Controller
{
    //
    private $merchant_id = '117686094';
//    private $api_key = 'Passcode MTE3Njg2MDk0OkcpelZhO0M1bUQhfiFie2o=';
    private $api_key = 'ACc498AF0A16448F9958CDFb67889b55';
    private $api_version = 'v1';
    private $platform = 'api';

    public $complete = TRUE; //set to FALSE for PA

    public function makePayment(Request $request)
    {


        //Create Beanstream Gateway
        $beanstream = new \Beanstream\Gateway($this->merchant_id, $this->api_key, $this->platform, $this->api_version);

        try {

            $user = Auth::user();

            if ($request->card_id) {
                $card = Card::where('user_id', $user->id)->where('id', $request->card_id)->first();
            } else {
                $card = Card::where('user_id', $user->id)->where('is_default', 1)->first();
            }

            if ($card) {

                $payment_data = array(
                    'order_number' => 'ORD' . rand(),
//                    'amount' => $request->payable,
                    'amount' => 90,
                    'payment_method' => 'card',
                    'card' => array(
                        'name' => $user->name,
                        'number' => $card->last_four,
                        'expiry_month' => $card->exp_month,
                        'expiry_year' => $card->exp_year,
                        'cvd' => $card->cvc
                    )
                );

//                return $payment_data;

                //Try to submit a Card Payment
                return $beanstream->payments()->makeCardPayment($payment_data, $this->complete);
            }
        } catch (\Exception $e) {
            dd($e);
        }

    }

    public function makePaymentApi(MakePaymentRequest $request)
    {

        //Create Beanstream Gateway
        $beanstream = new \Beanstream\Gateway($this->merchant_id, $this->api_key, $this->platform, $this->api_version);

        try {

            $user = Auth::user();

            if ($request->card_id) {
                $card = Card::where('user_id', $user->id)->where('id', $request->card_id)->first();
            } else {
                $card = Card::where('user_id', $user->id)->where('is_default', 1)->first();
            }

            if ($card) {

                $payment_data = array(
                    'order_number' => 'ORD' . rand(),
                    'amount' => $request->payable,
                    'payment_method' => 'card',
                    'card' => array(
                        'name' => $user->name,
                        'number' => $card->last_four,
                        'expiry_month' => $card->exp_month,
                        'expiry_year' => $card->exp_year,
                        'cvd' => $card->cvc
                    )
                );

                //Try to submit a Card Payment
                return $beanstream->payments()->makeCardPayment($payment_data, $this->complete);
            }
        } catch (\Exception $e) {
            dd($e);
        }

    }


}
