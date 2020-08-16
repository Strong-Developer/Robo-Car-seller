<?php

namespace App\CMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes ;

    protected $table = 'cms_pages' ;

    protected $fillable = [
        'title' , 'page_url' , 'name' , 'content','content_url','deletable'
    ] ;
}
