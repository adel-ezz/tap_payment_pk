<?php

//use Adelezz\TapPaymentPk\http\Controllers\TestController;


Route::get('/testBackage', [\Adelezz\TapPaymentPk\http\Controllers\TestController::class, 'testele']);


Route::get('/pay/call_back', [\Adelezz\TapPaymentPk\http\Controllers\TestController::class, 'payCallBack']);
