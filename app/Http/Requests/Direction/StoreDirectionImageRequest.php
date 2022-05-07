<?php
namespace App\Http\Requests\Direction;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirectionImageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'alt' => 'nullable|max:255',
            'title' => 'nullable|max:255'
        ];
    }
}
