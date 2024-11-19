<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Navigation extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = \App\Models\Category::all();
        $this->category_id = $this->categories->first()->id;
    }


    public function render()
    {
        return view('livewire.navigation');
    }
}
