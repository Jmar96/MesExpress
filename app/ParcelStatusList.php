<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParcelStatusList extends Model
{
    //
    protected $fillable = [
        'item_status','item_status_description','item_status_group','item_status_group2',
    ];

}
