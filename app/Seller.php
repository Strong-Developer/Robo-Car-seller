<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = 'sellers' ;

    protected $fillable = [
        'first_name','last_name','company_name','zip_code','email_address','password','cell_no','negotiation','currency'
    ];
}
