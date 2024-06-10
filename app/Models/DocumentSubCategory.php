<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentSubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }

    public function category()
    {
        return $this->belongsTo(DocumentCategory::class, 'document_category_id', 'id')->withDefault([
            'name' => '--',
        ]);
    }
}
