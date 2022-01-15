<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $guarded = ['stock_id'];

    protected $fillable = [
        'stock_name',
        'stock_quantity',
        'stock_price',
        'status_num',
        'status'
    ];
}
