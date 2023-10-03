<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function __invoke(Event $event)
    {
        return $event;
    }
}
