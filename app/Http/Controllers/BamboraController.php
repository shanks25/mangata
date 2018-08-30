<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardRequest;
use Illuminate\Http\Request;

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

    public function addCard(StoreCardRequest $request)
    {
        $this->payment_data = array(
            'order_number' => 'a1b2c3',
            'amount' => $request->amount,
            'payment_method' => 'card',
            'card' => array(
                'name' => $request->name,
                'number' => $request->number,
                'expiry_month' => $request->exp_month,
                'expiry_year' => $request->exp_year,
                'cvd' => $request->cvc
            )
        );
    }

    public function makePayment()
    {
        //Try to submit a Card Payment
        try {

            $result = $this->beanstream->payments()->makeCardPayment($this->payment_data, $this->complete);

            /*
             * Handle successful transaction, payment method returns
             * transaction details as result, so $result contains that data
             * in the form of associative array.
             */
        } catch (\Beanstream\Exception $e) {
            /*
             * Handle transaction error, $e->code can be checked for a
             * specific error, e.g. 211 corresponds to transaction being
             * DECLINED, 314 - to missing or invalid payment information
             * etc.
             */
        }
    }


}
