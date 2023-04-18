<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:63|min:3',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|integer',
        ];
    }
    
    public function messages() {
        return [
            'name.required' => 'Это поле необходимо для заполнения',  
            'name.string' => 'Данные должны соответствовать строковому типу',  
            'name.max' => 'Длина не более 63 символов',  
            'name.min' => 'Длина не менее 3 символов',  
            'email.required' => 'Это поле необходимо для заполнения',  
            'email.string' => 'Данные должны соответствовать строковому типу',  
            'email.email' => ' Введите вашу почту',  
            'email.unique' => ' Такой пользователь уже зарегистрирован',  
        ];
    }
}
