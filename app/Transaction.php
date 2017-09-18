<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'outlet_id',
        'customer_id',
        'date',
        'type',
        'spent',
        'discount',
        'total'
    ];

    public function outlet()
    {
        $this->hasOne('App\Outlet');
    }

    public function customer()
    {
        $this->hasOne('App\Customer');
    }
}
