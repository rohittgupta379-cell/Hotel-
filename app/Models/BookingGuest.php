<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingGuest extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'name',
        'age',
        'id_type',
        'id_number',
        'id_image_front',
        'id_image_back',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
