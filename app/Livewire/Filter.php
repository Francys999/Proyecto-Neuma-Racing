<?php

namespace App\Livewire;

use App\Models\Option;
use Livewire\Component;

class Filter extends Component
{
    
    public $category_id;
    public function show()
    {
        return view('livewire.filter');
    }
}
