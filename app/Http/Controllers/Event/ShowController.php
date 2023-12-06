<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Resources\Event\Resource;

class ShowController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function __invoke(Event $event)
    {
        return new Resource($event);
    }
}
