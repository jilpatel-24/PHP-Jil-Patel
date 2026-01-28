<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'orders';

    // Allow these fields for mass assignment
    protected $fillable = [
        'p_name',     // we'll store CSV or JSON of product ids or names
        'cust_name',  // will store customer id or customer name (string)
        't_price',
        'Address',
        'city',
        'state',
        'pincode',
    ];
}
