<?php


namespace App\Http\Requests\Auth;


use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255|exists:users',
            'password' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function getCredentials(): array
    {
        return [
            'email' => $this->input('email'),
            'password' => $this->input('password'),
            'is_active' => 1
        ];
    }

}
