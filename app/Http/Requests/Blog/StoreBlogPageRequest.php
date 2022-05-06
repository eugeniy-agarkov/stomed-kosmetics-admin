<?php
namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'nullable|max:255',
            'description' => 'nullable|max:255'
        ];
    }
}
