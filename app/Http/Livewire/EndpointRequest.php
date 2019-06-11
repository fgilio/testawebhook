<?php

namespace App\Http\Livewire;

use App\Endpoint;
use Livewire\Component;

class EndpointRequest extends Component
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
