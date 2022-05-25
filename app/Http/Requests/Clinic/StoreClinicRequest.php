<?php
namespace App\Http\Requests\Clinic;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'address' => 'nullable|max:255',
            'guide' => 'nullable|max:255',
            'short_name' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле Название не может быть пустым',
            'short_name.required' => 'Поле Короткое название не может быть пустым',
        ];
    }

}
