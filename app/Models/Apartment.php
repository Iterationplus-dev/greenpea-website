<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';
    protected $fillable = [
        'property_id',
        'name',
        'description',
        'monthly_price',
        'unit_number',
        'floor',
        'bedrooms',
        'bathrooms',
        'square_feet',
        'is_available',
    ];

    protected $casts = [
        'monthly_price' => 'decimal:2',
        'is_available' => 'boolean',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function images()
    {
        return $this->hasMany(ApartmentImage::class);
    }
}
