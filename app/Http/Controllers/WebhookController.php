<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class WebhookController extends Controller
{
    public function index($uuid = null)
    {
        if ($uuid && cache()->tags(['uuids'])->has("uuid:$uuid")) {
            return view('index')->with([
                'uuid' => $uuid,
            ]);
        }

        $uuid = Str::uuid();
        cache()->tags(['uuids'])->put("uuid:$uuid", true, now()->addDay());


        return redirect()->to($uuid);
    }

    public function store(Request $request, $uuid)
    {
        cache()->tags([$uuid])->put("uuid:$uuid", true, now()->addDay());
        Redis::hSet("uuid:$uuid:requests", Str::uuid(), json_encode($request->toArray()));
//        $value = Redis::hGet('h', 'key1');
//        $value = Redis::hGetAll("uuid:$uuid:requests");
//        dump(Redis::hGetAll("uuid:$uuid:requests"));
    }
}
