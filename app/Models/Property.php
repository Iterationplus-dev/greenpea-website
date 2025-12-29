<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    //
     use HasFactory;
    protected $table = 'properties';
    protected $fillable = [
        'owner_id',
        'name',
        'city',
        'address',
        'description',
        'slug',
        'is_active',
    ];

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public function bookings()
    {
        return $this->hasManyThrough(Booking::class, Apartment::class);
    }
}
