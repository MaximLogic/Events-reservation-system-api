<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\UpdateRequest;
use App\Http\Resources\Event\Resource;

class UpdateController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function __invoke(UpdateRequest $request, Event $event)
    {
        $data = $request->validated();
        $event->update($data);
        return new Resource($event);
    }
}
