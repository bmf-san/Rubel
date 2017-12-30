<?php

namespace Rubel\Http\Requests\Api\v1\Authenticate;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticateRequest extends FormRequest
{
    /**
     * Status code not found
     *
     * @var int
     */
    const STATUS_CODE_NOT_FOUND = 400;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
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
    public function messages()
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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        $response['messages'] = $errors;

        return response()->json($response, (int) self::STATUS_CODE_NOT_FOUND);
    }
}
