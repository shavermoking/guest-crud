<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class UpdateGuestRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'max:255',],
            'surname' => ['sometimes', 'string', 'max:255',],
            'mail' => ['sometimes', 'email', 'max:255', 'unique:guests,mail'],
            'phone' => ['sometimes', 'string', 'max:20', 'unique:guests,phone'],
            'country' => ['sometimes', 'string', 'max:100',],
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не должно превышать 255 символов.',

            'surname.string' => 'Фамилия должна быть строкой.',
            'surname.max' => 'Фамилия не должна превышать 255 символов.',

            'mail.email' => 'Email должен быть действительным адресом электронной почты.',
            'mail.max' => 'Email не должен превышать 255 символов.',
            'mail.unique' => 'Этот email уже используется.',

            'phone.string' => 'Телефон должен быть строкой.',
            'phone.max' => 'Телефон не должен превышать 20 символов.',
            'phone.unique' => 'Этот телефон уже используется.',

            'country.string' => 'Страна должна быть строкой.',
            'country.max' => 'Страна не должна превышать 100 символов.',
        ];
    }

    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
