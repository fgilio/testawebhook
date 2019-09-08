<?php

namespace App\Http\Livewire;

use App\Endpoint;
use Livewire\Component;

class EndpointRequests extends Component
{
    protected $endpointId;

//    protected $requests;

    public function mount(Endpoint $endpoint)
    {
        $this->endpointId = $endpoint->id;
    }

    public function cleanUp()
    {
        Endpoint::findOrFail($this->endpointId)->requests()->delete();
    }

    public function render()
    {
        $endpoint = Endpoint::findOrFail($this->endpointId);

        return view('livewire.endpoint-requests', [
            'endpoint' => $endpoint,
            'requests' => $endpoint->requests,
        ]);
    }
}
