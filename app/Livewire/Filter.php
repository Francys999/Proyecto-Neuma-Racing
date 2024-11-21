<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Filter extends Component
{

    use WithPagination;
    public $category_id;
    public $options;

    public function mount()
    {
        $this->options = Option::whereHas('products.category', function ($query) {
            $query->where('category_id', $this->category_id);
        })->with([
                    'features' => function ($query)  {
                        $query->whereHas('variants.product.category', function ($query)  {
                            $query->where('category_id', $this->category_id);
                        });
                    }
                ])
            ->get();
    }
    public function render()
    {

        $products= Product::whereHas('category', function($query) {
            $query->where('category_id',$this->category_id);
        })
        ->paginate(12);
        
        return view('livewire.filter',compact('products'));
    }
}
