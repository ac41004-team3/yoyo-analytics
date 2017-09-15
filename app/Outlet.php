<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
