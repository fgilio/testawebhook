<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Livewire\Component;

class Webhook extends Component
{
    public $uuid;

    public $requests;

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $this->requests = collect(Redis::hGetAll("uuid:{$this->uuid}:requests"))->map(function ($request) {
            return json_decode($request, true);
        })->toArray();
    }

    public function randomize()
    {
        $this->uuid = Str::uuid();
    }


    public function forceRefresh()
    {
//        dump('forceRefresh');
        $this->requests = collect(Redis::hGetAll("uuid:{$this->uuid}:requests"))->map(function ($request) {
            return json_decode($request, true);
        })->toArray();
    }

    public function render()
    {
//        dump($this->requests);

        return view('livewire.webhook')->with([
            'uuid' => $this->uuid,
            'requests' => $this->requests,
        ]);
    }
}
