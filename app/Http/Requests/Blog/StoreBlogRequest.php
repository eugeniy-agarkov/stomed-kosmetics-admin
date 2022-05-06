<?php
namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'is_active' => 'integer',
            'published_at' => 'nullable|date_format:m/d/Y'
        ];
    }
}
