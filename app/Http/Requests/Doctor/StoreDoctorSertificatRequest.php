<?php
namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorSertificatRequest extends FormRequest
{
    public function rules()
    {
        return [
            'alt' => 'nullable|max:255',
            'title' => 'nullable|max:255'
        ];
    }
}
