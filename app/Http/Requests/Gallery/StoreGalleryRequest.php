<?php
namespace App\Http\Requests\Gallery;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
        ];
    }
}
