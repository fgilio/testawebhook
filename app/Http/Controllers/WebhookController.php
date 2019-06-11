<?php

namespace App\Http\Controllers;

use App\Endpoint;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function index(Endpoint $endpoint = null)
    {
        if ($endpoint) {
            return view('app')->with([
                'endpoint' => $endpoint,
            ]);
        }

        return redirect()->to(Endpoint::createNew()->url);
    }

    public function store(Request $request, Endpoint $endpoint)
    {
        $endpoint->requests()->save(
            \App\Request::createFromRaw($request)
        );

        return response([], 201);
    }
}
