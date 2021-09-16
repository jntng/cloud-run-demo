<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('ECPay');
        $this->gateway->initialize([
            'HashKey' => '5294y06JbISpM5x9',
            'HashIv' => 'v77hoKGq4kWxNNIS',
            'MerchantID' => '2000132',
            'EncryptType' => '1',
            'testMode' => true
        ]);
    }

    public function request()
    {
        $response = $this->gateway->purchase([
            'transactionId' => Str::random(),
            'amount' => 1000,
            'description' => Str::random(),
            'notifyUrl' => route('payment.notify'),
            'returnUrl' => route('payment.result')
        ])->send();

        return $response->redirect();
    }

    public function notify(Request $request)
    {
        $notification = $this->gateway->acceptNotification($request->all());
//        Log::info('notify', (array)[1,2,3]);
        Log::info('notify', (array)$notification);
        info($notification->getMessage());
        info($notification->getTransactionReference());
        info($notification->getStatus());
        info($notification->getData());

        return $notification->getMessage();
    }

    public function result(Request $request)
    {
//        Log::info('request', $request->all());

//      Auth::loginUsing(); laravel signed url
        $response = $this->gateway->completePurchase($request->all())->send();

        Log::info('response', (array)$response);

        dump($response->isSuccessful());
        dump($response->getTransactionId());
        dump($response->getTransactionReference());
        dump($response->getData());


    }
}
