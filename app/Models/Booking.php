<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
     protected $table = 'bookings';
    protected $fillable = [
        'user_id',
        'apartment_id',
        'discount_id',
        'start_date',
        'end_date',
        // 'amount',
        'total_amount',
        'discount_amount',
        'net_amount',
        'status',
    ];
}
