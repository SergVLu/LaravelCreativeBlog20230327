<?php

namespace App\Http\Requests\Admin\Category;

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
            'title' => 'required|string|max:15|min:3'
        ];
    }

    public function messages() {
        return [
          'title.required' => 'Это поле необходимо для заполнения',  
          'title.string' => 'Данные должны соответствовать строковому типу',  
          'title.max' => 'Длина не более 15 символов',
          'title.min' => 'Длина не менее 3 символов'
        ];
    }
}
