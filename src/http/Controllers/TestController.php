<?php

namespace Adelezz\TapPaymentPk\http\Controllers;

use Adelezz\TapPaymentPk\http\CallbackPayment;
use Adelezz\TapPaymentPk\http\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class TestController extends Controller
{
    protected $model;

    public function __construct()
    {

    }

    function testele()
    {
        $payment = new Payment(100,
            [],
            'Adel',
            '966',
            '0543273345',
            'dola.ezz1@gmail.com');
        return redirect($payment->firstStepTap()->transaction->url);
    }

    function payCallBack()
    {
        $callback = new CallbackPayment();
        $callback->payCallBack();
    }

}
