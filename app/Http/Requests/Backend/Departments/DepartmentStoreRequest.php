<?php

namespace App\Http\Requests\Backend\Departments;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
class DepartmentStoreRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:5|max:100',
            'password_confirmation' => 'same:password',
            'address' => 'required|string|max:500',
            'customer' => 'nullable|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ad daxil edilməlidir',
            'email.required' => 'Email daxil edilməlidir',
            'email.email' => 'Düzgün email daxil edin',
            'password.required' => 'Şifrə daxil edilməlidir',
            'password.min' => 'Şifrə minimum 5 simvoldan ibarət olmalıdır',
            'password.max' => 'Şifrə maksimum 100 simvoldan ibarət olmalıdır',
            'email.max' => 'Email maksimum 255 simvoldan ibarət olmalıdır',
            'name.min' => 'Ad minimum 3 simvoldan ibarət olmalıdır',
            'name.max' => 'Ad maksimum 255 simvoldan ibarət olmalıdır',
            'password_confirmation.same' => 'Şifrələr uyğun gəlmir',
            'address.required' => 'Ünvan daxil edilməlidir',
            'address.max' => 'Ünvan maksimum 500 simvoldan ibarət olmalıdır',
            'email.unique' => 'Bu email artıq istifadə olunub'
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
