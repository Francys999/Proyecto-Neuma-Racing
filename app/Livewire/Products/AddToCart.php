<?php

namespace App\Livewire\Products;

use Livewire\Component;
use CodersFree\Shoppingcart\Facades\Cart;

class AddToCart extends Component
{

    public $product;

    public $qty = 1;

    public function add_to_cart()
    {
        Cart::instance('shopping');
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'options' => [
                'image' => $this->product->image,
                'sku' => $this->product->sku,
                'features' => []
            ]
        ]);

        $this->dispatch("swal", [
            "icon" => "success",
            "title" => "¡Bien hecho!",
            "text" => "El producto se ha añadido al carrito de compras."
        ]);
    }

    public function render()
    {
        return view('livewire.products.add-to-cart');
    }
}
