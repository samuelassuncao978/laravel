<?php

namespace App\Http\Resources\Calendar;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->getKey(),
            "title" => $this->name,
            "start" => $this->start_at->toDateTimeString(),
            "end" => $this->end_at->toDateTimeString(),
            "is_busy" => $this->is_busy,
        ];
    }
}
