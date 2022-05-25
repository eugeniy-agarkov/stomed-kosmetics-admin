<?php
namespace App\Http\Requests\Gallery;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле Наименование не может быть пустым',
        ];
    }

}
