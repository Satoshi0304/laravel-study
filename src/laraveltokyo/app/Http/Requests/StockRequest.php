<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
            'stock_name' => 'required|string|max:20',
            /** メールアドレスの形式後に適当なワードを打ってもエラーが出るようにした*/
            'stock_quantity' => 'required|integer',
            'stock_price' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'stock_name' => '在庫名',
            'stock_quantity' => '在庫数',
            'stock_price' => '在庫価格',
        ];
    }
}
