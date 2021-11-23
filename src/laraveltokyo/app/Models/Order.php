<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        //テーブル名
        protected $table = 'orders';

        //可変項目
        protected $fillable =
        [
        //  '',
        //  'email',
        //  'status_num',
        //  'created_at'
        ];
}
