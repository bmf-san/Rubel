<?php

namespace Rubel\Http\Requests\Api\v1\Tag;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTagRequest extends FormRequest
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
            'name' => 'required|unique:tags,name',
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
            'name.unique' => 'A :attribute has been existed',
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
