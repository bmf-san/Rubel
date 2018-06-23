<?php

namespace Rubel\Http\Requests\Api\v1\Authenticate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class AuthenticateRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required'
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
            'email.required' => 'A :attribute is required',
            'email.email' => 'The :attribute must be a valid email address.',
            'password.required' => 'A :attribute has been existed'
        ];
    }

    /**
     * Get the proper failed validation response for the request.
     *
     * @param array $errors
     *
     * @return Response
     */
    public function response(array $errors): Response
    {
        $response['messages'] = $errors;

        return response()->json($response, Response::HTTP_BAD_REQUEST);
    }
}
