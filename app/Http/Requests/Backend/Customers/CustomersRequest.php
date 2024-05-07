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
            'name' => 'required|string|min:3|max:70',
            'surname' => 'required|string|min:3|max:70',
            'email' => 'required|email|unique:users,email|max:150',
            'country' => 'required|string',
            'category' => 'required|string',
            'password' => 'required|string|min:5|max:100',
            'password_confirmation' => 'required|string|same:password|min:5|max:100'
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
            'password_confirmation.same' => 'Şifrə təsdiqi şifrə ilə uyğun gəlmir',
            'password.min' => 'Şifrə minimum 5 simvoldan ibarət olmalıdır',
            'password.max' => 'Şifrə maksimum 100 simvoldan ibarət olmalıdır',
            'password_confirmation.min' => 'Şifrə təsdiqi minimum 5 simvoldan ibarət olmalıdır',
            'password_confirmation.max' => 'Şifrə təsdiqi maksimum 100 simvoldan ibarət olmalıdır',
            'email.unique' => 'Bu email artıq istifadə olunub',
            'name.min' => 'Ad minimum 3 simvoldan ibarət olmalıdır',
            'name.max' => 'Ad maksimum 70 simvoldan ibarət olmalıdır',
            'surname.min' => 'Soyad minimum 3 simvoldan ibarət olmalıdır',
            'surname.max' => 'Soyad maksimum 70 simvoldan ibarət olmalıdır',
            'email.max' => 'Email maksimum 150 simvoldan ibarət olmalıdır'
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
