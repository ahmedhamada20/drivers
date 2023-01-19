<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'package_id', 'merchant_id', 'payment_type', 'total_amount', 'order_id', 'status','cancel_reason','order_id'
    ];

    /**
     * Get the package that owns the order.
     */
    // public function package()
    // {
    //     return $this->belongsTo('App\Package');
    // }

    /**
     * Get the order record associated with the package.
     */
    public function package()
    {
        return $this->belongsTo('App\Package', 'package_id', 'id');

    }
    public function orderstatus()
    {
        return $this->belongsTo('App\Orderstatus', 'order_id', 'id');
    }

    public function getInformation()
    {
        return $this->hasMany('App\Orderstatus', 'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


}
