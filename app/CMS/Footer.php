<?php

namespace App\CMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Footer extends Model
{
    use SoftDeletes ;

    protected $table = 'cms_footer' ;

    protected $fillable = [
        'content'
    ];
}
