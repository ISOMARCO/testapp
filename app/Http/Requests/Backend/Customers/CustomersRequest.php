<?php

namespace App\Http\Requests\Backend\Customers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
class CustomersRequest extends FormRequest
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
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'country' => 'required|string',
            'category' => 'required|string',
            'password' => 'required|string',
            'password_confirmation' => 'required|string|same:password'
        ];
    }

    /**
     * @return string[]
     */
    public function messages() : array
    {
        return [
            'name.required' => 'Ad daxil edilməlidir',
            'surname.required' => 'Soyad daxil edilməlidir',
            'email.required' => 'Email daxil edilməlidir',
            'email.email' => 'Düzgün email daxil edin',
            'country.required' => 'Ölkə daxil edilməlidir',
            'category.required' => 'Kateqoriya daxil edilməlidir',
            'password.required' => 'Şifrə daxil edilməlidir',
            'password_confirmation.required' => 'Şifrə təsdiqi daxil edilməlidir',
            'password_confirmation.same' => 'Şifrə təsdiqi şifrə ilə uyğun gəlmir'
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator) : void
    {
        $errors = $validator->errors()->getMessages();

        throw new HttpResponseException(new JsonResponse([
            'type' => 'validation_error',
            'message' => $errors
        ], 422));
    }
}
