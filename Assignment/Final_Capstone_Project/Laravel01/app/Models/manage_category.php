<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class manage_category extends Model
{
    protected $table = 'manage_categories';

    // Optional if your primary key is id
    protected $primaryKey = 'id';


     protected $fillable = [
        'cate_name',
        'cate_img',
    ];

    public function products()
    {
        return $this->hasMany(manage_product::class, 'cate_id', 'id');
    }

    // If you want mass assignment
    //protected $fillable = ['name'];
}

