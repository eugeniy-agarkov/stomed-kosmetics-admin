<?php
namespace App\Http\Requests\Clinic;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicImageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'alt' => 'nullable|max:255',
            'title' => 'nullable|max:255'
        ];
    }
}
