<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use Illuminate\Http\Request;

class Create extends Component
{
    use WithFileUploads;

    public $name,$description, $price, $thumbnail,$diomedes;

    public function render()
    {
        return view('livewire.product.create');
    }

    public function save(Request $request){
        
        $validate = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'thumbnail' => 'image|max:1024',
            ]);
            
        $validate['thumbnail'] = $this->thumbnail->store('public');

        Product::create($validate);

        return redirect('/');

    }
}
