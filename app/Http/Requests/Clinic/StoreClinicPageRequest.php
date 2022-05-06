<?php
namespace App\Http\Requests\Clinic;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicPageRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'nullable|max:255',
            'description' => 'nullable|max:255',
            'content' => 'nullable|string',
        ];
    }

}
