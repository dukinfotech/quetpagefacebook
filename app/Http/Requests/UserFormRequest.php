<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function attributes()
    {
        return [
            'name' => 'Tên khách hàng',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'note' => 'Ghi chú'
        ];
    }

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
        $emailRule = 'required|email:rfc,dns|unique:users';
        $emailRule = $this->method() == 'POST' ? $emailRule : $emailRule.',email,'.$this->id;

        return [
            'name' => 'required|max:60',
            'email' => $emailRule,
            'phone' => 'nullable',
            'note' => 'nullable',
            'password' => 'nullable'
        ];
    }
}
