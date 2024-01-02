<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\UpdateRequest;
use App\Http\Resources\Event\Resource;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function __invoke(UpdateRequest $request, Event $event)
    {
        $user = Auth::user();
        if($event->user_id == $user->id || $user->role === 'Admin')
        {
            $data = $request->validated();
            $event->update($data);
            return new Resource($event);
        }
        return response()->json(['message' => 'Forbidden'], 403);
    }
}
