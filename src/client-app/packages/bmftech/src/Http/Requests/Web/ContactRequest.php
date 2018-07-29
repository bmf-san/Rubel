<?php

namespace BmfTech\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'A :attribute is required',
            'email.required' => 'A :attribute is required',
            'email.email' => 'The :attribute must be a valid email address.',
            'message.required' => 'A :attribute has been existed',
        ];
    }
}
