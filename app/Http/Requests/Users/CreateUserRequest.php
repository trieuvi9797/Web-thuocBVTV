<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'gander' => 'required',
            'image' => 'nullable|required|image|mimes:png,jpg,PNG,jpec',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
        ];
    }
}
