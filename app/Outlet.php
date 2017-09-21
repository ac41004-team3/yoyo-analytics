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
        return $this->hasMany(Transaction::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
