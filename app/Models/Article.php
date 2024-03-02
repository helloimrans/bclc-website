<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id', 'id')->withDefault([
            'name' => '--',
        ]);
    }
    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id')->withDefault([
            'name' => '--',
        ]);
    }
    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id')->withDefault([
            'name' => '--',
        ]);
    }

    public function scopeIsCategoryActive($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->isActive();
        });
    }
}
