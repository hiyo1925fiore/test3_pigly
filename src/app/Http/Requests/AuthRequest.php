<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email:strict,dns'],
            'password' => ['required'],
            'weight' => ['required', 'max_digits:4', 'decimal:0,1'],
            'target_weight' => ['required', 'max_digits:4', 'decimal:0,1']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'お名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',
            'weight.required' => '現在の体重を入力してください',
            'weight.max_digits' => '4桁までの数字で入力してください',
            'weight.decimal' => '小数点は1桁で入力してください',
            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.max_digits' => '4桁までの数字で入力してください',
            'target_weight.decimal' => '小数点は1桁で入力してください',
        ];
    }
}
