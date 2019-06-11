<?php

namespace App\Http\Livewire;

use App\Endpoint;
use Livewire\Component;

class EndpointRequests extends Component
{
    public $endpoint;

    public $requests;

    public function mount(Endpoint $endpoint)
    {
        $this->endpoint = $endpoint;
        $this->requests = $endpoint->requests;
    }

    public function cleanUp()
    {
        $this->endpoint->requests()->delete();
    }

    public function render()
    {
        return view('livewire.EndpointRequests');
    }
}
