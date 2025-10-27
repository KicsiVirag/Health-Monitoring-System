<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SleepRequest extends FormRequest
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
            "sleep_durration" => ["required", "date_format:H:i","before_or_equal:24:59","after_or_equal:0:01"],
            "number_of_awaking" => ["nullable","numeric", "min:0", "max:50"],
            "sleep_quality" => ["required", "string", Rule::in(['Mély alvás','Szendergés','Felszínes','Álomalvás'])]
        ];
    }
}
