<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            "username" => ["required", "string", "max:255", "min:0"],
            "name" => ["required", "string", "max:255", "min:0"],
            "email" => ["required", "email", "max:255", "min:0"],
            "password" => ["required", "string", "min:8", "max:255", "regex:/^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>ยง~]).{8,}$/"],
            "birth_date" => ["required", "date","before_or_equal:today","after_or_equal:1900-01-01", "date_format:Y-m-d"],
            "gender" => ["required", "string", Rule::in("férfi", "nő")]
        ];
    }
}
