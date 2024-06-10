<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'is_service',
        'service_category_id',
        'title',
        'description',
        'thumbnail_image',
        'sort',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function scopeIsService($query)
    {
        return $query->where('is_service', 1);
    }
    public function scopeIsProbono($query)
    {
        return $query->where('is_service', 2);
    }

    public function associated_service()
    {
        return $this->belongsToMany(AssociatedService::class, 'associated_service_service')->where('status', 1);
    }
    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'keyword_service')->where('status', 1);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
    public function images()
    {
        return $this->hasMany(ServiceImage::class);
    }
}
