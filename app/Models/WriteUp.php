<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WriteUp extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(WriteUpCategory::class, 'write_up_category_id', 'id')->withDefault([
            'name' => '--',
        ]);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withDefault([
            'name' => '--',
        ]);
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id')->withDefault([
            'name' => '--',
        ]);
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeRelated($query, $categoryId)
    {
        return $query->isActive()
            ->where('write_up_category_id', $categoryId);
    }
}
