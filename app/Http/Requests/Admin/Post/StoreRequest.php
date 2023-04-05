<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required|string|max:63|min:3',
            'content' => 'required|string|min:16',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }
    
    public function messages() {
        return [
          'title.required' => 'Это поле необходимо для заполнения',  
          'title.string' => 'Данные должны соответствовать строковому типу',  
          'title.max' => 'Длина не более 63 символов',  
          'title.min' => 'Длина не менее 3 символов',  
          'content.required' => 'Это поле необходимо для заполнения',  
          'content.string' => 'Данные должны соответствовать строковому типу',  
          'content.min' => 'Длина не менее 16 символов',  
          'preview_image.required' => 'Это поле необходимо для заполнения',  
          'preview_image.file' => 'Необходимо выбрать файл',  
          'main_image.required' => 'Это поле необходимо для заполнения',  
          'main_image.file' => 'Необходимо выбрать файл',  
          'category_id.required' => 'Это поле необходимо для заполнения',  
          'category_id.exists' => 'Категорию нужно выбрать из предложенных',  
          'tag_ids.exists' => 'Категорию нужно выбрать из предложенных',  
          'tag_ids.array' => 'Тэги должны отправляться массивом',  
        ];
    }
}
