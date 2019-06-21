<?php

namespace App\Http\Livewire;

use App\Endpoint;
use Livewire\Component;

class Endpointurl extends Component
{
    public $url;

    public function mount(Endpoint $endpoint)
    {
        $this->url = $endpoint->url;
    }

    public function render()
    {
        return view('livewire.EndpointUrl');
    }
}
