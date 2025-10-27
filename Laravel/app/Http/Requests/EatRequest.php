<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EatRequest extends FormRequest
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
            "calories_morning" => ["numeric", "min:0", "max:6500", "required"],
            "calories_evening" => ["numeric", "min:0", "max:6500", "required"],
            "calories_noon" => ["numeric", "min:0", "max:6500", "required"],
            "medicine" => ["string", "max:255", "nullable"],
            "amount_of_liquid" => ["numeric", "min:0", "max:22", "required"]
        ];
    }
}
