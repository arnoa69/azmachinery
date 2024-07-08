<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{

    const MAX_LENGTH = 'required|string|max:255';
    const MAX_LENGTH_OPTIONAL = 'string|max:255';

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
            'name' => self::MAX_LENGTH,
            'email' => 'required|email|max:255',
            'company_name' => self::MAX_LENGTH,
            'phone_number' => self::MAX_LENGTH,
            'message' => 'required|string|max:3000',
            'locale' => self::MAX_LENGTH,
            'source' => self::MAX_LENGTH,
        ];
    }
}
