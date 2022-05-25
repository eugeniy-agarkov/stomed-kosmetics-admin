<?php
namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'published_at' => 'nullable|date_format:d.m.Y'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле Наименование не может быть пустым',
        ];
    }

}
