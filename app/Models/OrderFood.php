<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFood extends Model
{
    use HasFactory;

    protected $table = 'order_food';

    protected $fillable = [
        'food_id',
        'order_no',
        'name',
        'mobile',
        'quantity',
        'total_price',
        'room_no',
        'payment_method',
        'payment_status',
        'order_status',
    ];

    /**
     * Relationship with Food
     */
    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
}