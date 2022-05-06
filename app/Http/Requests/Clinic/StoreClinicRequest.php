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
            'guide' => 'nullable|max:255'
        ];
    }
}
