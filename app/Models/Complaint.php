<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'complaint_type',
        'complaint',
        'status',
    ];

    public function floorMap()
    {
        return $this->belongsTo(FloorMap::class, 'room_id');
    }
}
