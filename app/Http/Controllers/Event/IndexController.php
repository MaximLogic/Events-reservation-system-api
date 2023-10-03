<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Filters\EventFilter;
use App\Http\Requests\Event\FilterRequest;
use App\Http\Resources\Event\Resource;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(EventFilter::class, ['queryParams' => array_filter($data)]);
        $events = Event::filter($filter)->get();
        return Resource::collection($events);
    }
}
