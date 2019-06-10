<?php

namespace App\Http\Controllers;

use App\Endpoint;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function index($uuid = null)
    {
        if ($uuid && Endpoint::find($uuid)) {
            return view('index')->with([
                'uuid' => $uuid,
            ]);
        }

        return redirect()->to(Endpoint::create()->url);
    }

    public function store(Request $request, $uuid)
    {
        dump("store:$uuid");
        $endpoint = Endpoint::find($uuid);
        $endpoint->storeRequest($request);

        return response([], 201);
    }
}
