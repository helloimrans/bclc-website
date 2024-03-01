<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const STATUS = [
        1 => 'Active',
        0 => 'Deactive',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }
}
