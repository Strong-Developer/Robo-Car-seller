<?php

namespace App\CMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Header extends Model
{
    use SoftDeletes ;

    protected $table = 'cms_header' ;

    protected $fillable = [
        'content'
    ];
}
