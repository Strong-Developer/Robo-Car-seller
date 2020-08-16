<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products' ;

    protected $fillable = [
       'seller_id','request_id','product_title' ,'upc_product_code','make','model','condition','color' ,'size' ,'url','price','seller_original_quantity','category','special_deal_price','lowest_price','deal_expiry_date','product_description','negotiation_mode'
	];

    public function seller(){
        return $this->hasOne(Seller::class , 'id','seller_id') ;
    }

    public function images(){

        return $this->hasMany(ProductImage::class , 'product_id','id') ;
    }
}
