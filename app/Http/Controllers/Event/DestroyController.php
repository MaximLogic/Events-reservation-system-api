<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    /**
     * Remove the specified resource from storage.
     */
    public function __invoke(Event $event)
    {
        $event->delete();
        return response(["message" => "Succesfully deleted object"]);
    }
}
