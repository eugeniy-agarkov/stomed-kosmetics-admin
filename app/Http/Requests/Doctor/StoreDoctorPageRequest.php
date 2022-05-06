<?php
namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorPageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'nullable|max:255',
            'description' => 'nullable|max:255'
        ];
    }
}
