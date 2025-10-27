<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SleepResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "event" => $this->event,
            "sleep_durration" => $this->sleep_durration,
            "number_of_awaking" => $this->number_of_awaking,
            "sleep_quality" => $this->sleep_quality
        ];
    }
}
