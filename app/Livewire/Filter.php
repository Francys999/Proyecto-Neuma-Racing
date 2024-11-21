<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Filter extends Component
{

    use WithPagination;
    public $category_id;
    public $options;
    public $selected_features = [];
    public $orderBy = 1;
    public $search;

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
            ->get()->toArray();
    }

    #[On('search')]
    public function search($search)
    {
        $this->search = $search;
    }

    public function render()
    {

        $products= Product::whereHas('category', function($query) {
            $query->where('category_id',$this->category_id);
        })
        ->when($this->orderBy == 1, function($query){
            $query->orderBy('created_at', 'desc');
        })
        ->when($this->orderBy == 2, function($query){
            $query->orderBy('price', 'desc');
        })
        ->when($this->orderBy == 3, function($query){
            $query->orderBy('price', 'asc');
        })
        
        ->when($this->selected_features, function($query){
            $query->whereHas('variants.features', function($query){
                $query->whereIn('features.id', $this->selected_features);
            });
        })
        ->when($this->search, function($query){
            $query->where('name', 'like', '%'.$this->search.'%');
        })
        ->paginate(12);
        
        return view('livewire.filter',compact('products'));
    }
}
