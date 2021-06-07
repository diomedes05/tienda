<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Paypal;
use App\Models\CartManager;
use App\Models\Order;

use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function paypalPaymenteRequest(CartManager $cart, Paypal $paypal){
        return redirect()->away($paypal->paymentRequest($cart->getAmount()));
    }

    public function paypalCheckout(Request $request, CartManager $cart, Paypal $paypal,$status){
        if ($status === "success"){
            $response = $paypal->checkout($request);
            Order::createFromResponse($response);
            if (!is_null($response)){
                $response->shopping_cart_id = $cart->getCart()->id;
                session()->flash('message', 'Compra exitosa, hemos enviado un correo con un resumen de tu compra.');
                return redirect()->route('welcome');
            }
        }
    }

    public function stripeCheckout(Request $request,CartManager $cart){
        Stripe::setApiKey(config('services.stripe.secret'));
        Charge::create([
            'amount' => ($cart->getAmount()) *100,
            'currency' => 'usd',
            'source' => $request->stripeToken
        ]);
        Order::create(['shopping_cart_id' => $cart->getCart()->id]);
        session()->flash('message', 'Compra exitosa, hemos enviado un correo con un resumen de tu compra.');
        return redirect()->route('welcome');
    }
}
