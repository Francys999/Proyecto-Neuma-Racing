<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Variant;

class ProductOberserver
{
    public function created(Product $product)
    {
        Variant::create([
            'product_id' => $product->id
        ]);
    }
}
