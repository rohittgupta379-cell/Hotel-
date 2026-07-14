<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorMap extends Model
{
    use HasFactory;

    protected $table = 'floor_maps'; // Remove this line if your table is floor_maps

    protected $fillable = [
        'floor_id',
        'room_id',
        'room_no',
        'is_available',
    ];

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
