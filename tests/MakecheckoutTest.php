<?php

namespace tests;

use Adelezz\TapPaymentPk\http\Payment;
use Tests\TestCase;

class MakecheckoutTest extends TestCase
{
    /**
     *test make checkout in sucess
     * @returns void
     */
    function test_Make_Check_Out()
    {

        $response = $this->get('/testBackage');
        $response->assertSee('https://checkout.payments.tap.company');
    }
}
