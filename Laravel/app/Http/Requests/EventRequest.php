<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            "user_id" => ["required", "exists:users,id", "numeric"],
            "event_date" => ["required", "date", "date_format:Y-m-d", "before_or_equal:today", "after_or_equal:1900-01-01"],
            "event_description" => ["nullable", "string", "max:255"]
        ];
    }
}
