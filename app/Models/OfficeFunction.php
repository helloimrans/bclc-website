<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficeFunction extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'office_function_sector_id',
        'office_function_category_id',
        'title',
        'description',
        'service',
        'ministry_dept_authority',
        'address',
        'communications',
        'status',
        'sort',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function category()
    {
        return $this->belongsTo(OfficeFunctionCategory::class, 'office_function_category_id', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
    public function sector()
    {
        return $this->belongsTo(OfficeFunctionSector::class, 'office_function_sector_id','id')->withDefault([
            'name' => 'None',
        ]);
    }
    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
}
