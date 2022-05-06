<?php
namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalePageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'nullable|max:255',
            'description' => 'nullable|max:255'
        ];
    }
}
