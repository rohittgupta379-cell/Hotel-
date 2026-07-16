<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodCategory;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'status',
    ];

    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class, 'category_id');
    }
}