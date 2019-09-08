<?php

namespace App\Http\Livewire;

use App\Request;
use Livewire\Component;

class EndpointRequest extends Component
{
    public $requestId;

    public function mount($request)
    {
        $this->requestId = $request->id;
    }

    public function selectRequest()
    {
        $request = Request::findOrFail($this->requestId);
        Request::where(['endpoint_id' => $request->endpoint_id])->update(['selected' => false]);
        Request::findOrFail($this->requestId)->update(['selected' => true]);
        $this->emit('showRequestDetails');
    }

    public function render()
    {
        $request = Request::findOrFail($this->requestId);

        return view('livewire.endpoint-request', [
            'request' => $request,
        ]);
    }
}
