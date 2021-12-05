<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use App\Rules\AlphaNumHalf;

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
        return [
            'user_name' => 'required|string|max:20',
            /** メールアドレスの形式後に適当なワードを打ってもエラーが出るようにした*/
            'email' => 'required|email|max:255|unique:users,email',

            /** 「confirmed」は確認用パスワード作成時に合致しているかのバリデーション*/
            'password' => 'required|numeric|min:6|max:20'
        ];
    }

    public function attributes()
    {
        return [
            'user_name' => 'ユーザー名',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }

    public function messages()
    {
        return [
            'password.numeric' => 'パスワードには、半角数字を指定してください。',
        ];
    }
}
