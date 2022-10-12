<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsIndex extends Component
{
    public $sortBy = '';
    public $descending = false;
    public function render()
    {
        $products = Product::get();
        if($this->descending)
        {

            $products = Product::get()->sortByDesc($this->sortBy);
        }
        else
        {
            $products = Product::get()->sortBy($this->sortBy);

        }

        return view('livewire.products-index',[
            'products'=>$products
        ]); 
        
    }
 
}
