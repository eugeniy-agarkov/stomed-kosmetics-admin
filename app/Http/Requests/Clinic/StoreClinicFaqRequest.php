<?php
namespace App\Http\Requests\Clinic;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicFaqRequest extends FormRequest
{
    public function rules()
    {
        return [
            'question' => 'required|max:255',
            'answer' => 'required|min:30'
        ];
    }
}
