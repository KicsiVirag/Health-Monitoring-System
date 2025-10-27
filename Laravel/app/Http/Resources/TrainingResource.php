<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
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
            "number_of_steps" => $this->number_of_steps,
            "training_intensity" => $this->training_intensity,
            "training_durration" => $this->training_durration,
            "training_type" => $this->training_type,
            "training_location" => $this->training_location
        ];
    }
}
