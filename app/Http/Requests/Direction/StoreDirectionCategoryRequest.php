<?php
namespace App\Http\Requests\Direction;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirectionCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'title_menu' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле Наименование не может быть пустым',
            'title_menu.required' => 'Поле Наименование в меню не может быть пустым',
        ];
    }

}
