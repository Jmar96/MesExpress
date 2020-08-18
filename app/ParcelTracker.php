<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParcelTracker extends Model
{
    //
    protected $fillable = [
        // 'title','completed'
        'item_name',
        'item_reference_number',
        'item_price',
        'item_weight',
        'item_payment_method',
        'item_cod_ammount',
        'item_shipping_type',
        'item_description',
        'item_consignee_fullname',
        'item_consignee_bankaccount',
        'item_consignee_contactno',
        'item_consignee_address',
        'item_consignee_pickup_address',
        'item_consignee_notes',
        'item_sender_fullname',
        'item_sender_contactno',
        'item_sender_address',
        'item_sender_notes',
        'item_merchant_id',
        'item_status_id',
        'cancelled',
        'completed',
        'item_image',
    ];
}
