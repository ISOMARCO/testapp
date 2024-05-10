<?php

namespace App\Http\Requests\Backend\Customers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
class CustomerUpdateRequest extends FormRequest
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
            'id' => 'integer',
            'name' => 'required|string|min:3|max:40',
            'email' => [
                'required',
                'email',
                'max:150',
                Rule::unique('users', 'email')->ignore($this->input('id'))
            ],
            'country' => 'required|string',
            'category' => 'required|string',
            'password' => 'sometimes|nullable|string|min:5|max:100',
            'password_confirmation' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ad daxil edilməlidir',
            'email.required' => 'Email daxil edilməlidir',
            'email.email' => 'Düzgün email daxil edin',
            'country.required' => 'Ölkə daxil edilməlidir',
            'category.required' => 'Kateqoriya daxil edilməlidir',
            'password_confirmation.same' => 'Şifrə təsdiqi şifrə ilə uyğun gəlmir',
            'password.min' => 'Şifrə minimum 5 simvoldan ibarət olmalıdır',
            'password.max' => 'Şifrə maksimum 100 simvoldan ibarət olmalıdır',
            'password_confirmation.min' => 'Şifrə təsdiqi minimum 5 simvoldan ibarət olmalıdır',
            'password_confirmation.max' => 'Şifrə təsdiqi maksimum 100 simvoldan ibarət olmalıdır',
            'email.unique' => 'Bu email artıq istifadə olunub',
            'name.min' => 'Ad minimum 3 simvoldan ibarət olmalıdır',
            'name.max' => 'Ad maksimum 70 simvoldan ibarət olmalıdır',
            'email.max' => 'Email maksimum 150 simvoldan ibarət olmalıdır'
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
