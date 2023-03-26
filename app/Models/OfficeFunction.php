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
        'office_category_id',
        'title',
        'description',
        'ministry_dept_authority',
        'address',
        'contact_info',
        'source_link',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
        
    ];
}
