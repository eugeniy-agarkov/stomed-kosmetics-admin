<?php
namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'published_at' => 'nullable|date_format:d.m.Y'
        ];
    }
}
