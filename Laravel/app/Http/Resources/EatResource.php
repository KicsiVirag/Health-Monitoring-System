<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EatResource extends JsonResource
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
            "calories_morning" => $this->calories_morning,
            "calories_evening" => $this->calories_evening,
            "calories_noon" => $this->calories_noon,
            "medicine" => $this->medicine,
            "amount_of_liquid" => $this->amount_of_liquid
        ];
    }
}
