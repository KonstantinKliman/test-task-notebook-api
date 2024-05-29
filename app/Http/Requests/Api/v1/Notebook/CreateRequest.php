<?php

namespace App\Http\Requests\Api\v1\Notebook;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'fullName' => ['required', 'string'],
            'company' => ['nullable', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],
            'dateOfBirth' => ['nullable', 'date'],
            'photoUrl' => ['nullable', 'image'],
        ];
    }
}
