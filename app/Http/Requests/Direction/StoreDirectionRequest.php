<?php
namespace App\Http\Requests\Direction;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirectionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'category_id' => 'required|nullable|integer|exists:direction_categories,id',
            //'clinic_id' => 'required|nullable|integer|exists:clinics,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле Наименование не может быть пустым',
            'category_id.required' => 'Укажите категорию',
        ];
    }

}
