<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email' => 'nullable|email|unique:users,email,' .$this->user_id,
            'role' => 'required|integer',
            'user_id' => 'required|integer|exists:users,id',

        ];
    }
    
    public function messages() {
        return [
          'name.required' => 'Это поле необходимо для заполнения',  
          'name.string' => 'Данные должны соответствовать строковому типу',  
          'name.max' => 'Длина не более 63 символов',  
          'name.min' => 'Длина не менее 3 символов',  
          'email.email' => ' Это не похоже на почту',  
          'email.unique' => ' Такой пользователь уже зарегистрирован',  
          'role.required' => 'Это поле необходимо для заполнения',  
          'role.integer' => 'Выберите из списка',  
        ];
    }
    
}
