<?php

namespace App\Livewire\Admin\Options;

use Livewire\Component;
use App\Models\Option;

class ManageOptions extends Component
{

    public $options;

    public $newOption = [
        "name" => "",
        "type" => 1,
        "features" => [
            [
                "value" => "",
                "description" => "",
            ]
        ]
    ];

    public $openModal = true;

    public function mount()
    {
        $this->options = Option::with("features")->get();
    }

    public function addFeature()
    {
        $this->newOption["features"][] = [
            "value" => "",
            "description" => "",
        ];
    }
    
    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
