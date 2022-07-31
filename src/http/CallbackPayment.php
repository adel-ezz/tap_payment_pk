<?php

namespace Adelezz\TapPaymentPk\http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CallbackPayment
{

    /*
     |--------------------------------------------------------------------------
     | Call Back For Tap payment
     |--------------------------------------------------------------------------
     | Send second charging  Guzzle Request For Tab to check status of payment
     */
    public function payCallBack()
    {

        $tapID = \request()->tap_id;
        $chargeInfo = $this->getCharges($tapID);
        $charge = json_decode($chargeInfo);
        $response = $charge->response;
        if ($charge->status == 'CAPTURED' && $response->code == '000') {
            echo "Done";
        } else {
            echo "Error";
        }
        return 'Done';
    }
    /*
        |--------------------------------------------------------------------------
        | Call Back For Tap payment
        |--------------------------------------------------------------------------
        | Helper to Send second charging  Guzzle Request For Tab to check status of payment
        */
    public function getCharges($tapID)
    {


        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'authorization' => 'Bearer ' . config('tap.TAP_SECRET')
            ]
        ]);
        $response = $client->request('get', "https://api.tap.company/v2/charges/" . $tapID);
        $response->getStatusCode();
        return $response->getBody();
    }

    /*
       |--------------------------------------------------------------------------
       | Post Function for Tap notification default
       |--------------------------------------------------------------------------
       | Helper to Send second charging  Guzzle Request For Tab to check status of payment
       */
    function post()
    {
        Log::notice('Payment TAp ::-->', \request()->all());

        $result = json_decode(\request()->getContent());
        $charge = $result->response;
        $payment_id=$result->id;
            ////================ This for checking if transaction Done Successfully ===============///
            if ($charge->message == 'Captured' && $charge->code == '000') {
                    echo 'Success';
            }

        return;
    }

}
