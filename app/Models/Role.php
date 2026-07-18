<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
    ];

    public function pages()
    {
        return $this->belongsToMany(Page::class, 'role_page_access');
    }
}
