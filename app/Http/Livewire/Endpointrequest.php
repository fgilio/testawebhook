<?php

namespace App\Http\Livewire;

use App\EndpointOLD;
use Livewire\Component;

class Endpointrequest extends Component
{
    public $request;

    public function mount($request)
    {
        $this->request = $request;
    }

    public function render()
    {
        return view('livewire.EndpointRequest');
    }
}
