<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor_map_id',
        'primary_guest_name',
        'total_guests',
        'email',
        'phone',
        'check_in',
        'check_out',
        'total_amount',
        'payment_status',
    ];

    public function room()
    {
        return $this->belongsTo(FloorMap::class, 'floor_map_id');
    }

    public function guests()
    {
        return $this->hasMany(BookingGuest::class);
    }
}
