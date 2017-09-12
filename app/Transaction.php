<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'outlet_id',
        'customer_id',
        'type',
        'spent',
        'discount',
        'total'
    ];
}
