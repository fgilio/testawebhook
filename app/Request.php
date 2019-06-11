<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request as IlluminateRequest;
use Symfony\Component\HttpFoundation\HeaderBag;

class Request extends Model
{
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'headers' => 'array',
        'payload' => 'array',
    ];

    public static function createFromRaw(IlluminateRequest $request)
    {
        return parent::create([
            'host_ip' => $request->ip(),
            'method' => $request->method(),
            'headers' => self::formatHeaders($request->headers),
            'payload' => $request->all(),
        ]);
    }

    /*
     * Formats a Symfony HeaderBag into an ordinary associative array
     */
    private static function formatHeaders(HeaderBag $headers)
    {
        return collect(explode("\r\n", (string)$headers))
            ->filter()
            ->map(function ($header) {
                return collect(explode(": ", $header))
                    ->map(function ($keyValue) {
                        return trim($keyValue);
                    });
            })
            ->filter(function ($header) {
                return isset($header[0]) && isset($header[1]);
            })
            ->mapWithKeys(function ($item) {
                return [$item[0] => $item[1]];
            });
    }

    /**
     * Get the Endpoint for the Request.
     */
    public function endpoint()
    {
        return $this->belongsTo('App\Endpoint');
    }
}
