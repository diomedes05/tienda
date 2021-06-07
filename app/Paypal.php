<?php

namespace App;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class Paypal{
    private $client;

    public function __construct(){
        $this->client = new PayPalHttpClient(
            new SandboxEnvironment(config('services.paypal.key'),config('services.paypal.secret'))
        );
    }

    public function paymentRequest($amount){

        $request = new OrdersCreateRequest;
        $request->prefer('return=representation');

        $request->body = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                (Object)[
                    'reference_id' => 'test_ref_id_diomedes',
                    'amount' =>  [
                        'value' => 1,//$amount,
                        'currency_code' => 'USD'
                    ]
                ]
                    
                ],
                'application_context' =>  [
                    'cancel_url' => route('paypal.checkout', ['status' => 'failure']),
                    'return_url' => route('paypal.checkout', ['status' => 'success']),
                ]
        ];
        
        try {
            $response = $this->client->execute($request);
            $approvalUrl = null;
            
            foreach($response->result->links as $item){
                if ($item->rel === "approve")
                    $approvalUrl = $item->href;
            }
            
            return $approvalUrl;
        } catch (\HttpException $ex) {
            dd($ex);
        }

    }

    public function checkout($request){
        $request = new OrdersCaptureRequest($request->token);
        $request->prefer('return=representation');

        try {

            return $this->client->execute($request);

        } catch (\HttpException $ex) {
            dd($ex);
        }
    }


    
}