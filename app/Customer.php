<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'id'
    ];

    public $incrementing = false;

    public function transactions()
    {
        $this->hasMany('App\Transaction');
    }
}
