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
        $this->hasMany('App\Transaction');
    }
}
