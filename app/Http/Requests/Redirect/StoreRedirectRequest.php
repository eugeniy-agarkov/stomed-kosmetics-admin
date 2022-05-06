<?php
namespace App\Http\Requests\Redirect;

use Illuminate\Foundation\Http\FormRequest;

class StoreRedirectRequest extends FormRequest
{
    public function rules()
    {
        return [
            'from' => 'required|min:5|max:255',
            'to' => 'required|min:5|max:255',
        ];
    }
}
