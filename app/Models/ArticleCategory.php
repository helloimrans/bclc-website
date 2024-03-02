<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCategory extends Model
{
    use HasFactory, SoftDeletes;

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
