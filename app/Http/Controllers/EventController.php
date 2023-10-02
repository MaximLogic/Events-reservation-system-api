<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Event::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255|required',
            'date_time' => 'date_format:Y-m-d H:i:s|required',
            'end_time' => 'date_format:Y-m-d H:i:s|required',
            'venue' => 'string|max:255|required',
            'category_id' => 'numeric|nullable',
            'price' => 'numeric|required',
            'description' => 'required',
            'user_id' => 'numeric|required',
            'seats' => 'numeric|required',
            'image' => 'string|required'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->messages()]);
        }
        $data = $validator->validated();
        $event = Event::firstOrCreate($data);
        return $event;
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return $event;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255|required',
            'date_time' => 'date_format:Y-m-d H:i:s|required',
            'end_time' => 'date_format:Y-m-d H:i:s|required',
            'venue' => 'string|max:255|required',
            'category_id' => 'numeric|nullable',
            'price' => 'numeric|required',
            'description' => 'required',
            'user_id' => 'numeric|required',
            'seats' => 'numeric|required',
            'image' => 'string|required'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->messages()]);
        }
        $data = $validator->validated();
        $event->update($data);
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response(["message" => "Succesfully deleted object"]);
    }
}
