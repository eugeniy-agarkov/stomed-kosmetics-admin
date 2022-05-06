<?php
namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'content' => 'nullable|max:255',
            'experience' => 'nullable|max:255',
            'degree' => 'nullable|max:255',
            'category' => 'nullable|max:255',
            'is_call_home' => 'integer',
            'order' => 'integer',
            'is_active' => 'integer'
        ];
    }
}
