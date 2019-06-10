<?php

namespace App;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Endpoint
{
    public $uuid;
    public $url;

    public function __construct($uuid)
    {
        $this->uuid = $uuid;
        $this->url = url($uuid);
    }

    public static function create()
    {
        $uuid = Str::uuid();
        cache()->tags(['uuids'])->put("uuid:$uuid", true, now()->addDay());

        return new static($uuid);
    }

    public static function find($uuid)
    {
        $exists = cache()->tags(['uuids'])->has("uuid:$uuid");

        return $exists ? new static($uuid) : false;
    }

    public function storeRequest(Request $request)
    {
        cache()->tags([$this->uuid])->put("uuid:{$this->uuid}", true, now()->addDay());
        Redis::hSet("uuid:{$this->uuid}:requests", Str::uuid(), json_encode($request->toArray()));
    }

    public function requests()
    {
        return collect(Redis::hGetAll("uuid:{$this->uuid}:requests"))
            ->map(function ($request) {
                return json_decode($request, true);
            });
    }

    public function cleanUp()
    {
        Redis::hDel("uuid:{$this->uuid}:requests", '*');
    }

    public function __toString()
    {
        return $this->url;
    }
}
