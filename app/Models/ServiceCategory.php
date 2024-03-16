<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'is_service',
        'is_pro_bono',
        'name',
        'slug',
        'image',
        'description',
        'sort',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeIsService($query)
    {
        return $query->where('is_service', 1);
    }
    public function scopeIsProbono($query)
    {
        return $query->where('is_pro_bono', 1);
    }

    public function services(){
        return $this->hasMany(Service::class)->where('status',1)->where('is_service',1)->latest();
    }
    public function probono(){
        return $this->hasMany(Service::class)->where('status',1)->where('is_service',2)->latest();
    }
}
