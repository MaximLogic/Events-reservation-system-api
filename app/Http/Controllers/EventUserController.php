<?php

namespace App\Http\Controllers;

use App\Models\EventUser;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Auth::user()->events, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $eventId = $request->id;

        if(Event::find($eventId))
        {
            if(EventUser::where('event_id', $eventId)->count() < Event::find($eventId)->seats)
            {
                $eventUser = EventUser::firstOrCreate(['event_id' => $eventId, 'user_id' => $userId]);
                return response()->json($eventUser, 200);
            }
            return response()->json(['message' => 'All seats are booked'], 400);
        }
        return response()->json(['message' => 'No event with such id'], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(EventUser $eventUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventUser $eventUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventUser $eventUser)
    {
        //
    }
}
