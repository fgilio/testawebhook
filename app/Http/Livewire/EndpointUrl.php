<?php

namespace App\Http\Livewire;

use App\Endpoint;
use Livewire\Component;

class EndpointUrl extends Component
{
    public $uuid;

    public $endpoint;

    public $url;

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $this->endpoint = Endpoint::find($uuid);
        $this->url = $this->endpoint->url;
    }

    public function render()
    {
        return view('livewire.EndpointUrl');
    }
}
