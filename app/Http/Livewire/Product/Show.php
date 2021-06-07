<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class Show extends Component
{
    public $product;

    public function mount(Product $productSlug){
        $this->product = $productSlug;
        // return redirect('/show');
    }
    
    public function render()
    {
        return view('home');
    }
}
