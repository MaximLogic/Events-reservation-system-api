<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreRequest;
use App\Http\Resources\Event\Resource;

class StoreController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $event = Event::firstOrCreate($data);
        return new Resource($event);
    }
}
