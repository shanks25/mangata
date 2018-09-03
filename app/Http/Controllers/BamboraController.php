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
    private $merchant_id = '117686094';
    private $api_key = 'Passcode MTE3Njg2MDk0OkcpelZhO0M1bUQhfiFie2o=';
    private $api_version = 'v1';
    private $platform = 'api';

    public $complete = TRUE; //set to FALSE for PA

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function makePaymentNo(Request $request)
    {

        $user = Auth::user();

        if ($request->card_id) {
            $card = Card::where('user_id', $user->id)->where('id', $request->card_id)->first();
        } else {
            $card = Card::where('user_id', $user->id)->where('is_default', 1)->first();
        }

        // check card
        if ($card) {

            $tokenUrl = "https://api.v1.checkout.bambora.com/sessions";

            $headers = array(
                'Content-Type: application/json',
                'Accept: application/json',
            );

            $request = array();
            $request["number"] = $card->number;
            $request["expiry_month"] = $card->exp_month;
            $request["expiry_year"] = $card->exp_year;
            $request["cvd"] = $card->cvc;

            $requestJson = json_encode($request);

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $requestJson);
            curl_setopt($curl, CURLOPT_URL, $tokenUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_FAILONERROR, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $rawResponse = curl_exec($curl);
            $response = json_decode($rawResponse);

            if ($response[message] = 'approved') {

            }

        }


    }


    public function makePaymentOriginal()
    {

        $accessToken = "<<YOUR-ACCESS-TOKEN>>";
        $merchantNumber = "<<YOUR-MERCHANT-NUMBER>>";
        $secretToken = "<<YOUR-SECRET-TOKEN>>";

        $apiKey = base64_encode(
            $accessToken . "@" . $merchantNumber . ":" . $secretToken
        );

        $checkoutUrl = "https://api.v1.checkout.bambora.com/sessions";

        $request = array();
        $request["order"] = array();
        $request["order"]["id"] = 'ORD' . rand();
        $request["order"]["amount"] = $request->payable;
        $request["order"]["currency"] = "USD";

        $request["url"] = array();
        $request["url"]["accept"] = "https://ditchthekitch.ca/accept";
        $request["url"]["cancel"] = "https://ditchthekitch.ca/accept";
        $request["url"]["callbacks"] = array();
        $request["url"]["callbacks"][] = array("url" => "https://ditchthekitch.ca/callback");

        $requestJson = json_encode($request);

        $contentLength = isset($requestJson) ? strlen($requestJson) : 0;

        $headers = array(
            'Content-Type: application/json',
            'Content-Length: ' . $contentLength,
            'Accept: application/json',
            'Authorization: Basic ' . $apiKey
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $requestJson);
        curl_setopt($curl, CURLOPT_URL, $checkoutUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $rawResponse = curl_exec($curl);


        $response = json_decode($rawResponse);

    }

    function handleCallback()
    {
        $getParameters = $_GET;
        // Check exists txnid!
        if (empty($getParameters["txnid"])) {
            die("No GET(txnid) was supplied to the system!");
        }
        // Check exists orderid!
        if (empty($getParameters["orderid"])) {
            die("No GET(orderid) was supplied to the system!");
        }
        // Check exists hash!
        if (empty($getParameters["hash"])) {
            die("No GET(hash) was supplied to the system!");
        }
        // Validate MD5!
        $merchantMd5Key = "MD5_KEY";
        $concatenatedValues = '';
        foreach ($getParameters as $key => $value) {
            if ('hash' !== $key) {
                $concatenatedValues .= $value;
            }
        }
        $genstamp = md5($concatenatedValues . $merchantMd5Key);
        if (!hash_equals($genstamp, $getParameters["hash"])) {
            die("Hash validation failed - Please check your MD5 key");
        }

        //$getParameters contains all the callback parameteres
    }

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

            $card = Card::find(4);

            if ($card) {

                $payment_data = array(
                    'order_number' => 'ORD' . rand(),
                    'amount' => $request->payable,
                    'payment_method' => 'card',
                    'card' => array(
                        'name' => $card->name,
                        'number' => $card->last_four,
                        'expiry_month' => $card->exp_month,
                        'expiry_year' => $card->exp_year,
                        'cvd' => $card->cvc
                    )
                );

                return $card;

                return $payment_data;

                //Try to submit a Card Payment
                return $beanstream->payments()->makeCardPayment($payment_data, $this->complete);

                dd($result);

            }
        } catch (\Exception $e) {
            dd($e);
        }

    }


}
