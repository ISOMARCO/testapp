<?php

namespace App\Http\Requests\Backend\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }

    public function messages() : array
    {
        return [
            'email.required' => 'Email daxil edilməlidir',
            'email.email' => 'Düzgün email daxil edin',
            'password.required' => __('Backend/auth.password_required')

        ];
    }

    public function attributes() : array
    {
        return [
            'email' => 'Email',
            'password' => 'Şifrə'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->getMessages();

        throw new HttpResponseException(new JsonResponse([
            'type' => 'validation_error',
            'message' => $errors
        ], 422));
    }
}
