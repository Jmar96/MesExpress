<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParcelHistory extends Model
{
    //
    protected $fillable = [
        'parcel_id','status_id','merchant_id',
    ];

}
