<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceFacility extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'service_facility_sector_id',
        'service_facility_category_id',
        'service',
        'title',
        'description',
        'authority',
        'communications',
        'file',
        'sort',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceFacilityCategory::class, 'service_facility_category_id', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
    public function sector()
    {
        return $this->belongsTo(ServiceFacilitySector::class, 'service_facility_sector_id','id')->withDefault([
            'name' => 'None',
        ]);
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
}
