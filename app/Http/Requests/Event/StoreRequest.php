<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'string|max:255|required',
            'date_time' => 'date_format:Y-m-d H:i:s|required',
            'end_time' => 'date_format:Y-m-d H:i:s|required',
            'venue' => 'string|max:255|required',
            'category_id' => 'numeric|nullable',
            'price' => 'numeric|required',
            'description' => 'required',
            'user_id' => 'numeric|required',
            'seats' => 'numeric|required',
            'image' => 'string|required'
        ];
    }
}
