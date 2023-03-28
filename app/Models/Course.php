<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'course_id',
        'title',
        'fee',
        'slug',
        'service_category_id',
        'service_id',
        'duration',
        'expert_id',
        'schedule',
        'suitable_course',
        'venue',
        'class_start_date',
        'class_end_date',
        'class_start_time',
        'class_end_time',
        'total_hours',
        'hour_minute',
        'last_reg_date',
        'provide_certificate',
        'short_description',
        'key_takeaways',
        'curriculum',
        'meeting_link',
        'image',
        'home_slider',
        'boarding',
        'comming_soon',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
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
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
}