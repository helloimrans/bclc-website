<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }
    
    public function scopeIsCategoryActive($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->isActive();
        });
    }
}
