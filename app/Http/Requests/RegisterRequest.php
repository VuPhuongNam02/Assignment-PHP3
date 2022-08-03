<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống !',
            'email.required' => 'Không được để trống !',
            'email.unique' => 'Email này đã tồn tại !',
            'email.email' => 'Không đúng định dạng email !',
            'password.required' => 'Không được để trống !',
            'password_confirmation.required' => 'Không được bỏ trống !',
            'password_confirmation.same' => 'Xác nhận mật khẩu chưa khớp !',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
        ];
    }
}
