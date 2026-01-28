<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class manage_product extends Model
{
    protected $table = 'manage_products'; // or whatever your table name is


    protected $fillable = [
        'cate_id',
        'product_name',
        'product_description',
        'product_price',
        'product_img',
        'status',
    ];

    // 👇 Relation with Category
    public function category()
    {
        return $this->belongsTo(manage_category::class, 'cate_id');
    }
}

