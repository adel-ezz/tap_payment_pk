<?php

namespace Adelezz\TapPaymentPk\http;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Payment
{

    protected
        $total_price_for_pay = 0,
        $meta = [],
        $user_name = '',
        $country_code = "966",
        $user_phone = '',
        $user_email = '';

    public function __construct(
        $total_price_for_pay,
        $meta,
        $user_name,
        $country_code,
        $user_phone,
        $user_email)
    {
        $this->total_price_for_pay = $total_price_for_pay;
        $this->meta = $meta;
        $this->user_name = $user_name;
        $this->country_code = $country_code;
        $this->user_phone = $user_phone;
        $this->user_email = $user_email;


    }

    /*
    |--------------------------------------------------------------------------
    | first step in payment
    |--------------------------------------------------------------------------
    |receive Any value you want to get in call back function like user_id or any more details
     * @param  array|Null $meta
     * @param  mixed  $default
     * @return mixed|json
    */
    public function firstStepTap()
    {

        ///=====for collect All order element in one room=====///
        $order_id = Str::uuid();

        $authRequest = [
            "amount" => $this->total_price_for_pay,
            "currency" => "SAR",
            "threeDSecure" => true,
            "save_card" => false,
            "description" => "",
            "statement_descriptor" => "",
            "metadata" => $this->meta,
            "reference" => [
                "transaction" => "txn_0001",
                "order" => $order_id
            ],

            "receipt" => [
                "email" => true,
                "sms" => true
            ],
            "customer" => [
                "first_name" => $this->user_name,
//                "middle_name" => "test",
//                "last_name" => "test",
                "email" => $this->user_name,
                "phone" => [
                    "country_code" => $this->country_code,
                    "number" => $this->user_phone
                ]
            ],
            "source" => [
                "id" => "src_all"
            ],
            "auto" => [
                "type" => "VOID",
                "time" => 100
            ],
            "post" => [
                "url" => url('') . config('tap.TAP_POST_URL')
            ],
            "redirect" => [
                "url" => url('') . config('tap.TAP_REDIRECT_URL')
            ]
        ];
        ///============Send First Request using guzzle==============///
        return self::sendFirstRequest($authRequest, $order_id);
    }

    /*
      |--------------------------------------------------------------------------
      | Post Guzzle first step in payment
      |--------------------------------------------------------------------------
      | Send First Guzzle Request For Tab to get Url of payment
       * @param  array|Null $authRequest , String $order_id
       * @param $authRequest This containing array of all request details that should send to get form url
       * @param  mixed  $default
       * @return mixed|json
      */
    static function sendFirstRequest($authRequest)
    {
        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'authorization' => 'Bearer ' . config('tap.TAP_SECRET')
            ]
        ]);

        $response = $client->request('post', "https://api.tap.company/v2/charges", ['body' => json_encode($authRequest)]);
        $response->getStatusCode();
        $response = $response->getBody();
        echo $response;

        return json_decode($response);
    }

    /*
      |--------------------------------------------------------------------------
      | Update Order Status
      |--------------------------------------------------------------------------
       * @param  json $response , String $order_id
       * @param $authRequest This containing array of all request details that should send to get form url
       * @return void
      */



}
