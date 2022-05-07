<?php
namespace App\Http\Requests\Direction;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirectionPageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'nullable|max:255',
            'description' => 'nullable|max:255'
        ];
    }
}
