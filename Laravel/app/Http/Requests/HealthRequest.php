<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthRequest extends FormRequest
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
            "user_id" => ["required", "numeric", "exists:users,id"],
            "weight" => ["required", "numeric", "min:0", "max:635"],
            "height" => ["required", "numeric", "min:0", "max:272"],
            "date" => ["required", "date", "date_format:Y-m-d", "before_or_equal:today", "after_or_equal:1900-01-01"]
        ];
    }
}
