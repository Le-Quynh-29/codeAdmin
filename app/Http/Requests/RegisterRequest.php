<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

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
            'name' => 'required|max:50|',
            'email' => 'required|email|max:255|unique:users,email|',
            'gender' => 'required|',
            'password' => 'required|min:6|max:30|',
            'confirm_password' => 'required|same:password|',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Họ tên không được để trống.',
            'name.max' => 'Họ tên không được nhiều hơn 50 ký tự.',
            'email.required' => 'Địa chỉ email không được để trống.',
            'email.email' => 'Địa chỉ email sai định dạng.',
            'email.max' => 'Địa chỉ email không được nhiều hơn 255 ký tự.',
            'email.unique' => 'Địa chỉ email đã tồn tại.',
            'gender.required' => 'Giới tính không được để trống.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu không được ít hơn 6 ký tự.',
            'password.max' => 'Mật khẩu không được nhiều hơn 30 ký tự.',
            'confirm_password.required' => 'Mật khẩu không khớp.',
            'confirm_password.same' => 'Mật khẩu không khớp.',
        ];
    }

    /**
     * Fail validator
     *
     * @param  Validator $validator
     * @return HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator->errors()->toArray()));
        throw new HttpResponseException(redirect()->back()->withErrors($errors->validator)->withInput());
    }

}
