<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Requestlists extends Component
{
    public $data = [];

    public function render()
    {
        return view('livewire.requestlists');
    }
}
