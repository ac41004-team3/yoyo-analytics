<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'outlet_id',
        'customer_id',
        'import_id',
        'date',
        'type',
        'spent',
        'discount',
        'total'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function outlet()
    {
        return $this->hasOne('App\Outlet');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function import()
    {
        return $this->belongsTo('App\Import');
    }
}
