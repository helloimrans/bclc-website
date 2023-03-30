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
        'contact_email',
        'contact_mobile',
        'contact_link',
        'file',
        'sort',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
    public function category()
    {
        return $this->belongsTo(ServiceFacilityCategory::class)->withDefault([
            'name' => 'None',
        ]);
    }
}
