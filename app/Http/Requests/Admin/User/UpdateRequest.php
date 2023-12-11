<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'role'=>'required|integer'

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Это поле должно быть строковой',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Это поле должно быть строковой',
            'email.email' => 'Ваша почта должна быть в формате name@email.com',
            'email.unique' => 'Пользователь с таким именем уже существует',
        ];
    }
}
