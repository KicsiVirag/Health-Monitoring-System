<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use RegexIterator;

class MeasureRequest extends FormRequest
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
            "pulse" => ["required", "numeric", "min:75","max:200"],
            "blood_pressure" => ["required", "string", "regex:/^(5[0-9]|[1-9][0-9]|[1][0-7][0-9]|180)\/(3[0-9]|[1-9][0-9]|1[01][0-9]|120)$/","max:7", "min:0"]
        ];
    }
}
