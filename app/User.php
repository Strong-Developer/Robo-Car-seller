<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'sellers' ;

    protected $fillable = [
        'first_name','last_name','company_name','zip_code','email_address','password','cell_no','negotiation','currency'
    ];
}
