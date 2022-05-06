<?php
namespace App\Http\Requests\Doctor;


use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorPriceRequest extends FormRequest
{
    public function rules()
    {
        return [
            'direction_id' => 'nullable|exists:directions,id',
            'code' => 'nullable|max:255',
            'price' => 'nullable|max:255',
            'description' => 'nullable|max:255',
        ];
    }
}
