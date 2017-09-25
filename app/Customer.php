<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'id'
    ];

    public function transactions()
    {
        $this->hasMany('App\Transaction');
    }
}
