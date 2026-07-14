<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function floorMaps()
    {
        return $this->hasMany(FloorMap::class, 'floor_id');
    }
}
