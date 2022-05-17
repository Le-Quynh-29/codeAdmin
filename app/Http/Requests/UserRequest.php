<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
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
        $id = $this->route('user');
        return [
            'name' => 'required|max:50',
            'username' => 'max:50|unique:users,username,'.$id.',id',
            'phone_number' => 'nullable|regex:/(0)+[0-9]{9}/|unique:users,phone_number,'.$id.',id',
            'birthday' => 'nullable|date_format:d/m/Y',
            'email' => 'required|email|max:255|unique:users,email,'.$id.',id',
            'password' => 'required|min:6|max:30',
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
            'name.max' => 'Họ tên chứa tối đa 50 ký tự.',
            'username.max' => 'Tên tài khoản chứa tối đa 50 ký tự.',
            'username.unique' => 'Tên tài khoản đã tồn tại.',
            'phone_number.regex' => 'SĐT không tồn tại.',
            'phone_number.unique' => 'SĐT đã được đăng ký trước đó.',
            'birthday.date_format' => 'Ngày sinh không đúng định dạng d/m/Y.',
            'email.required' => 'Địa chỉ email không được để trống.',
            'email.email' => 'Địa chỉ email sai định dạng.',
            'email.max' => 'Địa chỉ email không được quá 255 ký tự.',
            'email.unique' => 'Địa chỉ email đã tồn tại.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có tối thiểu 6 ký tự.',
            'password.max' => 'Mật khẩu phải chứa tối đa 30 ký tự.'
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
