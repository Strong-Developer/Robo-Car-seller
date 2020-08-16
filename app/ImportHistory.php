<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportHistory extends Model
{
    protected $table = 'import_history' ;
    public $fillable = [
        'files_name',
        'seller_id',
        'actual_name',
        'history_data'
    ];
}
