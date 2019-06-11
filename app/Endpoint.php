<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Endpoint extends Model
{
    protected $guarded = [];

    public static function createNew()
    {
        return parent::create([
            'uuid' => Str::uuid()
        ]);
    }

    public function getUrlAttribute()
    {
        return url($this->uuid);
    }

    /**
     * Get the Requests for the Endpoint.
     */
    public function requests()
    {
        return $this->hasMany(\App\Request::class)->orderByDesc('id');
    }
}
