<?php

namespace App\Http\Requests\SchoolClasses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'number_class' => ['required', 'integer'],
            'class_code' => ['required', 'string'],
            'max_count' => ['required', 'integer'],
            'max_daily_load' => ['required', 'integer'],
            'max_number_of_classes_day' => ['required', 'integer']
        ];
    }
}
