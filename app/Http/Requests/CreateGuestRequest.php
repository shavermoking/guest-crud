<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class CreateGuestRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'mail' => ['required', 'email', 'max:255', 'unique:guests,mail'],
            'phone' => ['required', 'string', 'max:20', 'unique:guests,phone', 'regex:/^\+?[0-9\s\-()]*$/'],
            'country' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно для заполнения.',
            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не должно превышать 255 символов.',

            'surname.required' => 'Фамилия обязательна для заполнения.',
            'surname.string' => 'Фамилия должна быть строкой.',
            'surname.max' => 'Фамилия не должна превышать 255 символов.',

            'mail.required' => 'Email обязателен для заполнения.',
            'mail.email' => 'Email должен быть действительным адресом электронной почты.',
            'mail.max' => 'Email не должен превышать 255 символов.',
            'mail.unique' => 'Этот email уже используется.',

            'phone.required' => 'Телефон обязателен для заполнения.',
            'phone.string' => 'Телефон должен быть строкой.',
            'phone.max' => 'Телефон не должен превышать 20 символов.',
            'phone.unique' => 'Этот телефон уже используется.',
            'phone.regex' => 'Телефон должен содержать только цифры, пробелы, дефисы и скобки.',

            'country.required' => 'Страна обязательна для заполнения.',
            'country.string' => 'Страна должна быть строкой.',
            'country.max' => 'Страна не должна превышать 100 символов.',
        ];
    }

    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
