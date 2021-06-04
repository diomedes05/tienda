<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class Show extends Component
{
    public $product;

    public function mount(Product $productSlug){
        $this->product = $productSlug;
    }
    
    public function render()
    {
        return view('livewire.product.show');
    }
}
