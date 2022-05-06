<?php
namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . ($this->user->id ?? ''),
            'password' => 'nullable|string'
        ];
    }
}
