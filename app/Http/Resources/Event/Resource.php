<?php

namespace App\Http\Resources\Event;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $usersCount = count($this->users);

        return [
            "id" => $this->id,
            "title" => $this->title,
            "date_time" => $this->date_time,
            "end_time" => $this->end_time,
            "venue" => $this->venue,
            "category_id" => $this->category_id,
            "price" => $this->price,
            "description" => $this->description,
            "user_id" => $this->user_id,
            "seats" => $this->seats,
            "image" => $this->image,
            "status" => $this->status,
            "users_count" => $usersCount
        ];
    }
}
