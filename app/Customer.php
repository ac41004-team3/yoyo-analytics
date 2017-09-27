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
        return $this->hasMany('App\Transaction');
    }

    public function payments()
    {
        return $this->hasMany('App\Transaction')->where('type', 'like', '%payment%');
    }

    public function refunds()
    {
        return $this->hasMany('App\Transaction')->where('type', '=', 'Refund')
            ->orWhere('type', '=', 'Reversal');
    }
}
