<?php

namespace App\Models;

class CartManager{
    private $sessionName = "shopping_card_id";


    public function __construct(){
        $this->cart = $this->findOrCreate($this->findSession());
    }

    public function getCart(){
        return $this->cart;
    }

    public function getAmount(){
        return $this->cart->products()->sum('price');
    }

    public function addToCart($productoId){
        $product = $this->getProduct($productoId);
        $this->cart->products()->attach($product->id);
    }

    public function deleteProduct($productoId){
        $this->cart->products()->wherePivot('id',$productId)->detach();
    }

    private function getProduct($productoId){
        return Product::where('slug',$productoId)->first();
    }
    
    private function findOrCreate($cartId = null){
        $cart = null;

        if (is_null($cartId)){
            $cart = ShoppingCart::create();
        } else {
            $cart = ShoppingCart::find($cartId);

            if (is_null($cart)){
                $cart = ShoppingCart::create();
            }

        }

        request()->session()->put($this->sessionName, $cart->id);

        return $cart;
    }

    private function findSession(){
        return request()->session()->get($this->sessionName);
    }
    public function deleteSession(){
        return request()->session()->forget($this->sessionName);
    }

}