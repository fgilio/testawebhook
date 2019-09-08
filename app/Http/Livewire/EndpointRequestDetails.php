<?php

namespace App\Http\Livewire;

use App\Endpoint;
use App\Request;
use Livewire\Component;

class EndpointRequestDetails extends Component
{
    public $endpointId;
    public $requestId;

    protected $listeners = ['showRequestDetails' => 'showRequestDetails'];

    public function mount(Endpoint $endpoint)
    {
        $this->endpointId = $endpoint->id;
        $this->requestId = optional(Request::where(['endpoint_id' => $endpoint->id, 'selected' => true])->first())->id;
    }

    public function showRequestDetails()
    {
        $this->requestId = optional(Request::where([
            'endpoint_id' => $this->endpointId,
            'selected' => true,
        ])->first())->id;
    }

    public function render()
    {
        return view('livewire.endpoint-request-details', [
            'request' => $this->requestId ? Request::findOrFail($this->requestId) : Request::make(),
        ]);
    }
}
