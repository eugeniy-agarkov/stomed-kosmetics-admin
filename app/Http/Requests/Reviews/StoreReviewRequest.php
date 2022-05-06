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
            'phone' => 'required|max:255',
            'content' => 'required',
            'is_active' => 'integer'
        ];
    }
}
