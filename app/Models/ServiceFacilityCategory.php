<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceFacilityCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'sort',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
    public function  serviceFacilities()
    {
        return $this->hasMany(ServiceFacility::class);
    }
}
