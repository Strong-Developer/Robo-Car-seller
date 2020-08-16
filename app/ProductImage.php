<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_image' ;

    protected $fillable = [
        'product_id','product_upc_code','file_path'
    ];
}
