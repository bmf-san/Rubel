<?php

namespace Rubel\Http\Requests\Api\v1\Post;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePostRequest extends FormRequest
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
        if ($this->publication_status != 'draft') {
            return [
                'title' => 'required',
                'md_content' => 'required'
            ];
        }

        return [];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'A :attribute is required',
            'md_content.required' => 'A :attribute is required',
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
