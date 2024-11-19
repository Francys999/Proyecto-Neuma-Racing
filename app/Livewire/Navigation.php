<?php

namespace App\Livewire;

use Livewire\Component;

class Navigation extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = \App\Models\Category::all();
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
