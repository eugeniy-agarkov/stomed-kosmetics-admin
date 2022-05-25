<?php
namespace App\Http\Requests\Seo;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'page' => 'required|max:255',
            'name' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'page.required' => 'Поле URL страницы не может быть пустым',
            'name.required' => 'Поле Наименование не может быть пустым',
        ];
    }

}
