<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TrainingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "event_id" => ["numeric", "required", "exists:events,id"],
            "number_of_steps" => ["required", "numeric", "min:0", "max:25000"],
            "training_intensity" => ["required", Rule::in(['Alacsony','Közepes','Intenzív'])],
            "training_durration" => ["required", "date_format:H:i", "before_or_equal:23:59","after_or_equal:00:01"],
            "training_type" => ["required", "string", "max:255", "min:0"],
            "training_location" => ["required", "string", "max:255", "min:0"]
        ];
    }
}
