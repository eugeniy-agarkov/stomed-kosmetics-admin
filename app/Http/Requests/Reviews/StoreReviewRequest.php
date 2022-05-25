<?php
namespace App\Http\Requests\Reviews;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    public function rules()
    {
        return [
            'clinic_id' => 'nullable|integer|exists:clinics,id',
            'doctor_id' => 'nullable|integer|exists:doctors,id',
            'published_at' => 'required|date_format:m/d/Y',
            'fio' => 'required|max:255',
            'phone' => 'nullable|max:255',
            'content' => 'required',
            'is_active' => 'integer'
        ];
    }

    public function messages()
    {
        return [
            'clinic_id.nullable' => 'Выберите клинику',
            'doctor_id.nullable' => 'Выберите доктора',
            'published_at.required' => 'Укажите дату публикации',
            'published_at.date_format' => 'Не верный формат даты',
            'fio.required' => 'Укажите ФИО',
            'fio.max' => 'Поле ФИО имеет максимальное кол.-во символов 255',
            'content.required' => 'Поле Содержимое не может быть пустым',
        ];
    }

}
