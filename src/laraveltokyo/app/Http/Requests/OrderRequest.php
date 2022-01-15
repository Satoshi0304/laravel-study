<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'stock_id' => 'required|integer',
            // 'order_name' => 'required|string|max:20',
            // 'stock_name' => 'required|string|max:20',
            /** メールアドレスの形式後に適当なワードを打ってもエラーが出るようにした*/
            'number_order' => 'required|integer',
            // 'price' => 'required|integer',
            // 'total_price' => 'required|integer',
            // 'status_num' => 'required|integer',
            // 'status' => 'required|string|max:20'
        ];
    }

    public function attributes()
    {
        return [
            // 'order_name' => '発注商品名',
            // 'stock_name' => '発注商品名',
            'number_order' => '発注数',
            // 'price' => '発注単価額',
            // 'total_price' => '発注合計金額',
            // 'status' => 'ステータス',
        ];
    }
}
