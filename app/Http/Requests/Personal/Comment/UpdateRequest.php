<?php

namespace App\Http\Requests\Personal\Comment;

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
            'message' => 'string|max:105|min:3',
//            'message' => 'string|required'
        ];
    }

    public function messages() {
        return [
          'message.string' => 'Данные должны соответствовать строковому типу',  
          'message.max' => 'Длина не более 105 символов',
          'message.min' => 'Длина не менее 3 символов'
        ];
    }
}
