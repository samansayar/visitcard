<?php

namespace App\Http\Livewire;

use App\Models\city;
use App\Models\State;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ManageCityState extends Component
{
    public $Cityies = [];
    public $prephone1;
    public $typestate;
    public $typecity = '';

    public function render()
    {
        $state = State::select('city', 'prenumber')->distinct()->get();
        return view('livewire.manage-city-state', compact('state'));
    }

    public function HandlerState()
    {
        $state_sperade = explode('-',$this->typestate);
        $this->Cityies = city::where('state', $state_sperade[0])->get();
        $this->prephone1 = $state_sperade[1];
    }
}
