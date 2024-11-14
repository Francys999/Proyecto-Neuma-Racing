<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use Livewire\Component;

class ProductCreate extends Component
{

    public $categories;
    
    public $product = [
        "sku" => "",
        "name" => "",
        "description" => "",
        "image_path" => "",
        "price" => "",
        "category_id" => "",
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.admin.products.product-create');
    }
}
