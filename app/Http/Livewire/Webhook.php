<?php

namespace App\Http\Livewire;

use App\Endpoint;
use Livewire\Component;

class Webhook extends Component
{
    public $uuid;

    public $endpoint;

    public $url;

    public $requests;

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $this->endpoint = Endpoint::find($uuid);
        dump($this->endpoint);
        $this->url = $this->endpoint->url;
        $this->requests = $this->endpoint->requests();
    }

    public function updating()
    {
        $this->endpoint = Endpoint::find($this->uuid);
        $this->requests = $this->endpoint->requests();
        dump('updating', $this->endpoint);
    }

    public function cleanUp()
    {
        dump('cleanUp', $this->endpoint);
        $this->endpoint->cleanUp();
    }

    public function forceRefresh()
    {
        $this->requests = $this->endpoint->requests();
    }

    public function render()
    {
        return view('livewire.webhook');
    }
}
