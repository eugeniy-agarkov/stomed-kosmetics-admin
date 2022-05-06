<?php
namespace App\Http\Requests\Direction;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirectionCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'title_menu' => 'required|max:255',
        ];
    }
}
