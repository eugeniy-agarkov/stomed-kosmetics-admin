<?php
namespace App\Http\Requests\Reviews;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewPhotoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
