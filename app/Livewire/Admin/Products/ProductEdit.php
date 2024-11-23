<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
class ProductEdit extends Component
{
    use WithFileUploads;
    public $product;
    public $productEdit;

    public $categories;
    public $category_id = "";

    public $image;

    public function mount($product)
    {

        $this->productEdit =$product->only('sku', 'name','description','image_path','price', 'stock', 'category_id');

        $this->categories =Category::all();
        
        $this->category_id=$product->Category->id;
        
    }
    public function boot()
    {
        $this->withValidator(function ($validator) {
            if ($validator->fails()) {
                
                $this->dispatch("swal", [
                    "icon" => "error",
                    "title" => "¡Error!",
                    "text" => "El formulario contiene errores."
                ]);
            }
        });
    }

    public function updateCategoryId($value)
    {
        $this->productEdit['category_id']='';
    }

    #[On("variant-generate")]
    public function updateProduct() {
        $this->product = $this->product->fresh();
    }

    public function store() 
    {
        $this->validate([
            "image" => "nullable|image|max:10000",
            "productEdit.sku" => "required|unique:products,sku," . $this->product->id,
            "productEdit.name" => "required|max:255",
            "productEdit.description" => "nullable",
            "productEdit.price" => "required|numeric|min:0",
            "productEdit.stock" => "required|numeric|min:0",   
            "productEdit.category_id" => "required|exists:categories,id",
        ]);

        if ($this->image) {
            
            Storage::delete($this->productEdit['image_path']);
            $this ->productEdit['image_path']=$this->image->store('products');
        }

        $this->product->update($this->productEdit);



        session()->flash("swal", [
            'icon' => 'succes',
            'title' => '!Producto actualizado!',
            'text' => 'El producto se actualizó correctamente.',
        ]);

        return redirect()->route("admin.products.edit", $this->product);
    }


    public function render()
    {
        return view('livewire.admin.products.product-edit');
    }
}
