<?php

namespace App\Http\Requests\Backend\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
class CategoriesRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100'
        ];
    }

    /**
     * @return string[]
     */
    public function messages() : array
    {
        return [
            'name.required' => 'Ad daxil edilməlidir',
            'name.string' => 'Düzgün ad daxil edin',
            'name.min' => 'Ad minimum 3 simvoldan ibarət olmalıdır',
            'name.max' => 'Ad maksimum 100 simvoldan ibarət olmalıdır'
        ];
    }

    /**
     * @return string[]
     */
    public function attributes() : array
    {
        return [
            'name' => 'Ad'
        ];
    }

    protected function failedValidation(Validator $validator) : void
    {
        $errors = $validator->errors()->getMessages();

        throw new HttpResponseException(new JsonResponse([
            'type' => 'validation_error',
            'message' => $errors
        ], 422));
    }
}
