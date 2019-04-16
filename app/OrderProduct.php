<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{

    public $appends = [
        'total'
    ];

    public function getTotalAttribute($key)
    {
        if ($this->price > 0) {
            return $this->quantity * $this->price;
        }
        return $this->price;
    }

    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
